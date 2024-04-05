<?php

namespace Database\Seeders;

use App\Models\Komoditas;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KomoditasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Komoditas::create([
            'jenis_komoditas_id' => 1,
            'nama_komoditas' => 'Padi'
        ]);

        Komoditas::create([
            'jenis_komoditas_id' => 1,
            'nama_komoditas' => 'Padi'
        ]);

        Komoditas::create([
            'jenis_komoditas_id' => 1,
            'nama_komoditas' => 'Jagung'
        ]);

        Komoditas::create([
            'jenis_komoditas_id' => 2,
            'nama_komoditas' => 'Bawang Merah'
        ]);

        Komoditas::create([
            'jenis_komoditas_id' => 2,
            'nama_komoditas' => 'Jeruk'
        ]);

        Komoditas::create([
            'jenis_komoditas_id' => 3,
            'nama_komoditas' => 'Kopi'
        ]);

        Komoditas::create([
            'jenis_komoditas_id' => 3,
            'nama_komoditas' => 'Karet'
        ]);

        Komoditas::create([
            'jenis_komoditas_id' => 4,
            'nama_komoditas' => 'Ayam'
        ]);

        Komoditas::create([
            'jenis_komoditas_id' => 4,
            'nama_komoditas' => 'Babi'
        ]);
    }
}
