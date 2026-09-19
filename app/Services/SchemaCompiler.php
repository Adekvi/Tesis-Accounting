<?php

namespace App\Services;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use MongoDB\Laravel\Schema\Blueprint as MongoBlueprint;

/**
 * Menerjemahkan 1 skema kanonik (database/schema/canonical/*.json) menjadi:
 * - CREATE TABLE nyata di MySQL/PostgreSQL (compileSql), atau
 * - createCollection + $jsonSchema validator di MongoDB (compileMongo)
 * Keduanya dijalankan pada koneksi 'tenant' yang sudah di-bind sebelumnya
 * (lihat ResolveTenant::bindTenantConnection / ProvisionTenant::bindTenantConnection).
 */
class SchemaCompiler
{
    public function compileSql(string $entity, array $schema): void
    {
        if (Schema::connection('tenant')->hasTable($entity)) {
            return;
        }

        Schema::connection('tenant')->create($entity, function (Blueprint $table) use ($schema) {
            foreach ($schema['fields'] as $name => $def) {
                $this->applySqlColumn($table, $name, $def);
            }
            $table->timestamps();
        });
    }

    protected function applySqlColumn(Blueprint $table, string $name, array $def): void
    {
        $column = match ($def['type']) {
            'uuid' => $table->uuid($name),
            'string' => $table->string($name, $def['length'] ?? 255),
            'text' => $table->text($name),
            'integer' => $table->integer($name),
            'decimal' => $table->decimal($name, $def['precision'] ?? 18, $def['scale'] ?? 2),
            'boolean' => $table->boolean($name),
            'date' => $table->date($name),
            'datetime' => $table->dateTime($name),
            'enum' => $table->enum($name, $def['values'] ?? []),
            default => $table->string($name),
        };

        if (! empty($def['nullable'])) {
            $column->nullable();
        }

        // Catatan: primary_key majemuk (composite) belum ditangani di sini,
        // untuk kasus akun.kode_akun ini cukup karena primary key tunggal.
        if (! empty($def['primary_key'])) {
            $table->primary($name);
        }
    }

    public function compileMongo(string $entity, array $schema): void
    {
        if (Schema::connection('tenant')->hasCollection($entity)) {
            return;
        }

        $properties = [];
        $required = [];

        foreach ($schema['fields'] as $name => $def) {
            $properties[$name] = $this->mongoBsonType($def);

            // Primary key TETAP wajib diisi (bukan dikecualikan) —
            // yang boleh dikecualikan dari required hanya field yang
            // memang nullable menurut skema kanonik.
            if (empty($def['nullable'])) {
                $required[] = $name;
            }
        }

        Schema::connection('tenant')->create($entity, function (MongoBlueprint $collection) use ($schema) {
            foreach ($schema['fields'] as $name => $def) {
                if (! empty($def['primary_key'])) {
                    $collection->unique($name);
                }
            }
        }, options: [
            'validator' => [
                '$jsonSchema' => [
                    'bsonType' => 'object',
                    'required' => $required,
                    'properties' => $properties,
                ],
            ],
            // 'moderate': dokumen lama (sebelum validator dipasang) tidak divalidasi ulang saat diupdate.
            // Cocok selama skema kanonik masih berkembang di tahap riset ini.
            'validationLevel' => 'moderate',
            'validationAction' => 'error',
        ]);
    }

    /**
     * Field yang nullable diberi bsonType tambahan 'null', karena MongoDB
     * menganggap nilai null sebagai tipe BSON tersendiri — bukan otomatis
     * cocok dengan bsonType 'string'/'int'/dst. Tanpa ini, insert dengan
     * nilai null pada field nullable (mis. kode_induk pada akun induk teratas)
     * akan DITOLAK validator meski field-nya memang boleh kosong.
     */
    protected function mongoBsonType(array $def): array
    {
        $base = match ($def['type']) {
            'uuid', 'string', 'enum' => 'string',
            'decimal' => ['double', 'decimal', 'int', 'long'],
            'date', 'datetime' => 'date',
            'boolean' => 'bool',
            'integer' => 'int',
            default => 'string',
        };

        $types = is_array($base) ? $base : [$base];
        if (! empty($def['nullable'])) {
            $types[] = 'null';
        }

        $result = ['bsonType' => count($types) === 1 ? $types[0] : $types];

        // Tambahan: field enum harus membawa daftar nilai yang diizinkan
        if ($def['type'] === 'enum' && isset($def['values'])) {
            $values = $def['values'];
            if (! empty($def['nullable'])) {
                $values[] = null;
            }
            $result['enum'] = $values;
        }

        return $result;
    }
}
