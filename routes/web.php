<?php

use App\Models\User;
use App\Http\Controllers\Login_C;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KiosController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BerkasController;
use App\Http\Controllers\DaftarPemerintah;
use App\Http\Controllers\DaftarKelompokTani;
use App\Http\Controllers\PemerintahController;
use App\Http\Controllers\RegisterPetaniController;


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



Route::get('/', function () {return view('landing');});



// Kelompok Tani
Route::get('/daftar',[RegisterPetaniController::class,'petani']);
Route::post('/daftar', [RegisterPetaniController::class,"regisPetani"]);
Route::get('/datapetani/{id}', [RegisterPetaniController::class,"lihat"]);
Route::get('/verifikasi', [RegisterPetaniController::class, "verif"]);
// Route::get('/register', function () {return view('kelompoktani.daftar');});
Route::get('/home', function () { return view('kelompoktani.dashboard');});


// Pemerintah

// Route::get('/dashboard',[PemerintahController::class,'index']);
Route::get('/dashboard', function () {return view('pemerintah.dashboard');});
Route::get('/verif',[PemerintahController::class,'lihat']);
Route::put('/verif',[PemerintahController::class,'edit']);
Route::get('/keltani',[PemerintahController::class,'kelompok']);
Route::get('/keltani/{id}',[PemerintahController::class,'detailkelompok']);
Route::get('/daftar-kelompok-tani',[DaftarKelompokTani::class,'kelompoktani']);
Route::post('/daftar-kelompok-tani',[DaftarKelompokTani::class,"regiskeltani"]);
Route::get('/view/laporan',[KiosController::class,"showFiles"]);
Route::get('/coba',[KiosController::class,"index"]);
Route::get('/laporanmelihat/{id}',[KiosController::class,"viewer"]);
Route::post('/coba',[KiosController::class,"store"]);
// Route::get('/laporan/kios',[BerkasController::class,"index"]);
Route::post('/download/{id}',[KiosController::class,"download"]);

// Route::get('/verif',[PemerintahController::class,'regisPetani']);


// Admin
Route::get('/admin', function () {return view('admin.dashboard');});
Route::get('/daftar/pemerintah',[DaftarPemerintah::class,'pemerintahan']);
Route::post('/daftar/pemerintah',[DaftarPemerintah::class,'regispemerintah']);


// Auth
Route::get('/login',[LoginController::class,'user']);
Route::post('/login',[LoginController::class,'authenticate']);
