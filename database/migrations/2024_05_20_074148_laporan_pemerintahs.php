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
        Schema::create('laporan_pemerintahs', function (Blueprint $table) {
            $table->id();
            $table->string('laporan');
            $table->string('komentar')->nullable();
            $table->string('persetujuans_id')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laporan_pemerintahs');
    }
};
