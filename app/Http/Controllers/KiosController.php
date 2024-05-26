<?php

namespace App\Http\Controllers;

use App\Models\Kios;
use App\Models\Petani;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Controller\PDF;
use Illuminate\Validation\Validator;


class KiosController extends Controller
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
        $petani = Kios::find($id);
        // $profil = Kios::whereIn('id', $petani)->first();

    // Assuming 'laporan' is a field in your Kios model that holds the file name
        // $filePath = asset('laporan/' . $data->laporan);  // Generates a URL to a file stored in the public directory

    return view('pemerintah.liatlaporan', compact('petani'));
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

        Kios::create($data);

        return back()->with('success', 'File has been uploaded and data saved successfully.');
    }

    public function download($id)
    {
        $file = Kios::findOrFail($id); // Ensure the file exists
        $filePath = public_path('laporan/' . $file->laporan); // Adjust the path as necessary

        if ($filePath) {
            return response()->download($filePath, $file->laporan);
        } else {
            return redirect()->back()->with('error', 'File not found.');
        }
    }

    
}


