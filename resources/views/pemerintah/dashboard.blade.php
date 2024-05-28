@extends('layout.pemerintah')

@section('container')
     <div class="ml-[650px] space-y-[590px]">
      <div class="mt-20 mb-6">
         <h1 class=" text-5xl font-bold">Halo, <span class=" text-white">Pemerintah</span> !</h1>
      </div>
      <div class="mt-14 ">
         <div>
            <a href="/daftar-kelompok-tani">
               <button class="flex flex-col ml-[-200px] space-between items-center justify-center mb-12 -mt-[550px] bg-white border-2 border-[#72B944] rounded-3xl h-[450px] w-[300px]">
                  <img src="img/keltani.png" alt="" class="w-[250px] pb-16">
                  <p class=" font-bold text-2xl w-[180px]">Buat Akun Kelompok Tani</p>
               </button>
            </a>

            <a href="/verifpetani">
               <button class="flex flex-col ml-[350px] space-between items-center justify-center mb-28 -mt-[500px] bg-white border-2 border-[#72B944] rounded-3xl h-[450px] w-[300px]">
                  <img src="img/verifpetani.png" alt="" class="w-[250px] pb-20">
                  <p class=" font-bold text-2xl w-60">Verifikasi Petani</p>
               </button>
            </a>


         </div>
      </div>
   </div>
      
   <style>
      body{
        background-image: linear-gradient(#72B944, #ffffff);
        background-attachment: fixed;
      }
  </style>
@endsection

