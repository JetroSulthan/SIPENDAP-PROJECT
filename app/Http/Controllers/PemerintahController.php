<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use App\Models\DataLahan;
use App\Models\Dukcapil;
use App\Models\JenisKelamin;
use App\Models\KategoriPetani;
use App\Models\KelompokTani;
use App\Models\Kios;
use App\Models\Komoditas;
use App\Models\Pemerintah;
use App\Models\Persetujuan;
use App\Models\Petani;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Debug\Dumper;
use Illuminate\Support\Facades\Auth;

class PemerintahController extends Controller
{
    public function index()
    {
        $berkas = Berkas::all();
        $data_lahan = DataLahan::all();
        // dd($data_lahan);
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
        $berkas = Berkas::all();
        $datapetani = Petani::with('berkas', 'datalahan', 'persetujuan')->get();
        $data_lahan = DataLahan::all();
        $persetujuan = Persetujuan::all();
        $dukcapil = Dukcapil::all();
        // dd($persetujuan);
        $tgl = Carbon::now()->isoFormat('ddd, LL');
        
        return view('pemerintah.verif', compact('datapetani', 'tgl', 'berkas', 'data_lahan', 'persetujuan', 'dukcapil'));
    }

    public function kelompok()
    {
        $keltani = KelompokTani::all();
        
        return view('pemerintah.keltani', compact('keltani'));
    }

    public function detailkelompok($id)
    {   
        $data = Petani::all();
        $petani = Petani::find($id);
        $profil = Petani::where('id', $petani);
        // dd($petani);
        // $profil = KelompokTani::find($id);
        $kelamin = JenisKelamin::all();
        $user = User::all();
        $userId = $profil->pluck('users_id')->toArray();
        $kelaminId = $profil->pluck('jenis_kelamins_id')->toArray();
        // dd($kelamin);
        $users = User::whereIn('id', $userId)->first();
        $kelaminuser = JenisKelamin::whereIn('id', $kelaminId)->first();

        return view('pemerintah.detail', compact('profil','kelamin', 'kelaminuser', 'user', 'users', 'data', 'petani'));
    }

    public function verif_laporan()
    {
        $petani = Kios::all();
        $persetujuan = Persetujuan::all();
        $tgl= Carbon::now()->isoFormat('ddd, LL');
        return view('pemerintah.persetujuan', compact('petani', 'tgl', 'persetujuan'));
    }

    public function pdf_pemerintah(){
        $mpdf = new \Mpdf\Mpdf();
        $petani = Kios::all();
        $persetujuan = Persetujuan::all();
        $tgl = Carbon::now()->isoFormat('ddd, LL');
        $html = view('pemerintah.persetujuan', compact('petani', 'tgl', 'persetujuan'));
        $mpdf->WriteHTML($html);
        $mpdf->Output('laporan_pemerintah.pdf', );
    }

    public function showFiles()
    {
        $files = Kios::all(); // Fetch all files from the database
        return view('pemerintah.laporanpemerintah', compact('files'));
    }

    public function cobafile()
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

    public function download($file)
    {
        $download = public_path('laporan/' . $file);
        return response()->download($download);
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

    public function ubahverif($id)
    {   
        $data = Petani::all();
        // $profil = Petani::where('id', $data)->first();
        $kelamin = JenisKelamin::all();
        $berkas = Berkas::all();
        $datalahan = DataLahan::all();
        $user = User::all();
        $persetujuan = Persetujuan::all();
        // $userId = $profil->pluck('users_id')->toArray();
        // $kelaminId = $profil->pluck('jenis_kelamins_id')->toArray();
        // $berkasId = $profil->pluck('berkas_id')->toArray();
        // dd($kelamin);
        // $users = User::whereIn('id', $userId)->first();
        // $kelaminuser = JenisKelamin::whereIn('id', $kelaminId)->first();
        // $berkasuser = Berkas::whereIn('id', $kelaminId)->first();
        $datapetani = Petani::findOrFail($id);
        // dd($datapetani);

        return view('pemerintah.ubah', compact('datalahan','kelamin', 'user', 'data', 'datapetani', 'berkas', 'persetujuan'));
    }

    public function ubahveriflaporan($id)
    {   
        $data = Kios::all();
        // $profil = Petani::where('id', $data)->first();
        // $kelamin = JenisKelamin::all();
        // $berkas = Berkas::all();
        // $datalahan = DataLahan::all();
        // $user = User::all();
        $persetujuan = Persetujuan::all();
        // $userId = $profil->pluck('users_id')->toArray();
        // $kelaminId = $profil->pluck('jenis_kelamins_id')->toArray();
        // $berkasId = $profil->pluck('berkas_id')->toArray();
        // dd($kelamin);
        // $users = User::whereIn('id', $userId)->first();
        // $kelaminuser = JenisKelamin::whereIn('id', $kelaminId)->first();
        // $berkasuser = Berkas::whereIn('id', $kelaminId)->first();
        $datapetani = Kios::findOrFail($id);
        $petani = Kios::find($id);
        // dd($datapetani);

        return view('pemerintah.ubah2', compact('data', 'datapetani', 'persetujuan', 'petani'));
    }

    public function storeveriflaporan(Request $request)
    {
        $daftar= $request->validate([
            'id' => 'numeric',
            'komentar' => 'required',
            'persetujuan' => 'required'
        ]);
        
        $daftar['persetujuans_id']= $request ->input('persetujuan');
        
        Kios::where('id',$daftar['id'])->update([
            'komentar' => $daftar['komentar'],
            'persetujuans_id' => $daftar['persetujuan']
        ]);

        $request = session();
        $request->flash('success', 'Berhasil menambahkan akun, Silakan Login!');
        return redirect('/veriflaporan');
    }

    public function storeverif(Request $request)
    {
        $daftar= $request->validate([
            'id' => 'numeric',
            'berkas' => 'required',
            'data_lahan' => 'required',
            'komentar' => 'required',
            'persetujuan' => 'required'
        ]);
        
        $daftar['berkas_id']= $request ->input('berkas');
        $daftar['data_lahans_id']= $request ->input('data_lahan');
        $daftar['persetujuans_id']= $request ->input('persetujuan');
        
        // Petani::create([
            
        // ]);

        Petani::where('id',$daftar['id'])->update([
            'komentar' => $daftar['komentar'],
            'berkas_id' => $daftar['berkas'],
            'data_lahans_id' => $daftar['data_lahan'],
            'persetujuans_id' => $daftar['persetujuan']
        ]);

        $request = session();
        $request->flash('success', 'Berhasil menambahkan akun, Silakan Login!');
        return redirect('/verifpetani');
    }

    public function dataakun()
    {
        $userlogin = Auth::id(); // Cara lebih singkat untuk mendapatkan ID user yang sedang login
        $keltani = Pemerintah::where('id', $userlogin)->first(); // Sesuaikan kolom dengan struktur tabel Anda
        $user = Auth::user();
        // $pemerintah = Pemerintah::where('id', $keltani)->first();
        // $data = Pemerintah::all();
        
        return view('pemerintah.datapemerintah', compact('keltani', 'user'));
    }

    public function generatePdf()
    {
        $petani = Petani::all();
        $tgl = now()->format('Y-m-d'); // Example for the date

        $pdf = PDF::loadView('pemerintah.persetujuan', compact('petani', 'tgl'));
        return $pdf->download('laporan_petani.pdf');
    }
}