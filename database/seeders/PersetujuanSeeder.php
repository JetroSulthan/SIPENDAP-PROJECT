<?php

namespace Database\Seeders;

use App\Models\Persetujuan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PersetujuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Persetujuan::create([
            'opsi' => 'disetujui'
        ]);

        Persetujuan::create([
            'opsi' => 'tidak disetujui'
        ]);


    }
}
