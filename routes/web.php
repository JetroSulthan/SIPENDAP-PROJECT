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

Route::get('/home', function () {
    return view('homepage');
});

Route::get('/pemerintah', function () {
    return view('pemerintah', [
        'users' => User::all()
    ]);
});

Route::get('/login', function () {return view('auth/login');});
Route::get('/register', function () {return view('auth/regist');});
Route::get('/register2', function () {return view('auth/regist2');});
Route::get('/register3', function () {return view('auth/regist3');});
Route::get('/register4', function () {return view('auth/regist4');});
