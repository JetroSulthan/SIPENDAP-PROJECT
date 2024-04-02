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
        Schema::create('pemerintah', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('nip');
            $table->string('nomor_sk');
            // $table->string('id_user'); foreign
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemerintah');
    }
};
