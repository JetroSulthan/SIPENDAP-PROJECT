<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
use App\Models\Petani;
use App\Models\Komoditas;
use App\Models\Pemerintah;
use App\Models\Persetujuan;
use App\Models\JenisKelamin;
use App\Models\KelompokTani;
use App\Models\JenisKomoditas;
use App\Models\KategoriPetani;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'username' => 'mhmdbambang',
            'password' => bcrypt ('b4mb4ng00'),
            'roles_id' => 2
        ]);
        User::create([
            'username' => 'adminSIPPENDAP',
            'password' => 'admin123',
            'roles_id' => 1
        ]);
        User::create([
            'username' => 'saifulkuncoro',
            'password' => 'kuncoro0823',
            'roles_id' => 3
        ]);

        User::create([
            'username' => 'zainularifin',
            'password' => bcrypt ('zainul300'),
            'roles_id' => 3
        ]);

        Role::create([
            'nama_role' => 'Admin'
        ]);

        Role::create([
            'nama_role' => 'Pemerintah'
        ]);

        Role::create([
            'nama_role' => 'Kelompok Tani'
        ]);

        Persetujuan::create([
            'opsi' => 'disetujui'
        ]);

        Persetujuan::create([
            'opsi' => 'tidak disetujui'
        ]);

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

        JenisKelamin::create([
            'nama' => 'Laki-laki'
        ]);

        JenisKelamin::create([
            'nama' => 'Perempuan'
        ]);

        KelompokTani::create([
            'users_id' => 4,
            'nama_kelompok' => 'Hidayah',
            'nik' => '321098765432109',
            'nama_lengkap' => 'Zainul Arifin',
            'jenis_kelamins_id' => 1,
            'tempat_lahir' => 'Situbondo',
            'tanggal_lahir' => '1974-01-08',
            'jalan' => 'Jl. Kalimantan 3',
            'kecamatan' => 'Mangaran',
            'kota' => 'Situbondo'
        ]);

        Pemerintah::create([
            'users_id' => 1,
            'nip' => '198507232005022001',
            'nama_lengkap' => 'Ahmad Mahfud',
            'nomor_sk' => '188/59/431.308.5/2024'
        ]);

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
            'scan_kk' => 'Ayu_ktp.jpg',
            'scan_ktp' => 'Ayu_kk.jpg',
            'foto_lahan' => 'Ayu_lahan.jpg',
            'persetujuans_id' => 1,
            'komentar' => 'akan menerima bantuan',
            'pemerintah_id' => 1,
            'kelompok_tani_id' => 1
        ]);
    }
}
