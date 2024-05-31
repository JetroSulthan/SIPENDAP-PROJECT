
@php
    $roleId = Auth::user()->roles_id;
    $layout = '';

    switch ($roleId) {
        case 1:
            $layout = 'layout.admin';
            break;
        case 2:
            $layout = 'layout.pemerintah';
            break;
        case 3:
            $layout = 'layout.kelompoktani';
            break;
        default:
            $layout = 'layout.default';  // Optionally handle unrecognized roles
            break;
    }
@endphp

@extends($layout)

@section('container')

  {{-- @dd($regist); --}}

<div class=" flex justify-center h-[90vh]">
    
    <div class="flex flex-col space-y-8 justify-center items-center mx-auto relative mt-20 mb-8 bg-white w-[600px] rounded-[30px]">
        <div class="mt-4">
            <h1 class="text-center font-bold text-2xl">Berhasil!</h1>
            <p class="text-center font-medium text-xl">Pembaharuan Profil Akun Kelompok Tani Sudah Disimpan</p>
        </div>

        <img src="/img/centang.png" alt="" class="w-[200px]">

        <div class="inline-flex ">
          @switch($roleId)
              @case(1)
                  <a href="/keltanis" class=" "> 
                      {{-- <img src="/img/arrows.png" alt="" class="w-6"> --}}
                      <button type="submit" class=" mt-2 text-white bg-[#72B944] hover:bg-[#5D9B35] focus:ring-2 focus:outline-none focus:ring-[#72B944] font-medium rounded-full text-[15px] w-full sm:w-auto px-5  py-1.5 text-center">Kembali ke Akun Kelompok Tani</button>
                  </a>
                  
                  @break
              @case(2)
                  <a href="/keltani" class=" "> 
                      {{-- <img src="/img/arrows.png" alt="" class="w-6"> --}}
                      <button type="submit" class=" mt-2 text-white bg-[#72B944] hover:bg-[#5D9B35] focus:ring-2 focus:outline-none focus:ring-[#72B944] font-medium rounded-full text-[15px] w-full sm:w-auto px-5  py-1.5 text-center">Kembali ke Akun Kelompok Tani</button>
                  </a>
                  @break 
          @endswitch
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
