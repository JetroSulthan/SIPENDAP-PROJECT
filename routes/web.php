<?php

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
Route::get('/', function () {return view('landing');});

// Auth
Route::get('/login',[LoginController::class,'user']);
Route::post('/login',[LoginController::class,'authenticate']);



// Kelompok Tani
Route::middleware('kelompoktani')->group(function(){
    Route::get('/daftar',[RegisterPetaniController::class,'petani']);
    Route::post('/daftar', [RegisterPetaniController::class,"regisPetani"]);
    Route::get('/datapetani/{id}', [RegisterPetaniController::class,"lihat"]);
    Route::get('/verifikasi', [RegisterPetaniController::class, "verif"]);
    Route::get('/beritas',  [BeritaController::class,'index']);
    Route::get('/detailberitas/{id}',  [BeritaController::class,'detail']);
    Route::get('/home', function () { return view('kelompoktani.dashboard');});
});


// Pemerintah
Route::middleware('pemerintah')->group(function(){
    Route::get('/dashboard', function () {return view('pemerintah.dashboard');});
    Route::get('/datapemerintah',[PemerintahController::class,"dataakun"]);
    Route::get('/verifpetani',[PemerintahController::class,'lihat']);
    Route::put('/verifpetani',[PemerintahController::class,'edit']);
    Route::get('/ubahverif/{id}',[PemerintahController::class,'ubahverif']);
    Route::get('/verifikasilaporan/{id}',[PemerintahController::class,'ubahveriflaporan']);
    Route::put('/verifikasilaporan/{id}',[PemerintahController::class,'storeveriflaporan']);
    Route::put('/ubahverif/{id}',[PemerintahController::class,'storeverif']);
    Route::get('/beritapemerintah',  [BeritaController::class,'index']);
    Route::get('/detailberitapemerintah/{id}',  [BeritaController::class,'detail']);
    Route::get('/keltani',[PemerintahController::class,'kelompok']);
    Route::get('/keltani/{id}',[PemerintahController::class,'detailkelompok']);
    Route::get('/daftar-kelompok-tani',[DaftarKelompokTani::class,'kelompoktani']);
    Route::post('/daftar-kelompok-tani',[DaftarKelompokTani::class,"regiskeltani"]);
    Route::get('/view/laporan',[PemerintahController::class,"showFiles"]);
    Route::get('/laporan/pdf', [PemerintahController::class, 'generatePdf']);
    Route::get('/coba',[PemerintahController::class,"cobafile"]);
    Route::get('/coba2',[LaporanPemerintahController::class,"cobakirim"]);
    Route::get('/laporan/{id}',[PemerintahController::class,"viewer"]);
    Route::post('/coba',[PemerintahController::class,"store"]);
    Route::post('/coba2',[LaporanPemerintahController::class,"kirim_pemerintah"]);
    Route::post('/view/laporan',[PemerintahController::class,"download"]);
    Route::get('/rdkk',[BerkasController::class,"view_rdkk"]);
    Route::get('/rdkk/view',[BerkasController::class,"view_pdf"]);
    Route::get('/laporanpemerintah',[PemerintahController::class,"pdf_pemerintah"]);
    Route::get('/verif/laporan',[PemerintahController::class,"verif_laporan"]);
    Route::get('/telegram', function () {return view('pemerintah.telegram');});
});


// Admin
Route::middleware('admin')->group(function(){
    Route::get('/admin', function () {return view('admin.dashboard');});
    Route::get('/daftar/pemerintah',[DaftarPemerintah::class,'pemerintahan']);
    Route::post('/daftar/pemerintah',[DaftarPemerintah::class,'regispemerintah']);
    Route::get('/pemerintah',[DaftarPemerintah::class,'kelompok']);
    Route::get('/berita',  [BeritaController::class,'index']);
    Route::get('/buatberita', [BeritaController::class,'create']);
    Route::get('/buatberita', [BeritaController::class,'create']);
    Route::get('/updateberita/{id}', [BeritaController::class,'edit'])->name('edit.berita');
    Route::delete('/updateberita/{id}', [BeritaController::class,'destroy'])->name('destroy.berita');
    Route::post('/updateberita/{id}', [BeritaController::class,'update'])->name('update.berita');
    Route::post('/buatberita', [BeritaController::class,'store']);
    Route::get('/detailberita/{id}',  [BeritaController::class,'detail'])->name('detail.berita');
    Route::get('/telegramadmin', function () {return view('admin.telegram');});
});



Route::get('/test', [RegisterPetaniController::class,'dataakun']);

