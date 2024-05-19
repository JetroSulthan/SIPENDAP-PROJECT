<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BeritaController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        // $currentuser = User::find($id);
        $broadcastBerita = Berita::orderBy('created_at', 'DESC')->get();

        return view('admin.berita', compact('broadcastBerita', 'id'));
    }

    public function detail(Request $request, $id)
    {
        $broadcastBerita = Berita::findOrFail($id);
        $users_id = $broadcastBerita['users_id'];
        $currentuser = User::find($users_id);

        return view('admin.detailBerita', compact('broadcastBerita', 'currentuser'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.createBerita');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id = Auth::user()->id;

        $validatedAdd = $request->validate([
            'thumbnail'=> 'required|file|mimes:jpg,jpeg,png',
            'judul'=> 'required',
            'isi_berita'=> 'required',
            'users_id',
        ]);

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $file_name = $file->getClientOriginalName();
            $file->move('img', $file_name);
            $validatedAdd['thumbnail'] = $file_name;
        };

        $validatedAdd['users_id'] = $id;
        Berita::create($validatedAdd);

        return redirect('berita')->with('success', 'Berita Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $broadcastBerita = Berita::findOrFail($id);
        return view('admin.updateBerita', compact('broadcastBerita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $broadcastBerita = Berita::findOrFail($id);

        $validatedUpdate = $request->validate([
            'thumbnail'=> 'file|mimes:jpg,jpeg,png',
            'judul'=> 'required',
            'isi_berita'=> 'required',
        ]);

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $file_name = $file->getClientOriginalName();
            $file->move('img', $file_name);
            $validatedUpdate['thumbnail'] = $file_name;
        };

        $isiBerita = [
            'isi'=>$request->isi,
        ];

        $validatedUpdate['isi'] = $isiBerita['isi'];

        $broadcastBerita->update($validatedUpdate);

        return redirect('berita')->with('success', 'Berita Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $destroy = Berita::findOrFail($id);
        $destroy->delete();
        return redirect('berita')->with('success', 'Berita Berhasil Dihapus!');
    }
}
