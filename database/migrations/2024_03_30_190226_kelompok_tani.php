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
        Schema::create('kelompok_tanis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id');
            $table->string('nama_kelompok');
            $table->string('nik');
            $table->string('nama_lengkap');
            $table->foreignId('jenis_kelamins_id');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->string('jalan');
            $table->string('kecamatan');
            $table->string('kota');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Kelompok_Tani');
    }
};
