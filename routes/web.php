<?php

use App\Models\User;
use App\Http\Controllers\Login_C;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KiosController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\BerkasController;
use App\Http\Controllers\DaftarPemerintah;
use App\Http\Controllers\DaftarKelompokTani;
use App\Http\Controllers\PemerintahController;
use App\Http\Controllers\RegisterPetaniController;
use App\Models\Pemerintah;

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



// Kelompok Tani
Route::get('/daftar',[RegisterPetaniController::class,'petani']);
Route::post('/daftar', [RegisterPetaniController::class,"regisPetani"]);
Route::get('/datapetani/{id}', [RegisterPetaniController::class,"lihat"]);
Route::get('/verifikasi', [RegisterPetaniController::class, "verif"]);
Route::get('/home', function () { return view('kelompoktani.dashboard');});


// Pemerintah
Route::get('/dashboard', function () {return view('pemerintah.dashboard');});
Route::get('/verifpetani',[PemerintahController::class,'lihat']);
Route::put('/verifpetani',[PemerintahController::class,'edit']);
Route::get('/ubahverif/{id}',[PemerintahController::class,'ubahverif']);
Route::get('/keltani',[PemerintahController::class,'kelompok']);
Route::get('/keltani/{id}',[PemerintahController::class,'detailkelompok']);
Route::get('/daftar-kelompok-tani',[DaftarKelompokTani::class,'kelompoktani']);
Route::post('/daftar-kelompok-tani',[DaftarKelompokTani::class,"regiskeltani"]);
Route::get('/view/laporan',[PemerintahController::class,"showFiles"]);
Route::get('/coba',[PemerintahController::class,"cobafile"]);
Route::get('/laporan/{id}',[PemerintahController::class,"viewer"]);
Route::post('/coba',[PemerintahController::class,"store"]);
Route::post('/view/laporan',[PemerintahController::class,"download"]);
Route::get('/rdkk',[BerkasController::class,"view_rdkk"]);
Route::get('/rdkk/view',[BerkasController::class,"view_pdf"]);
Route::get('/verif/laporan',[PemerintahController::class,"verif_laporan"]);


// Admin
Route::get('/admin', function () {return view('admin.dashboard');});
Route::get('/daftar/pemerintah',[DaftarPemerintah::class,'pemerintahan']);
Route::post('/daftar/pemerintah',[DaftarPemerintah::class,'regispemerintah']);
Route::get('/berita',  [BeritaController::class,'index']);
Route::get('/buatberita', [BeritaController::class,'create']);
Route::get('/buatberita', [BeritaController::class,'create']);
Route::get('/updateberita/{id}', [BeritaController::class,'edit'])->name('edit.berita');
Route::delete('/updateberita/{id}', [BeritaController::class,'destroy'])->name('destroy.berita');
Route::post('/updateberita/{id}', [BeritaController::class,'update'])->name('update.berita');
Route::post('/buatberita', [BeritaController::class,'store']);
Route::get('/detailberita/{id}',  [BeritaController::class,'detail'])->name('detail.berita');
Route::get('/telegramadmin', function () {return view('admin.telegram');});


// Auth
Route::get('/login',[LoginController::class,'user']);
Route::post('/login',[LoginController::class,'authenticate']);

