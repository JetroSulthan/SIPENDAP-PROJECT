<?php

use App\Models\User;
use App\Http\Controllers\Login_C;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
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
Route::get('/datapetani/{id}', [RegisterPetaniController::class,"edit"]);
// Route::get('/register', function () {return view('kelompoktani.daftar');});
Route::get('/home', function () { return view('kelompoktani.dashboard');});


// Pemerintah
// Route::get('/dashboard',[PemerintahController::class,'index']);
Route::get('/dashboard', function () {return view('pemerintah.dashboard');});
Route::get('/verif',[PemerintahController::class,'edit']);
Route::put('/verif',[PemerintahController::class,'edit']);
// Route::get('/verif',[PemerintahController::class,'regisPetani']);

// Auth
Route::get('/login',[LoginController::class,'user']);
Route::post('/login',[LoginController::class,'authenticate']);
