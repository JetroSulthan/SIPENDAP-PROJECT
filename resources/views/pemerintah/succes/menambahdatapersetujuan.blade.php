
@extends('layout.pemerintah')

@section('container')

  {{-- @dd($regist); --}}

<div class=" flex justify-center h-[90vh]">
    
    <div class="flex flex-col space-y-8 justify-center shadow-lg  items-center mx-auto relative mt-20 mb-8 bg-white w-[600px] rounded-[30px]">
        <div class="mt-4">
            <h1 class="text-center font-bold text-2xl">Berhasil!</h1>
            <p class="text-center font-medium text-xl">Verifikasi Data Petani berhasil disimpan</p>
        </div>

        <img src="/img/centang.png" alt="" class="w-[200px]">

        <div class="inline-flex ">
            <a href="/verifpetani" class=" "> 
                {{-- <img src="/img/arrows.png" alt="" class="w-6"> --}}
                <button type="submit" class=" mt-2 text-white bg-[#72B944] hover:bg-[#5D9B35] focus:ring-2 focus:outline-none focus:ring-[#72B944] font-medium rounded-full text-[15px] w-full sm:w-auto px-5  py-1.5 text-center">Kembali ke Akun Halaman Verifikasi Petani</button>
            </a>
        </div>
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
