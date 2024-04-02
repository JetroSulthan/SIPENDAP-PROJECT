<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Pemerintah extends Controller
{
    public function mitra()
    {
        return view('register.mitra', [
            'title' => 'Register'
        ]);
    }

    public function regisMitra(Request $request)
    {
        $request->validate([
            'name'         => 'required',
            'email'        => 'required | email | unique:users',
            'password'     => 'required | min:5 | max:8'
        ]);

        $createUser = [
            'name'   => $request->name,
            'email'        => $request->email,
            'password'     => Hash::make($request->password),
            'role'         => 'mitra',
        ];
        
        $user = User::create($createUser);

        $request->validate([
            'no_hp' => 'min:11 | max:13 | required',
            'nama_usaha' => 'required | max:255',
        ]);

        mitra::create([
            'user_id' => $user->id,
            'no_hp' => $request->no_hp,
            'nama_usaha' => $request->nama_usaha,
        ]);
        // var_dump($request->all());
        $request->session()->flash('success', 'Berhasil menambahkan akun, Silakan Login!');
        return redirect('/login');
    }

    public function investor()
    {
        return view('register.investor', [
            'title' => 'Register'
        ]);
    }

    public function regisInvestor(Request $request)
    {
        $request->validate([
            'name'         => 'required',
            'email'        => 'required | email | unique:users',
            'password'     => 'required | min:5 | max:8'
        ]);
        $createUser = [
            'name'   => $request->name,
            'email'        => $request->email,
            'password'     => Hash::make($request->password),
            'role'         => 'investor',
        ];
        $user = User::create($createUser);

        $request->validate([
            'no_hp' => 'min:11 | max:13 | required',

        ]);
        investor::create([
            'user_id' => $user->id,
            'no_hp' => $request->no_hp,
        ]);
        $request->session()->flash('success', 'Berhasil menambahkan akun, Silakan Login!');
        return redirect('/login');
    }
}
