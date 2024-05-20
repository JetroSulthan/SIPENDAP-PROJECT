<?php

namespace Database\Seeders;

use App\Models\Dukcapil;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DukcapilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dukcapil::create([
            'nama' => 'Ayu Murti Sari'
        ]);

        Dukcapil::create([
            'nama' => 'Budi Santoso'
        ]);

        Dukcapil::create([
            'nama' => 'Cici Rahayu'
        ]);

        Dukcapil::create([
            'nama' => 'Dimas Dhani'
        ]);

        Dukcapil::create([
            'nama' => 'Eka Ernawati'
        ]);
    }
}
