<?php

use App\Http\Controllers\C_RDKK;
use App\Http\Controllers\C_Berita;
use App\Http\Controllers\C_AkunAdmin;
use App\Http\Controllers\C_FormLogin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\C_LaporanKios;
use App\Http\Controllers\KiosController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\BerkasController;
use App\Http\Controllers\DaftarPemerintah;
use App\Http\Controllers\DaftarKelompokTani;
use App\Http\Controllers\C_LaporanPemerintah;
use App\Http\Controllers\PemerintahController;
use App\Http\Controllers\RegisterPetaniController;
use App\Http\Controllers\LaporanPemerintahController;

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
    Route::get('/', function () {return view('V_landing');});

    // Auth
    Route::get('/login',[C_FormLogin::class,'user']);
    Route::post('/login',[C_FormLogin::class,'authenticate']);
});

Route::middleware('auth')->group(function(){
    Route::post('/logout', [C_FormLogin::class, 'logout']);
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
    Route::get('/beritas',  [C_Berita::class,'index']);
    Route::get('/data-akun', [RegisterPetaniController::class,'dataakun']);
    Route::get('/ubah-akun', [RegisterPetaniController::class,'ubahakun']);
    Route::put('/ubah-akun', [RegisterPetaniController::class,'storeubah']);
    Route::get('/detailberitas/{id}',  [C_Berita::class,'detail']);
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
    Route::get('/verifikasilaporan/{id}',[C_LaporanKios::class,'ubahveriflaporan']);
    Route::put('/verifikasilaporan/{id}',[C_LaporanKios::class,'storeveriflaporan']);
    Route::get('/komentarlaporan/{id}',[C_LaporanKios::class,'ubahverifkomentar']);
    Route::put('/komentarlaporan/{id}',[C_LaporanKios::class,'storeverifkomentar']);
    Route::get('/ubahverif/{id}',[PemerintahController::class,'ubahkomentar']);
    Route::put('/ubahverif/{id}',[PemerintahController::class,'storekomentar']);
    Route::get('/ubahverifs/{id}',[PemerintahController::class,'ubahverif']);
    Route::put('/ubahverifs/{id}',[PemerintahController::class,'storeverif']);
    Route::get('/beritapemerintah',  [C_Berita::class,'index']);
    Route::get('/detailberitapemerintah/{id}',  [C_Berita::class,'detail']);
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
    Route::get('/view/laporan',[C_LaporanPemerintah::class,"showFiles"]);
    Route::get('/kkfile/{id}',[PemerintahController::class,"showFiles1"]);
    Route::get('/ktpfile/{id}',[PemerintahController::class,"showFiles2"]);
    Route::get('/fotolahanfile/{id}',[PemerintahController::class,"showFiles3"]);
    Route::get('/laporan/pdf', [PemerintahController::class, 'generatePdf']);
    Route::get('/coba',[PemerintahController::class,"cobafile"]);
    Route::get('/coba2',[C_LaporanPemerintah::class,"cobakirim"]);
    Route::get('/laporanpemerintah/{id}',[C_LaporanPemerintah::class,"viewerpemerintah"]);
    Route::post('/laporanpemerintah/{id}',[C_LaporanPemerintah::class,"download"])->name('download');
    Route::post('/coba',[PemerintahController::class,"store"]);
    Route::post('/coba2',[C_LaporanPemerintah::class,"kirim_pemerintah"]);
    Route::post('/view/laporan',[PemerintahController::class,"download"]);
    Route::get('/rdkk',[C_RDKK::class,"view_rdkk"]);
    Route::get('/rdkk/view',[C_RDKK::class,"view_pdf"]);
    Route::get('/testing/pdf',[PemerintahController::class,"pdf_test"]);
    Route::get('/testing',[PemerintahController::class,"laporan_tes"]);
    Route::get('/laporanpemerintah',[PemerintahController::class,"pdf_pemerintah"]);
    Route::get('/laporan/{id}',[C_LaporanKios::class,"viewer"]);
    Route::get('/verif/laporan',[C_LaporanKios::class,"verif_laporan"]);
    Route::post('/laporan/{id}',[C_LaporanKios::class,"download"])->name('downloadlaporan');
    Route::get('/telegram', function () {return view('pemerintah.telegram');});
});


// Admin
Route::middleware('admin')->group(function(){
    Route::get('/admin', function () {return view('admin.dashboard');});
    Route::get('/data',[C_AkunAdmin::class,'dataakun']);
    Route::get('/ubahdata',[C_AkunAdmin::class,'ubahakun']);
    Route::put('/ubahdata',[C_AkunAdmin::class,'storeubah']);
    Route::get('/daftar/pemerintah',[DaftarPemerintah::class,'pemerintahan']);
    Route::post('/daftar/pemerintah',[DaftarPemerintah::class,'regispemerintah']);
    Route::get('/pemerintah',[DaftarPemerintah::class,'kelompok']);
    Route::get('/pemerintah/{id}',[PemerintahController::class,"dataakun"]);
    Route::get('/editdatapemerintah',[PemerintahController::class,"ubahakun"]);
    Route::put('/editdatapemerintah',[PemerintahController::class,"storeubah"]);
    Route::get('/berita',  [C_Berita::class,'index']);
    Route::get('/keltanis',[PemerintahController::class,'kelompok']);
    Route::get('/keltanis/{id}',[PemerintahController::class,'detailkelompok']);
    Route::get('/ubahkeltanis/{id}',[PemerintahController::class,'ubahdetail']);
    Route::put('/ubahkeltanis/{id}',[PemerintahController::class,'storedetail']);
    Route::get('/buatberita', [C_Berita::class,'create']);
    Route::get('/buatberita', [C_Berita::class,'create']);
    Route::get('/updateberita/{id}', [C_Berita::class,'edit'])->name('edit.berita');
    Route::delete('/updateberita/{id}', [C_Berita::class,'destroy'])->name('destroy.berita');
    Route::post('/updateberita/{id}', [C_Berita::class,'update'])->name('update.berita');
    Route::post('/buatberita', [C_Berita::class,'store']);
    Route::get('/detailberita/{id}',  [C_Berita::class,'detail'])->name('detail.berita');
    Route::get('/telegramadmin', function () {return view('admin.telegram');});
    Route::get('/mengubahdatakeltanis', function () {return view('pemerintah.succes.mengubahdatakelompoktani');});
    Route::get('/ubahadmin', function () {return view('admin.succes.mengubahdataakunadmin');});
    Route::get('/ubahpemerintahs', function () {return view('admin.succes.dataakunpemerintah');});
    
});





