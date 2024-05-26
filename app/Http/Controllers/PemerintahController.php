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
use App\Models\LaporanPemerintah;
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
        // $data = Petani::all();
        // $petani = Petani::find($id);
        // $profil = Petani::where('id', $petani);
        // // dd($petani);
        // // $profil = KelompokTani::find($id);
        // $kelamin = JenisKelamin::all();
        // $user = User::all();
        // $userId = $profil->pluck('id')->toArray();
        // $kelaminId = $profil->pluck('jenis_kelamins_id')->toArray();
        // // dd($kelamin);
        // $users = User::whereIn('id', $userId)->first();
        // $kelaminuser = JenisKelamin::whereIn('id', $kelaminId)->first();

        $data = Petani::all();
        $kelamin = JenisKelamin::all();
        $user = User::all();

        // Mencari petani berdasarkan ID yang diberikan
        // $petani = KelompokTani::find($id);
        $profil = KelompokTani::where('id', $id)->first();
        // Mengambil user ID dan kelamin ID dari profil
        $userId = $profil->users_id; 
        // dd($userId); // Asumsikan ada kolom user_id di tabel Petani
        $kelaminId = $profil->jenis_kelamins_id;  // Asumsikan ada kolom jenis_kelamins_id di tabel Petani

        // Mencari user dan jenis kelamin berdasarkan ID yang telah diambil
        $users = User::find($userId);
        $kelaminuser = JenisKelamin::find($kelaminId);

        return view('pemerintah.detail', compact('profil','kelamin', 'kelaminuser', 'user', 'users', 'data'));
    }

    public function ubahdetail($id)
    {   
        // $data = Petani::all();
        // $petani = Petani::find($id);
        // $profil = Petani::where('id', $petani);
        // // dd($petani);
        // // $profil = KelompokTani::find($id);
        // $kelamin = JenisKelamin::all();
        // $user = User::all();
        // $userId = $profil->pluck('id')->toArray();
        // $kelaminId = $profil->pluck('jenis_kelamins_id')->toArray();
        // // dd($kelamin);
        // $users = User::whereIn('id', $userId)->first();
        // $kelaminuser = JenisKelamin::whereIn('id', $kelaminId)->first();

        $data = Petani::all();
        $kelamin = JenisKelamin::all();
        $user = User::all();

        // Mencari petani berdasarkan ID yang diberikan
        // $petani = KelompokTani::find($id);
        $profil = KelompokTani::where('id', $id)->first();
        // Mengambil user ID dan kelamin ID dari profil
        $userId = $profil->users_id; 
        // dd($userId); // Asumsikan ada kolom user_id di tabel Petani
        $kelaminId = $profil->jenis_kelamins_id;  // Asumsikan ada kolom jenis_kelamins_id di tabel Petani
        
        // Mencari user dan jenis kelamin berdasarkan ID yang telah diambil
        $users = User::find($userId);
        // dd($users);
        $kelaminuser = JenisKelamin::find($kelaminId);

        return view('pemerintah.ubahdatakeltani', compact('profil','kelamin', 'kelaminuser', 'user', 'users', 'userId', 'data'));
    }

    public function storeubahdetail(Request $request)
    {
        $daftar= $request->validate([
            'id' => 'numeric',
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

        $daftar['jenis_kelamins_id'] = $request->input('jenis_kelamin');

        KelompokTani::where('id',$daftar['id'])->update([
            'nama_lengkap' => $daftar['nama_lengkap'],
            'nik' => $daftar['nik'],
            'jalan' => $daftar['jalan'],
            'kecamatan' => $daftar['kecamatan'],
            'kota' => $daftar['kota'],
            'tanggal_lahir' => $daftar['tanggal_lahir'],
            'tempat_lahir' => $daftar['tempat_lahir'],
            'jenis_kelamins_id' => $daftar['jenis_kelamins_id']
        ]);

        User::where('id', $daftar['users_id'])->update([
            'username' => $daftar['username']
        ]);

        $request = session();
        $request->flash('success', 'Berhasil mengubah akun');
        return redirect('/mengubahdatakeltani');
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
        $mpdf->Output('laporan_pemerintah.pdf', 'I');
    }

    public function laporan_tes()
    {
        $petani = Kios::all();
        $persetujuan = Persetujuan::all();
        $tgl= Carbon::now()->isoFormat('ddd, LL');
        return view('pemerintah.test', compact('petani', 'tgl', 'persetujuan'));
    }

    public function pdf_test(){
        $mpdf = new \Mpdf\Mpdf();
        $petani = Kios::all();
        $persetujuan = Persetujuan::all();
        $tgl = Carbon::now()->isoFormat('ddd, LL');
        $html = view('pemerintah.test', compact('petani', 'tgl', 'persetujuan'));
        $mpdf->WriteHTML($html);
        $mpdf->Output('laporan_pemerintah.pdf', 'I');
    }

    public function showFiles()
    {
        $files = LaporanPemerintah::all(); // Fetch all files from the database
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

    public function viewerpemerintah($id)
    {
        $petani = LaporanPemerintah::find($id);
        
    return view('pemerintah.liatlaporanpemerintah', compact('petani'));
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

        return view('pemerintah.ubahverifpetani', compact('datalahan','kelamin', 'user', 'data', 'datapetani', 'berkas', 'persetujuan'));
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

        return view('pemerintah.ubahveriflaporan', compact('data', 'datapetani', 'persetujuan', 'petani'));
    }

    public function ubahverifkomentar($id)
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

        return view('pemerintah.ubahkomentarlaporan', compact('data', 'datapetani', 'persetujuan', 'petani'));
    }

    public function storeveriflaporan(Request $request)
    {
        if($request['persetujuan'] == 'Terima'){
            $persetujuan = 1;
        }else{
            $persetujuan = 2;
        }
        
        Kios::where('id',$request['id'])->update([
            'persetujuans_id' => $persetujuan
        ]);

        $request = session();
        $request->flash('success', 'Berhasil menambahkan akun, Silakan Login!');
        return redirect('/ubahverifkios');
    }

    public function storeverifkomentar(Request $request)
    {
        $daftar= $request->validate([
            'id' => 'numeric',
            'komentar' => 'required'
        ]);
        
        Kios::where('id',$request['id'])->update([
            'komentar' => $daftar['komentar']
        ]);

        $request = session();
        $request->flash('success', 'Berhasil menambahkan akun, Silakan Login!');
        return redirect('/ubahkomentarkios');
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

    public function dataakun($id)
    {
        
        $keltani = Pemerintah::find($id);

        $users = User::find($keltani->users_id);
        // $pemerintah = Pemerintah::where('id', $keltani)->first();
        // $data = Pemerintah::all();
        
        return view('pemerintah.datapemerintah', compact('keltani', 'users'));
    }

    public function datapemerintah()
    {
        $userlogin = Auth::id(); // Cara lebih singkat untuk mendapatkan ID user yang sedang login
        $keltani = Pemerintah::where('id', $userlogin)->first(); // Sesuaikan kolom dengan struktur tabel Anda
        $user = Auth::user();
        
        return view('pemerintah.datapemerintah', compact('keltani', 'user'));
    }

    public function ubahakun()
    {
        $userlogin = Auth::id(); // Cara lebih singkat untuk mendapatkan ID user yang sedang login
        $keltani = Pemerintah::where('id', $userlogin)->first(); // Sesuaikan kolom dengan struktur tabel Anda
        $user = Auth::user();
        // $pemerintah = Pemerintah::where('id', $keltani)->first();
        // $data = Pemerintah::all();
        
        return view('pemerintah.ubahdatapemerintah', compact('keltani', 'user'));
    }

    public function storeubah(Request $request)
    {
        $daftar= $request->validate([
            'users_id' => 'numeric',
            'username' => 'required',
            'nama_lengkap' => 'required',
            'nip' => 'required',
            'nomor_sk' => 'required'
        ]);

        Pemerintah::where('users_id',$daftar['users_id'])->update([
            'nama_lengkap' => $daftar['nama_lengkap'],
            'nip' => $daftar['nip'],
            'nomor_sk' => $daftar['nomor_sk']
        ]);

        User::where('id', $daftar['users_id'])->update([
            'username' => $daftar['username']
        ]);

        $request = session();
        $request->flash('success', 'Berhasil mengubah akun');
        return redirect('/ubahpemerintah');
    }

    public function generatePdf()
    {
        $petani = Petani::all();
        $tgl = now()->format('Y-m-d'); // Example for the date

        $pdf = PDF::loadView('pemerintah.persetujuan', compact('petani', 'tgl'));
        return $pdf->download('laporan_petani.pdf');
    }
}