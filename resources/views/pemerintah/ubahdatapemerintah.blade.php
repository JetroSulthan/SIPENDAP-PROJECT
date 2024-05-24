
@extends('layout.pemerintah')

@section('container')

<div class=" flex justify-center h-[100vh]">
    @if($errors->any())
      <div class="absolute top-20 z-10 alert bg-slate-400">
        <ul>
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
      <i class="bi bi-check-circle-fill"> </i>{{ session('success') }}
    </div>
    @endif

    <div class="flex flex-col justify-center items-center mx-auto relative mt-20 mb-8 bg-white w-[600px] rounded-[30px]">
        <div class="mt-4">
            <h1 class="text-center font-bold text-2xl">Username</h1>
        </div>

        <form class="relative bg-[FFFFFF] justify-center mt-2 w-auto flex flex-col space-y-3" enctype="multipart/form-data" action="" method="POST">
        @csrf
        @method('PUT')
        <div>
          <div class="relative z-0 w-full group">
              <label for="username" class="px-4">Username</label>
              <input type="text" name="username" id="username" class="block py-2.5 px-4 text-sm text-[#72B944] w-[500px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" value="{{ $user->username }}" required/>
          </div>
        </div>    

        <div>
          <div class="mb-3">
            <h1 class="text-center font-bold text-2xl">Data Diri Kelompok Tani</h1>
          </div>
          <div class="relative z-0 w-full group">
              <label for="nama_lengkap" class="px-4">Nama Lengkap</label>
              <input type="text" name="nama_lengkap" id="nama_lengkap" class="block py-2.5 px-4 text-sm text-[#72B944] w-[500px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Nama Lengkap" value="{{ $keltani->nama_lengkap }}" required/>
          </div>
          <div class="relative z-0 w-full group">
              <label for="nip" class="px-4">NIP</label>
              <input type="text" name="nip" id="nip" class="block py-2.5 px-4 text-sm text-[#72B944] w-[500px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="NIP" value="{{ $keltani->nip }}" required/>
          </div>
          <div class="relative z-0 w-full group">
              <label for="nomor_sk" class="px-4">Nomor SK</label>
              <input type="text" name="nomor_sk" id="nomor_sk" class="block py-2.5 px-4 text-sm text-[#72B944] w-[500px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Nomor SK" value="{{ $keltani->nomor_sk }}" required/>
          </div>
          <div>
            <input type="hidden" class="" name="users_id" value="{{ $keltani->users_id }}">
          </div>
        </div>

        <div class="mx-auto">
          <a href="/ubahpemerintah">
            <button type="submit" class=" mt-5 text-white bg-[#72B944] hover:bg-[#5D9B35] focus:ring-2 focus:outline-none focus:ring-[#72B944] font-medium rounded-full text-[20px] sm:w-auto px-20 py-1.5 text-center">Simpan Perubahan</button>
          </a>
        </div>
      </form>  

    </div>
</div>

<style>
  body{
    background-image: url('img/sawah.jpg');
    background-size: cover; /* Menutup seluruh bagian body */
    background-position: center; /* Pusatkan gambar */
    background-repeat: no-repeat;
  }
</style>
@endsection
