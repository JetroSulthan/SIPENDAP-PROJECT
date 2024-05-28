<?php

use App\Http\Controllers\AdminController;
use App\Models\User;
use App\Models\Pemerintah;
use App\Http\Controllers\Login_C;
use App\Models\LaporanPemerintah;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KiosController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\BerkasController;
use App\Http\Controllers\DaftarPemerintah;
use App\Http\Controllers\DaftarKelompokTani;
use App\Http\Controllers\PemerintahController;
use App\Http\Controllers\RegisterPetaniController;
use App\Http\Controllers\LaporanPemerintahController;
use App\Models\Kios;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Landing page

Route::middleware('guest')->group(function(){
    Route::get('/', function () {return view('landing');});

    // Auth
    Route::get('/login',[LoginController::class,'user']);
    Route::post('/login',[LoginController::class,'authenticate']);
});

Route::middleware('auth')->group(function(){
    Route::post('/logout', [LoginController::class, 'logout']);
});

Route::get('/logout', function(){
    return redirect('/');
});


// Kelompok Tani
Route::middleware('kelompoktani')->group(function(){
    Route::get('/daftar',[RegisterPetaniController::class,'petani']);
    Route::post('/daftar', [RegisterPetaniController::class,"regisPetani"]);
    Route::get('/datapetani/{id}', [RegisterPetaniController::class,"lihat"]);
    Route::get('/ubahdatapetani/{id}', [RegisterPetaniController::class,"ubah"]);
    Route::put('/ubahdatapetani/{id}', [RegisterPetaniController::class,"ubahpetani"]);
    Route::get('/mengubahdatapetanis', function () {return view('kelompoktani.succes.mengubahdatapetani');});
    Route::get('/verifikasi', [RegisterPetaniController::class, "verif"]);
    Route::get('/beritas',  [BeritaController::class,'index']);
    Route::get('/data-akun', [RegisterPetaniController::class,'dataakun']);
    Route::get('/ubah-akun', [RegisterPetaniController::class,'ubahakun']);
    Route::put('/ubah-akun', [RegisterPetaniController::class,'storeubah']);
    Route::get('/detailberitas/{id}',  [BeritaController::class,'detail']);
    Route::get('/home', function () { return view('kelompoktani.dashboard');});
});


