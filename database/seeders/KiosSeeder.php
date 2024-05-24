<?php

namespace Database\Seeders;

use App\Models\Kios;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kios::create([
            'laporan' => 'Tester File.pdf'
        ]);
    }
}
