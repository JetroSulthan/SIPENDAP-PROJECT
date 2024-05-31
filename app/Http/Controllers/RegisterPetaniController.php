<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Berkas;
use App\Models\Petani;
use App\Models\Dukcapil;
use App\Models\M_Petani;
use App\Models\DataLahan;
use App\Models\Komoditas;
use App\Models\Pemerintah;
use App\Models\Persetujuan;
use App\Models\JenisKelamin;
use App\Models\KelompokTani;
use Illuminate\Http\Request;
use App\Models\M_Persetujuan;
use App\Models\KategoriPetani;
use App\Models\M_KelompokTani;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
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

    public function lihat($id)
    {   
        $profil = M_Petani::find($id);
        $kategoriId = $profil->kategori_petanis_id;
        $komoditasId = $profil->komoditas_id;
        $kelaminId = $profil->jenis_kelamins_id;
        // dd($berkasId);
        $kategoriuser = KategoriPetani::where('id', $kategoriId)->first();
        $kelaminuser = JenisKelamin::where('id', $kelaminId)->first();
        $komoditasuser = Komoditas::where('id', $komoditasId)->first();

        // $lahan_user = DataLahan::whereIn('id', $dataId)->first();

        return view('kelompoktani.data', compact('kategoriId', 'komoditasId', 'kategoriuser', 'komoditasuser','kelaminId','kelaminuser', 'profil'));
    }

    public function ubah($id)
    {   
        // $data = Petani::all();
        // $petani = Petani::find($data);
        // $profil = Petani::where('id', $data)->first();
        $profil = M_Petani::find($id);
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

        return view('kelompoktani.ubahdatapetani', compact('kelamin', 'kategori', 'kategoriId', 'komoditas', 'komoditasId', 'kategoriuser', 'komoditasuser', 'kelamin','kelaminId','kelaminuser', 'profil'));
    }

    public function regisPetani(Request $request)
    {
        $regist= $request->validate([
            'nama_lengkap' => 'required',
            'nik' => 'required |numeric| unique:petanis',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required | date',
            'jalan' => 'required',
            'kecamatan' => 'required',
            'kota' => 'required',
            'jenis_kelamin' => 'required',
            'vol_komoditas' => 'required|numeric',
            'luas_lahan' => 'required|numeric',
            'titik_koor_lahan' => 'required',
            'no_telp' => 'required|numeric',
            'kategori_petanis' => 'required',
            'scan_ktp' => 'required |file|mimes:png,jpg,pdf,jpeg',
            'scan_kk' => 'required | file|mimes:png,jpg,pdf,jpeg',
            'foto_lahan' => 'required |file|mimes:png,jpg,pdf,jpeg'
        ], [
            'nama_lengkap.required' => 'Data Harus Diisi!',
            'nik.required' => 'Data Harus Diisi!',
            'nik.numeric' => 'Wajib berbentuk Angka (0-9)!',
            'nik.unique' => 'NIK telah terdaftar pada Sistem, Silahkan Gunakan NIK yang Lain!',
            'tempat_lahir.required' => 'Data Harus Diisi!',
            'tanggal_lahir.required' => 'Data Harus Diisi!',
            'jalan.required' => 'Data Harus Diisi!',
            'jenis_kelamin.required' => 'Data Harus Diisi!',
            'kecamatan.required' => 'Data Harus Diisi!',
            'kota.required' => 'Data Harus Diisi!',
            'vol_komoditas.required' => 'Data Harus Diisi!',
            'vol_komoditas.numeric' => 'Wajib berbentuk Angka (0-9)!',
            'luas_lahan.required' => 'Data Harus Diisi!',
            'luas_lahan.numeric' => 'Wajib berbentuk Angka (0-9)!',
            'titik_koor_lahan.required' => 'Data Harus Diisi!',
            'no_telp.required' => 'Data Harus Diisi!',
            'kategori_petanis.required' => 'Data Harus Diisi!',
            'scan_ktp.required' => 'Data Harus Diisi!',
            'scan_ktp.mimes' => 'File Harus Berupa .png, .jpg, .pdf, .jpeg',
            'scan_kk.required' => 'Data Harus Diisi!',
            'scan_kk.mimes' => 'File Harus Berupa .png, .jpg, .pdf, .jpeg',
            'foto_lahan.required' => 'Data Harus Diisi!',
            'foto_lahan.mimes' => 'File Harus Berupa .png, .jpg, .pdf, .jpeg',
        ]);

        $regist['jenis_kelamins_id'] = $request->input('jenis_kelamin');
        $regist['komoditas_id'] = $request->input('komoditas');
        $regist['kategori_petanis_id'] = $request->input('kategori_petanis');

        $fileupload = [
            'scan_ktp',
            'scan_kk',
            'foto_lahan'
        ];

        foreach ($fileupload as $upload) {
            if ($request->hasFile($upload)) {
                $file = $request->file($upload);
                $nama_file = $file->getClientOriginalName();
                $file->move('assets', $nama_file);
                $regist[$upload] = $nama_file;
            }
        }

        M_Petani::create($regist);

        $request = session();
        // var_dump($request->all());
        $request->flash('success', 'Data Petani Sudah Berhasil Dibuat');
        return redirect('/mengubahdatapetanis');
    }

    public function ubahpetani(Request $request)
    {
        $regist= $request->validate([
            'id'=> 'numeric',
            'nama_lengkap' => 'required',
            'nik' => [
                'required',
                'numeric',
                Rule::unique('petanis')->ignore($request->id),
            ],
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required | date',
            'jalan' => 'required',
            'kecamatan' => 'required',
            'kota' => 'required',
            'vol_komoditas' => 'required',
            'luas_lahan' => 'required',
            'titik_koor_lahan' => 'required',
            'no_telp' => 'required',
            'kategori_petanis' => 'required',
        ], [
            'nama_lengkap.required' => 'Data Harus Diisi',
            'nik.numeric' => 'NIK wajib berupa Angka!',
            'nik.required' => 'Data Harus Diisi!',
            'nik.unique' => 'Data Harus Diisi!',
            'tempat_lahir.required' => 'Data Harus Diisi!',
            'tanggal_lahir.required' => 'Data Harus Diisi!',
            'jalan.required' => 'Data Harus Diisi!',
            'kecamatan.required' => 'Data Harus Diisi!',
            'kota.required' => 'Data Harus Diisi!',
            'vol_komoditas.required' => 'Data Harus Diisi!',
            'luas_lahan.required' => 'Data Harus Diisi!',
            'titik_koor_lahan.required' => 'Data Harus Diisi!',
            'no_telp.required' => 'Data Harus Diisi!',
            'kategori_petanis.required' => 'Data Harus Diisi!',
            'jenis_kelamin.required' => 'Data Harus Diisi!',
            'komoditas.required' => 'Data Harus Diisi!'
        ]);

        $folders = ['ktp', 'kk', 'fotolahan'];

        // Ensure the directories exist
        foreach ($folders as $folder) {
            if (!File::exists(public_path($folder))) {
                File::makeDirectory(public_path($folder), 0755, true);
            }
        }

        $filektp = 'scan_ktp';
        $filekk = 'scan_kk';
        $filelahan = 'foto_lahan';



            if ($request->hasFile($filektp)) {
                $file = $request->file($filektp);
                $nama_file = $file->getClientOriginalName();
                $file->move('ktp', $nama_file);
                $regist[$filektp] = $nama_file;
            }

            if ($request->hasFile($filekk)) {
                $file = $request->file($filekk);
                $nama_file = $file->getClientOriginalName();
                $file->move('kk', $nama_file);
                $regist[$filekk] = $nama_file;
            }

            if ($request->hasFile($filelahan)) {
                $file = $request->file($filelahan);
                $nama_file = $file->getClientOriginalName();
                $file->move('fotolahan', $nama_file);
                $regist[$filelahan] = $nama_file;
            }
        
        
        
        $regist['jenis_kelamins_id']= $request ->input('jenis_kelamin');
        $regist['komoditas_id']= $request ->input('komoditas');
        $regist['kategori_petanis_id']= $request ->input('kategori_petanis');
        $regist['scan_kk'] = $request ->input('scan_kk');
        $regist['scan_ktp'] = $request ->input('scan_ktp');
        $regist['foto_lahan'] = $request ->input('foto_lahan');
        
        

        M_Petani::where('id',$regist['id'])->update([
            'nama_lengkap' => $regist['nama_lengkap'],
            'nik' => $regist['nik'],
            'tempat_lahir' => $regist['tempat_lahir'],
            'tanggal_lahir' => $regist['tanggal_lahir'],
            'jalan' => $regist['jalan'],
            'kecamatan' => $regist['kecamatan'],
            'kota' => $regist['kota'],
            'vol_komoditas' => $regist['vol_komoditas'],
            'luas_lahan' => $regist['luas_lahan'],
            'titik_koor_lahan' => $regist['titik_koor_lahan'],
            'no_telp' => $regist['no_telp'],
            'kategori_petanis_id' => $regist['kategori_petanis_id'],
            'jenis_kelamins_id' => $regist['jenis_kelamins_id'],
            'komoditas_id' => $regist['komoditas_id'],
            'scan_kk' => $regist['scan_kk'],
            'scan_ktp' => $regist['scan_ktp'],
            'foto_lahan' => $regist['foto_lahan']
        ]);

        $request = session();
        // var_dump($request->all());
        $request->flash('success', 'Data Petani Sudah Berhasil Dibuat');
        return redirect('/mengubahdatapetanis');
    }

    public function verif()
    {
        
        $berkas = Berkas::all();
        $datapetani = M_Petani::with('berkas', 'datalahan', 'persetujuan')->get();
        $data_lahan = DataLahan::all();
        $persetujuan = M_Persetujuan::all();
        $dukcapil = Dukcapil::all();
        Carbon::setLocale('id');
        $tgl= Carbon::now()->isoFormat('ddd, LL');

        return view('kelompoktani.verif', compact( 'datapetani','tgl', 'berkas', 'persetujuan', 'dukcapil', 'data_lahan'));
    }

    public function dataakun()
    {
        $userlogin = Auth::id(); // Cara lebih singkat untuk mendapatkan ID user yang sedang login
        $keltani = M_KelompokTani::where('users_id', $userlogin)->first(); // Sesuaikan kolom dengan struktur tabel Anda
        $user = Auth::user();
        
        return view('kelompoktani.datakelompoktani', compact('keltani', 'user'));
    }

    public function ubahakun()
    {
        $userlogin = Auth::id(); // Cara lebih singkat untuk mendapatkan ID user yang sedang login
        $keltani = M_KelompokTani::where('users_id', $userlogin)->first(); // Sesuaikan kolom dengan struktur tabel Anda
        $user = Auth::user();
        
        return view('kelompoktani.ubahdatakelompoktani', compact('keltani', 'user'));
    }

    public function storeubah(Request $request)
    {
        $daftar= $request->validate([
            'users_id' => 'numeric',
            'username' => 'required',
            'nama_lengkap' => 'required',
            'nik' => 'required',
            'jalan' => 'required',
            'kecamatan' => 'required',
            'kota' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required'
        ]);

        M_KelompokTani::where('users_id',$daftar['users_id'])->update([
            'nama_lengkap' => $daftar['nama_lengkap'],
            'nik' => $daftar['nik'],
            'jalan' => $daftar['jalan'],
            'kecamatan' => $daftar['kecamatan'],
            'kota' => $daftar['kota'],
            'tanggal_lahir' => $daftar['tanggal_lahir'],
            'tempat_lahir' => $daftar['tempat_lahir']
        ]);

        User::where('id', $daftar['users_id'])->update([
            'username' => $daftar['username']
        ]);

        $request = session();
        $request->flash('success', 'Berhasil mengubah akun');
        return redirect('/data-akun');
    }
}
