<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterPetaniController extends Controller
{
    public function petani()
    {
        return view('kelompoktani.daftar', [
            'title' => 'Register'
        ]);
    }

    public function regisPetani(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'nik' => 'required | unique:users',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'jalan' => 'required',
            'kecamatan' => 'required',
            'kota' => 'required',
            'komoditas' => 'required',
            'vol_komoditas' => 'required',
            'luas_lahan' => 'required',
            'titik_koor_lahan' => 'required',
            'no_telp' => 'required',
            'kategori_petanis' => 'required',
            'scan_ktp' => 'required',
            'scan_kk' => 'required',
            'foto_lahan' => 'required'
        ]);

        $createUser = [
            'name'   => $request->name,
            'email'        => $request->email,
            'password'     => Hash::make($request->password),
            'role'         => 'mitra',
        ];
        
        $user = User::create($createUser);

        $request->validate([
            'no_hp' => 'min:11 | max:13 | required',
            'nama_usaha' => 'required | max:255',
        ]);

        petani::create([
            'user_id' => $user->id,
            'no_hp' => $request->no_hp,
            'nama_usaha' => $request->nama_usaha,
        ]);
        // var_dump($request->all());
        $request->session()->flash('success', 'Berhasil menambahkan akun, Silakan Login!');
        return redirect('/login');
    }
}
