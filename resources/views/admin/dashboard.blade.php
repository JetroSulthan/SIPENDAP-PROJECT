@extends('layout.admin')

@section('container')

   <div class="flex items-center justify-center min-h-screen">
      <div class="ml-52 relative">
         <div class="text-center mb-8">
            <h1 class="text-5xl font-bold">Halo, <span class="text-white">Admin</span>!</h1>
         </div>

         <div class="flex space-x-52 justify-center">
            <a href="/berita">
               <button class="flex flex-col items-center justify-center mb-12 bg-white border-2 border-[#72B944] rounded-3xl h-[450px] w-[300px]">
                  <img src="img/berita.png" alt="" class="w-[250px] pb-16">
                  <p class="font-bold text-2xl w-[180px] text-center">Berita</p>
               </button>
            </a>
            <a href="/telegramadmin">
               <button class="flex flex-col items-center justify-center mb-12 bg-white border-2 border-[#72B944] rounded-3xl h-[450px] w-[300px]">
                  <img src="img/notif.png" alt="" class="w-[250px] pb-16">
                  <p class="font-bold text-2xl w-60 text-center">Telegram</p>
               </button>
            </a>
         </div>
      </div>
   </div>
     
   <style>
      body{
         background-image:linear-gradient( #72B944, #FFFFFF);
         background-attachment:fixed;
      }
   </style>
@endsection