// Pemerintah
Route::middleware('pemerintah')->group(function(){
    Route::get('/dashboard', function () {return view('pemerintah.dashboard');});
    Route::get('/datapemerintah',[PemerintahController::class,"datapemerintah"]);
    Route::get('/ubahdatapemerintah',[PemerintahController::class,"ubahakun"]);
    Route::put('/ubahdatapemerintah',[PemerintahController::class,"storeubah"]);
    Route::get('/datapetanis/{id}', [RegisterPetaniController::class,"lihat"]);
    Route::get('/verifpetani',[PemerintahController::class,'lihat']);
    Route::put('/verifpetani',[PemerintahController::class,'edit']);
    Route::get('/verifikasilaporan/{id}',[PemerintahController::class,'ubahveriflaporan']);
    Route::put('/verifikasilaporan/{id}',[PemerintahController::class,'storeveriflaporan']);
    Route::get('/komentarlaporan/{id}',[PemerintahController::class,'ubahverifkomentar']);
    Route::put('/komentarlaporan/{id}',[PemerintahController::class,'storeverifkomentar']);
    Route::get('/ubahverif/{id}',[PemerintahController::class,'ubahkomentar']);
    Route::put('/ubahverif/{id}',[PemerintahController::class,'storekomentar']);
    Route::get('/ubahverifs/{id}',[PemerintahController::class,'ubahverif']);
    Route::put('/ubahverifs/{id}',[PemerintahController::class,'storeverif']);
    Route::get('/beritapemerintah',  [BeritaController::class,'index']);
    Route::get('/detailberitapemerintah/{id}',  [BeritaController::class,'detail']);
    Route::get('/keltani',[PemerintahController::class,'kelompok']);
    Route::get('/keltani/{id}',[PemerintahController::class,'detailkelompok']);
    Route::get('/ubahkeltani/{id}',[PemerintahController::class,'ubahdetail']);
    Route::put('/ubahkeltani/{id}',[PemerintahController::class,'storeubahdetail']);
    Route::get('/daftar-kelompok-tani',[DaftarKelompokTani::class,'kelompoktani']);
    Route::post('/daftar-kelompok-tani',[DaftarKelompokTani::class,"regiskeltani"]);
    Route::get('/daftarkelompok', function () {return view('pemerintah.succes.daftarkelompoktani');});
    Route::get('/ubahpemerintah', function () {return view('pemerintah.succes.ubahdatapemerintah');});
    Route::get('/tambahdata', function () {return view('pemerintah.succes.menambahdatapersetujuan');});
    Route::get('/mengubahdatakeltani', function () {return view('pemerintah.succes.mengubahdatakelompoktani');});
    Route::get('/ubahverifkios', function () {return view('pemerintah.succes.mengubahdataverifkios');});
    Route::get('/ubahkomentarkios', function () {return view('pemerintah.succes.mengubahverifkomentarkios');});
    Route::get('/view/laporan',[PemerintahController::class,"showFiles"]);
    Route::get('/laporan/pdf', [PemerintahController::class, 'generatePdf']);
    Route::get('/coba',[PemerintahController::class,"cobafile"]);
    Route::get('/coba2',[LaporanPemerintahController::class,"cobakirim"]);
    Route::get('/laporan/{id}',[PemerintahController::class,"viewer"]);
    Route::get('/laporanpemerintah/{id}',[PemerintahController::class,"viewerpemerintah"]);
    Route::post('/laporanpemerintah/{id}',[LaporanPemerintahController::class,"download"])->name('download');
    Route::post('/coba',[PemerintahController::class,"store"]);
    Route::post('/coba2',[LaporanPemerintahController::class,"kirim_pemerintah"]);
    Route::post('/view/laporan',[PemerintahController::class,"download"]);
    Route::get('/rdkk',[BerkasController::class,"view_rdkk"]);
    Route::get('/rdkk/view',[BerkasController::class,"view_pdf"]);
    Route::get('/testing/pdf',[PemerintahController::class,"pdf_test"]);
    Route::get('/testing',[PemerintahController::class,"laporan_tes"]);
    Route::get('/laporanpemerintah',[PemerintahController::class,"pdf_pemerintah"]);
    Route::get('/verif/laporan',[PemerintahController::class,"verif_laporan"]);
    Route::post('/laporan/{id}',[KiosController::class,"download"])->name('downloadlaporan');
    Route::get('/telegram', function () {return view('pemerintah.telegram');});
});


// Admin
Route::middleware('admin')->group(function(){
    Route::get('/admin', function () {return view('admin.dashboard');});
    Route::get('/data',[AdminController::class,'dataakun']);
    Route::get('/ubahdata',[AdminController::class,'ubahakun']);
    Route::put('/ubahdata',[AdminController::class,'storeubah']);
    Route::get('/daftar/pemerintah',[DaftarPemerintah::class,'pemerintahan']);
    Route::post('/daftar/pemerintah',[DaftarPemerintah::class,'regispemerintah']);
    Route::get('/pemerintah',[DaftarPemerintah::class,'kelompok']);
    Route::get('/pemerintah/{id}',[PemerintahController::class,"dataakun"]);
    Route::get('/editdatapemerintah',[PemerintahController::class,"ubahakun"]);
    Route::put('/editdatapemerintah',[PemerintahController::class,"storeubah"]);
    Route::get('/berita',  [BeritaController::class,'index']);
    Route::get('/keltanis',[PemerintahController::class,'kelompok']);
    Route::get('/keltanis/{id}',[PemerintahController::class,'detailkelompok']);
    Route::get('/ubahkeltanis/{id}',[PemerintahController::class,'ubahdetail']);
    Route::put('/ubahkeltanis/{id}',[PemerintahController::class,'storeubahdetail']);
    Route::get('/buatberita', [BeritaController::class,'create']);
    Route::get('/buatberita', [BeritaController::class,'create']);
    Route::get('/updateberita/{id}', [BeritaController::class,'edit'])->name('edit.berita');
    Route::delete('/updateberita/{id}', [BeritaController::class,'destroy'])->name('destroy.berita');
    Route::post('/updateberita/{id}', [BeritaController::class,'update'])->name('update.berita');
    Route::post('/buatberita', [BeritaController::class,'store']);
    Route::get('/detailberita/{id}',  [BeritaController::class,'detail'])->name('detail.berita');
    Route::get('/telegramadmin', function () {return view('admin.telegram');});
    Route::get('/ubahadmin', function () {return view('admin.succes.mengubahdataakunadmin');});
    Route::get('/ubahpemerintahs', function () {return view('admin.succes.dataakunpemerintah');});
    
});





