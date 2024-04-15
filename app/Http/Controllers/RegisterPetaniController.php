<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Petani;
use App\Models\Komoditas;
use App\Models\JenisKelamin;
use Illuminate\Http\Request;
use App\Models\KategoriPetani;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterPetaniController extends Controller
{
    public function petani()
    {
        return view('kelompoktani.daftar', [
            'title' => 'Register',
            'kategoris' => KategoriPetani::all(),
            'jenis_kelamins'  => JenisKelamin::all(),
            'komoditas' => Komoditas::all()

        ]);

    }

    public function regisPetani(Request $request)
    {
        $regist= $request->validate([
            'nama_lengkap' => 'required',
            'nik' => 'required | unique:petanis',
            // 'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required | date',
            'jalan' => 'required',
            'kecamatan' => 'required',
            'kota' => 'required',
            // 'komoditas' => 'required',
            'vol_komoditas' => 'required',
            'luas_lahan' => 'required',
            'titik_koor_lahan' => 'required',
            'no_telp' => 'required',
            'kategori_petanis' => 'required',
            'scan_ktp' => 'required |file',
            'scan_kk' => 'required | file',
            'foto_lahan' => 'required |file'
        ]);

        $regist['jenis_kelamins_id']= $request ->input('jenis_kelamin');
        $regist['komoditas_id']= $request ->input('komoditas');
        $regist['kategori_petanis_id']= $request ->input('kategori_petanis');
        

        Petani::create(
        // 'nama_lengkap' => $regist['nama_lengkap'],
        // 'nik' => $regist['nik'],
        // 'jenis_kelamins_id' => $regist['jenis_kelamin'],
        // 'tempat_lahir' => $regist['tempat_lahir'],
        // 'tanggal_lahir' => $regist['tanggal_lahir'],
        // 'jalan' => $regist['jalan'],
        // 'kecamatan' => $regist['kecamatan'],
        // 'kota' => $regist['kota'],
        // 'komoditas_id' => $regist['komoditas'],
        // 'vol_komoditas' => $regist['vol_komoditas'],
        // 'luas_lahan' => $regist['luas_lahan'],
        // 'titik_koor_lahan' => $regist['titik_koor_lahan'],
        // 'no_telp' => $regist['no_telp'],
        // 'kategori_petanis_id' => $regist['kategori_petanis'],
        // 'scan_ktp' => $regist['scan_ktp'],
        // 'scan_kk' => $regist['scan_kk'],
        // 'foto_lahan' => $regist['foto_lahan'],
        // // Tambahkan nilai default untuk kolom-kolom yang tidak Anda isi pada saat pembuatan record baru
        // 'persetejuans_id' => null, // Misalnya, nilai default untuk persetujuan
        // 'komentar' => null, // Misalnya, nilai default untuk komentar
        // 'pemerintah_id' => null, // Misalnya, nilai default untuk ID pemerintah
        // 'kelompok_tani_id' => null // Misalnya, nilai default untuk ID kelompok tani
        $regist);

        // var_dump($request->all());
        $request->session()->flash('success', 'Berhasil menambahkan akun, Silakan Login!');
        return redirect('/login');
    }
}
