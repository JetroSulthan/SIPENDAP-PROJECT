<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

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
Route::get('/register', function () {return view('kelompoktani.daftar');});
Route::get('/home', function () { return view('kelompoktani.dashboard');});


// Pemerintah
Route::get('/dashboard', function () {return view('pemerintah.dashboard');});

// Auth
Route::get('/login', function () {return view('auth/login');});
