<?php

namespace Database\Seeders;

use App\Models\LaporanPemerintah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LaporanPemerintahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LaporanPemerintah::create([
            'laporan' => 'Testing(bkn file asli).pdf'
        ]);
    }
}
