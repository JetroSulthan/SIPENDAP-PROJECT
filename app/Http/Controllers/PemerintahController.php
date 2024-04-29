<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Berkas;
use App\Models\Petani;
use App\Models\DataLahan;
use App\Models\KelompokTani;
use App\Models\Persetujuan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Debug\Dumper;
use Illuminate\Support\Facades\Auth;

class PemerintahController extends Controller
{
    public function index()
    {
        $berkas = Berkas::all();
        $data_lahan = DataLahan::all();
        // $id = Auth::user()->id;
        $datapetani = Petani::all();
        $tgl= Carbon::now()->isoFormat('ddd, LL');
        
        return view('pemerintah.verif', compact('datapetani', 'berkas', 'data_lahan','tgl'));
    }

    public function regisPetani(Request $request)
    {
        $regist= $request->validate();

        $regist['berkas_id']= $request ->input('berkas');
        $regist['data_lahans_id']= $request ->input('data_lahan');
        // $regist['kategori_petanis_id']= $request ->input('kategori_petanis');
        

        Petani::create($regist);

        $request = session();
        // var_dump($request->all());
        $request->flash('success', 'Berhasil menambahkan akun, Silakan Login!');
    }

    public function lihat()
    {
        // $berkas = Berkas::all();
        $datapetani = Petani::all();
        // dd($datapetani->DataLahan);
        // $petani = Petani::with('Berkas', 'DataLahan', 'Persetujuan')->first();
        // $data_lahan = DataLahan::all();
        // $persetujuan = Persetujuan::all();
        // $berkasId = $datapetani->pluck('berkas_id')->toArray();
        // $dataId = $datapetani->pluck('data_lahans_id')->toArray();
        // $persId= $datapetani->pluck('persetujuans_id')->toArray();
        // // dd($berkasId);
        // $berkasuser = Berkas::whereIn('id', $berkasId)->first();
        // $lahan_user = DataLahan::whereIn('id', $dataId)->first();
        // $pers_user = Persetujuan::whereIn('id', $persId)->first();
        // dd($lahan_user);
        $tgl= Carbon::now()->isoFormat('ddd, LL');
        return view('pemerintah.verif', compact( 'datapetani','tgl'));
    }

    public function kelompok()
    {
        $keltani = KelompokTani::all();
        
        return view('pemerintah.keltani', compact('keltani'));
    }

    public function detailkelompok($id)
    {   
        // $data = Petani::all();
        // $petani = Petani::find($data);
        // $profil = Petani::where('id', $data)->first();
        $profil = KelompokTani::find($id);
        $kelamin = $profil->JenisKelamin;
        dd($kelamin);

        return view('pemerintah.detail', compact('profil','kelamin'));
    }
}