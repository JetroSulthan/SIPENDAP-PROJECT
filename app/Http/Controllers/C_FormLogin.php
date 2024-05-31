<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class C_FormLogin extends Controller
{
    public function user()
    {
        return view('auth.login', [
            'title' => 'Login'
        ]);
    }
     
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password'  => 'required | min:5 | max:255'
        ], [
            'username.required' => 'Semua Data Harus Diisi!',
            'password.required' => 'Semua Data Harus Diisi!'
        ]);
        
            if(Auth::attempt($credentials)){
            // Auth::attempt($credentials);
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->roles_id == 2) {
                return redirect('/dashboard');
            } 
            else if($user->roles_id == 3) {
                return redirect('/home');
            } 
            else if($user->roles_id == 1) {
                return redirect('/admin');
            } 
                 
            }  

            else{
                return back()->with('invalid','Username atau Password Salah');
            }
        } 

    
    public function logout(Request $request)
    {
    Auth::logout();
 
    $request->session()->invalidate();
    $request->session()->regenerateToken();
 
    return redirect('/');
    }
}

