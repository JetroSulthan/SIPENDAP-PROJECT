@extends('layout.admin')

@section('container')

<div class=" flex justify-center items-center h-[100vh] relative">
    @if($errors->any())
        <div class="absolute top-20 z-10 bg-slate-400 p-4 rounded-md">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session()->has('success'))
        <div class="absolute top-32 z-10 alert alert-success p-4 rounded-md bg-green-500 text-white" role="alert">
            <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
        </div>
    @endif
    
    <div class="flex flex-col ml-56 justify-center items-center bg-white w-[800px] rounded-[30px] shadow-lg p-6">
        <div class="mb-6">
            <h1 class="text-center font-bold text-2xl">Data Admin</h1>
            <p class="text-center"></p>
        </div>

        <form class="w-full flex flex-col space-y-4" enctype="multipart/form-data" action="" method="POST">
         @csrf
            @method('PUT')
            <div class="w-full">
                <label for="username" class="px-4">Username</label>
                <input type="text" name="username" id="username" class="block py-2.5 px-4 text-sm text-[#72B944] w-full border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" value="{{ $users->username }}" required/>
            </div>

            <input type="hidden" name="users_id" value="{{ $keltani->users_id }}">

            <div class="w-full">
                <label for="nama" class="px-4 mt-4">Nama</label>
                <input type="text" name="nama" id="nama" class="block py-2.5 px-4 text-sm text-[#72B944] w-full border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" value="{{ $keltani->nama }}" required/>
            </div>

            <a href="" >
                <button type="submit" class="text-white bg-[#72B944] hover:bg-[#5D9B35] focus:ring-2 focus:outline-none focus:ring-[#72B944] font-medium rounded-full text-[20px] ml-[520px] px-20 py-1.5 text-center">Simpan</button>
            </a>
        </form>
    </div>
</div>

<style>
    body{
      background-image: linear-gradient(#72B944, #FFFFFF)
    }
  </style>

@endsection