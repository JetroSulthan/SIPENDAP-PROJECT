<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Petani;
use App\Models\DataLahan;
use App\Models\Komoditas;
use App\Models\JenisKelamin;
use Illuminate\Http\Request;
use App\Models\KategoriPetani;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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

    public function edit($id)
    {   
        // $data = Petani::all();
        // $petani = Petani::find($data);
        // $profil = Petani::where('id', $data)->first();
        $profil = Petani::find($id);
        $kelamin = JenisKelamin::all();
        $komoditas = Komoditas::all();
        $kategori = KategoriPetani::all();
        // $kategoriId = $data->pluck('kategori_petanis_id')->toArray();
        // $komoditasId = $data->pluck('komoditas_id')->toArray();
        // $kelaminId = $data->pluck('jenis_kelamins_id')->toArray();
        $kategoriId = $profil->pluck('kategori_petanis_id')->toArray();
        $komoditasId = $profil->pluck('komoditas_id')->toArray();
        $kelaminId = $profil->pluck('jenis_kelamins_id')->toArray();
        // dd($berkasId);
        $kategoriuser = KategoriPetani::whereIn('id', $kategoriId)->first();
        $kelaminuser = JenisKelamin::whereIn('id', $kelaminId)->first();
        $komoditasuser = Komoditas::whereIn('id', $komoditasId)->first();

        // $lahan_user = DataLahan::whereIn('id', $dataId)->first();

        return view('kelompoktani.data', compact('kelamin', 'kategori', 'kategoriId', 'komoditas', 'komoditasId', 'kategoriuser', 'komoditasuser', 'kelamin','kelaminId','kelaminuser', 'profil'));
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
        

        Petani::create($regist);

        // var_dump($request->all());
        $request->session()->flash('success', 'Berhasil menambahkan akun, Silakan Login!');
        return redirect('/home');
    }
}
