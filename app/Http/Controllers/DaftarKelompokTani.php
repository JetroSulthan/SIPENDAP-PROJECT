<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Komoditas;
// use App\Models\KategoriPetani;
use App\Models\JenisKelamin;
// use App\Models\Komoditas;
use App\Models\KelompokTani;
use Illuminate\Http\Request;
use App\Models\KategoriPetani;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class DaftarKelompokTani extends Controller
{
    public function kelompoktani()
    {
        return view('pemerintah.daftar', [
            'title' => 'Register',
            // 'kategoris' => KategoriPetani::all(),
            'jenis_kelamins'  => JenisKelamin::all(),
            // 'komoditas' => Komoditas::all()

        ]);
    }

    public function regiskeltani(Request $request)
    {   
        // Validasi user data
    $daftar = $request->validate([
        'username' => 'required',
        'password' => 'required',
        'nama_kelompok' => 'required',
        'nama_lengkap' => 'required',
        'nik' => 'required|unique:kelompok_tanis',
        'tempat_lahir' => 'required',
        'tanggal_lahir' => 'required|date',
        'jalan' => 'required',
        'kecamatan' => 'required',
        'kota' => 'required',
        'jenis_kelamin' => 'required' // Asumsi roles_id dikirim dari form dan perlu divalidasi
    ]);
    
    $users = DB::table('users')->insertGetId([
        'username' => $daftar['username'],
        'password' => bcrypt($daftar['password']),
        'roles_id' => 3
    ]);

    $daftar['jenis_kelamins_id'] = $request->input('jenis_kelamin');
    
    
    Kelompoktani::create([
        'users_id' => $users,
        'nama_kelompok' => $daftar['nama_kelompok'],
        'nama_lengkap' => $daftar['nama_lengkap'],
        'nik' => $daftar['nik'],
        'tempat_lahir' => $daftar['tempat_lahir'],
        'tanggal_lahir' => $daftar['tanggal_lahir'],
        'jenis_kelamins_id' => $daftar['jenis_kelamin'],
        'jalan' => $daftar['jalan'],
        'kecamatan' => $daftar['kecamatan'],
        'kota' => $daftar['kota']
    ]);

        $request = session();
        // var_dump($request->all());
        $request->flash('success', 'Berhasil menambahkan akun, Silakan Login!');
        return redirect('/dashboard');
    }
}
