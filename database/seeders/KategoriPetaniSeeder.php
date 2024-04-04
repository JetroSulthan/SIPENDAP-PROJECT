<?php

namespace Database\Seeders;

use App\Models\KategoriPetani;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoriPetaniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KategoriPetani::create([
            'kategori_petani' => 'pemilik lahan'
        ]);

        KategoriPetani::create([
            'kategori_petani' => 'penggarap dan pemilik lahan'
        ]);

        KategoriPetani::create([
            'kategori_petani' => 'penggarap'
        ]);

        KategoriPetani::create([
            'kategori_petani' => 'buruh'
        ]);
    }
}
