<?php

namespace Database\Seeders;

use App\Models\DataLahan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DataLahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DataLahan::create([
            'status' => 'sesuai'
        ]);
        DataLahan::create([
            'status' => 'tidak sesuai'
        ]);
        
    }
}
