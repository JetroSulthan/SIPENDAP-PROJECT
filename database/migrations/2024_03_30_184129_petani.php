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
        Schema::create('Petani', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('nik');
            // $table->string('jenis_kelamin'); foreign
            $table->string('tempat_lahir');
            $table->string('alamat_lahan');
            $table->string('vol_komoditas');
            $table->string('luas_lahan');
            $table->string('titik_koor_lahan');
            $table->string('no_telp');
            $table->string('scan_ktp');
            $table->string('foto_lahan');
            // $table->string('komoditas'); foreign
            // $table->string('kategori_petani'); foreign
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
