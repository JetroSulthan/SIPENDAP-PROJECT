<?php

namespace Database\Seeders;

use App\Models\Berkas;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BerkasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Berkas::create([
            'status' => 'sesuai'
        ]);
        Berkas::create([
            'status' => 'tidak sesuai'
        ]);
        
    }
}
