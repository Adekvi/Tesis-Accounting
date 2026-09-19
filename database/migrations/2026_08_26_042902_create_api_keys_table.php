<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::connection('central')->create('api_keys', function (Blueprint $table) {
            // id tabel ini SENGAJA tetap auto-increment: api_keys bukan bagian dari
            // skema kanonik (tidak punya file di database/schema/canonical/), jadi
            // tidak wajib ikut konvensi uuid — hanya foreign key ke tokos yang harus
            // menyesuaikan tipe.
            $table->id();

            // foreignId() -> foreignUuid() karena tokos.id sekarang uuid, bukan bigint lagi.
            $table->foreignUuid('toko_id')->constrained('tokos')->cascadeOnDelete();

            $table->string('key_hash', 64)->unique(); // simpan hash SHA-256 dari API key, bukan plaintext
            $table->timestamp('revoked_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::connection('central')->dropIfExists('api_keys');
    }
};
