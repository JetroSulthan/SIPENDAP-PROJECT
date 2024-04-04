<?php

namespace Database\Seeders;

use App\Models\JenisKomoditas;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JenisKomoditasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JenisKomoditas::create([
            'nama_komoditas' => 'Tanaman Pangan'
        ]);
        
        JenisKomoditas::create([
            'nama_komoditas' => 'Hortikultura'
        ]);

        JenisKomoditas::create([
            'nama_komoditas' => 'Perkebunan'
        ]);

        JenisKomoditas::create([
            'nama_komoditas' => 'Peternakan'
        ]);

        JenisKomoditas::create([
            'nama_komoditas' => 'Pengolahan'
        ]);

    }
}
