<?php

namespace App\Http\Controllers;

use App\Models\Kios;
use App\Models\Petani;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Controller\PDF;
use App\Models\M_LaporanKios;
use App\Models\M_Persetujuan;
use Carbon\Carbon;
use Illuminate\Validation\Validator;


class C_LaporanKios extends Controller
{
    // public function showFiles()
    // {
    //     $files = Kios::all(); // Fetch all files from the database
    //     return view('pemerintah.laporanpemerintah', compact('files'));
    // }

    public function index()
    {
        return view('pemerintah.coba');
    }

    public function viewer($id)
    {
        $petani = M_LaporanKios::find($id);
        // $profil = Kios::whereIn('id', $petani)->first();

    // Assuming 'laporan' is a field in your Kios model that holds the file name
        // $filePath = asset('laporan/' . $data->laporan);  // Generates a URL to a file stored in the public directory

    return view('pemerintah.liatlaporan', compact('petani'));
    }

    public function verif_laporan()
    {
        $petani = M_LaporanKios::all();
        $persetujuan = M_Persetujuan::all();
        Carbon::setLocale('id');
        $tgl= Carbon::now()->isoFormat('ddd, LL');
        return view('pemerintah.persetujuan', compact('petani', 'tgl', 'persetujuan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'laporan' => 'required|file|mimes:pdf'
        ]);

        if ($request->hasFile('laporan')) {
            $file = $request->file('laporan');
            $destinationPath = 'laporan';  // Ensure this directory exists and is writable
            $nama_file = time() . '_' . $file->getClientOriginalName();  // Prefixing file name with timestamp to avoid conflicts
            $file->move(public_path($destinationPath), $nama_file);
            $data['laporan'] = $nama_file;  // You might want to save a full path or URL depending on your requirements
        }

        M_LaporanKios::create($data);

        return back()->with('success', 'File has been uploaded and data saved successfully.');
    }

    public function ubahverifkomentar($id)
    {   
        $data = M_LaporanKios::all();
        $persetujuan = M_Persetujuan::all();
        $datapetani = M_LaporanKios::findOrFail($id);
        $petani = M_LaporanKios::find($id);
        // dd($datapetani);

        return view('pemerintah.ubahkomentarlaporan', compact('data', 'datapetani', 'persetujuan', 'petani'));
    }

    public function storeverifkomentar(Request $request)
    {
        $daftar= $request->validate([
            'id' => 'numeric',
            'komentar' => 'required'
        ]);
        
        M_LaporanKios::where('id',$request['id'])->update([
            'komentar' => $daftar['komentar']
        ]);

        $request = session();
        $request->flash('success', 'Berhasil menambahkan akun, Silakan Login!');
        return redirect('/ubahkomentarkios');
    }

    public function storeveriflaporan(Request $request)
    {
        if($request['persetujuan'] == 'Terima'){
            $persetujuan = 1;
        }else{
            $persetujuan = 2;
        }
        
        M_LaporanKios::where('id',$request['id'])->update([
            'persetujuans_id' => $persetujuan
        ]);

        $request = session();
        $request->flash('success', 'Berhasil menambahkan akun, Silakan Login!');
        return redirect('/ubahverifkios');
    }

    public function ubahveriflaporan($id)
    {   
        $data = M_LaporanKios::all();
        $persetujuan = M_Persetujuan::all();
        $datapetani = M_LaporanKios::findOrFail($id);
        $petani = M_LaporanKios::find($id);
        // dd($datapetani);

        return view('pemerintah.ubahveriflaporan', compact('data', 'datapetani', 'persetujuan', 'petani'));
    }


    public function download($id)
    {
        $file = M_LaporanKios::findOrFail($id); // Ensure the file exists
        $filePath = public_path('laporan/' . $file->laporan); // Adjust the path as necessary

        if ($filePath) {
            return response()->download($filePath, $file->laporan);
        } else {
            return redirect()->back()->with('error', 'File not found.');
        }
    }

    
}


