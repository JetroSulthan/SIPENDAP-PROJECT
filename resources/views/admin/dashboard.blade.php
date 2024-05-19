@extends('layout.admin')

@section('container')
</div class=" relative inline-flex items-center justify-center">
     <div class="ml-[650px] space-y-[600px]">
      <div class=" -mb-[100px]">
         <h1 class=" text-5xl font-bold">Halo, <span class=" text-white">Admin</span> !</h1>
      </div>
      <div>
         <div>
            <a href="/">
               <button class="flex flex-col ml-[-200px] space-between items-center justify-center mb-12 -mt-[550px] bg-white border-2 border-[#72B944] rounded-3xl h-[450px] w-[300px]">
                  <img src="img/berita.png" alt="" class="w-[250px] pb-16">
                  <p class=" font-bold text-2xl w-[180px]">Berita</p>
               </button>
            </a>

            <a href="/">
               <button class="flex flex-col ml-[350px] space-between items-center justify-center mb-28 -mt-[500px] bg-white border-2 border-[#72B944] rounded-3xl h-[450px] w-[300px]">
                  <img src="img/notif.png" alt="" class="w-[250px] pb-16">
                  <p class=" font-bold text-2xl w-60">Notifikasi</p>
               </button>
            </a>


         </div>
      </div>
   </div>
      
<style>
   body{
      background-image:linear-gradient( #72B944, #FFFFFF);
   }
</style>
@endsection

