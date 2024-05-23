<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Kios;
use Illuminate\Http\Request;
use App\Models\LaporanPemerintah;
use App\Http\Controllers\Controller;

class LaporanPemerintahController extends Controller
{
    public function pdf_pemerintah(){
        $mpdf = new \Mpdf\Mpdf();
        $petani = Kios::all();
        $tgl = Carbon::now()->isoFormat('ddd, LL');
        $html = view('pemerintah.persetujuan', compact('petani', 'tgl'));
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    public function cobakirim(){
        return view('pemerintah.coba2');
    }

    public function kirim_pemerintah(Request $request){
        $data = $request->validate([
            'laporan' => 'required|file|mimes:pdf'
        ]);

        if ($request->hasFile('laporan')) {
            $file = $request->file('laporan');
            $destinationPath = 'laporanpemerintah';  // Ensure this directory exists and is writable
            $nama_file = time() . '_' . $file->getClientOriginalName();  // Prefixing file name with timestamp to avoid conflicts
            $file->move(public_path($destinationPath), $nama_file);
            $data['laporan'] = $nama_file;  // You might want to save a full path or URL depending on your requirements
        }

        LaporanPemerintah::create($data);

        return back()->with('success', 'File has been uploaded and data saved successfully.');
    }

    
}
