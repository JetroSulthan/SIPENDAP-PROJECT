<?php

namespace App\Http\Controllers;

use App\Models\Kios;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Validator;


class KiosController extends Controller
{
    public function showFiles()
    {
        $files = Kios::all(); // Fetch all files from the database
        return view('pemerintah.laporankios', compact('files'));
    }

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

    public function download(Request $request, $file)
{
    return response()->download(public_path('laporan/' . $file));
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

    /**
     * Store a newly created resource in storage.
     */

    public function show(Kios $kios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kios $kios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kios $kios)
    {
        //
    }
}
