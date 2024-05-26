<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Pemerintah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dataakun()
    {
        $userlogin = Auth::id(); // Cara lebih singkat untuk mendapatkan ID user yang sedang login
        $keltani = Admin::where('users_id', $userlogin)->first(); // Sesuaikan kolom dengan struktur tabel Anda
        $user = Auth::user();
        // dd($keltani);
        $userId = $keltani->users_id;
        $users = User::find($userId);
        // $pemerintah = Pemerintah::where('id', $keltani)->first();
        // $data = Pemerintah::all();
        
        return view('admin.data', compact('keltani', 'user', 'users'));
    }

    public function ubahakun()
    {
        $userlogin = Auth::id(); // Cara lebih singkat untuk mendapatkan ID user yang sedang login
        $keltani = Admin::where('users_id', $userlogin)->first(); // Sesuaikan kolom dengan struktur tabel Anda
        $user = Auth::user();
        // dd($keltani);
        $userId = $keltani->users_id;
        $users = User::find($userId);
        // $pemerintah = Pemerintah::where('id', $keltani)->first();
        // $data = Pemerintah::all();
        
        return view('admin.ubahdata', compact('keltani', 'user', 'users'));
    }

    public function storeubah(Request $request)
    {
        $daftar= $request->validate([
            'users_id' => 'numeric',
            'username' => 'required',
            'nama' => 'required'
        ]);

        Admin::where('users_id', $daftar['users_id'])->update([
            'nama' => $daftar['nama']
        ]);

        User::where('id', $daftar['users_id'])->update([
            'username' => $daftar['username']
        ]);

        $request = session();
        $request->flash('success', 'Berhasil mengubah akun');
        return redirect('/ubahadmin');
    }
}
