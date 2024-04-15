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
        Schema::create('petanis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('nik');
            $table->foreignId('jenis_kelamins_id');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jalan');
            $table->string('kecamatan');
            $table->string('kota');
            $table->foreignId('komoditas_id');
            $table->string('vol_komoditas');
            $table->string('luas_lahan');
            $table->string('titik_koor_lahan');
            $table->string('no_telp');
            $table->foreignId('kategori_petanis_id');
            $table->string('scan_kk');
            $table->string('scan_ktp');
            $table->string('foto_lahan');
            $table->foreignId('persetujuans_id')->nullable();
            $table->string('komentar')->nullable();
            $table->foreignId('pemerintah_id')->nullable();
            $table->foreignId('kelompok_tani_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Petani_Migrations');
    }
};
