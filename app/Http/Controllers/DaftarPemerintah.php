<?php

namespace App\Http\Controllers;

use App\Models\Pemerintah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DaftarPemerintah extends Controller
{
    public function pemerintahan()
    {
        return view('admin.daftarpemerintah', [
            'title' => 'Register',
        ]);
    }

    public function regispemerintah(Request $request)
    {   
        // Validasi user data
    $daftar = $request->validate([
        'username' => 'required',
        'password' => 'required',
        'nomor_sk' => 'required',
        'nama_lengkap' => 'required',
        'nip' => 'required', // Asumsi roles_id dikirim dari form dan perlu divalidasi
    ]);
    
    $users = DB::table('users')->insertGetId([
        'username' => $daftar['username'],
        'password' => bcrypt($daftar['password']),
        'roles_id' => 2
    ]);
    
    Pemerintah::create([
        'users_id' => $users,
        'nomor_sk' => $daftar['nomor_sk'],
        'nama_lengkap' => $daftar['nama_lengkap'],
        'nip' => $daftar['nip'],
    ]);

        $request = session();
        // var_dump($request->all());
        $request->flash('success', 'Berhasil menambahkan akun, Silakan Login!');
        return redirect('/admin');
    }

    public function kelompok()
    {
        $keltani = Pemerintah::all();
        
        return view('admin.pemerintah', compact('keltani'));
    }
}

