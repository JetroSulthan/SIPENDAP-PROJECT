<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Login extends Controller
{
    public function mitra()
    {
        return view('auth.login', [
            'title' => 'Login'
        ]);
    }

    public function loginUser(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required | username',
            'password'  => 'required | min:5 | max:18'
        ]);
        try {
            if(Auth::attempt($credentials)){
            // Auth::attempt($credentials);
            $request->session()->regenerate();
            $user = User::find(auth()->user()->id);
            
            if ($user->roles_id === 2) {
                return redirect('/dashboard');
            } 
            else if($user->roles_id === 3 && $user->status === "enable") {
                return redirect('/home');
            } 
                 
            }  
            else{
                return back()->with('loginError', 'Login gagal');
            }
        } catch (Exception $err) {
            return back()->with('loginError', $err->getMessage());
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
