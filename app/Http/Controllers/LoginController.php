<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function user()
    {
        return view('auth.login', [
            'title' => 'Login'
        ]);
    }

    public function username()
    {
        return 'username';
    }
     
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password'  => 'required | min:5 | max:255'
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
                return back()->with('loginError', 'Login gagal');
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

