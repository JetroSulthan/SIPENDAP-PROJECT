<?php

namespace Database\Seeders;

use App\Models\Petani;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PetaniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Petani::create([
            'nama_lengkap' => 'Ayu Murti Sari',
            'nik' => '3509210359102395',
            'jenis_kelamins_id' => 2,
            'tempat_lahir' => 'Jember',
            'tanggal_lahir' => '1989-02-01',
            'jalan' => 'Jl. Jawa 9',
            'kecamatan' => 'Mangaran',
            'kota' => 'Situbondo',
            'komoditas_id' => 1,
            'vol_komoditas' => '50 Kg',
            'luas_lahan' => '1 HA',
            'titik_koor_lahan' => '-8.060212° 114.220914°',
            'no_telp' => '08990302067',
            'kategori_petanis_id' => 1,
            'scan_ktp' => 'Ayu_ktp.jpg',
            'scan_ktp' => 'Ayu_kk.jpg',
            'scan_ktp' => 'Ayu_lahan.jpg',
            'persetujuans_id' => 1,
            'komentar' => 'akan menerima bantuan',
            'pemerintah_id' => 1,
            'kelompok_tani_id' => 1
        ]);
    }
}
