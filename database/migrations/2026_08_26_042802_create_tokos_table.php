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
        Schema::connection('central')->create('tokos', function (Blueprint $table) {
            // Disamakan dengan database/schema/canonical/toko.json ("id": { "type": "uuid", ... })
            // dan konsisten dengan pola id pada jurnal.json & pajak_transaksi.json (juga uuid).
            $table->uuid('id')->primary();
            $table->string('nama_toko', 100);
            $table->enum('engine_db', ['mysql', 'pgsql', 'mongodb']);
            $table->string('nama_database', 100)->unique();
            $table->string('host')->nullable();
            $table->integer('port')->nullable();
            $table->enum('status', ['pending', 'active', 'suspended'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::connection('central')->dropIfExists('tokos');
    }
};
