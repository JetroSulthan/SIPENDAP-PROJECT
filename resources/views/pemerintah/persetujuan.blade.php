@extends('layout.pemerintah')
@section('container')
   
     <div class="absolute top-20 right-2 overflow-x-auto w-[81.5%]  rounded-xl ">
      <table class="w-full table-auto">
         <thead class=" text-center bg-white">
             
                 <th class="px-1 py-2 font-xl">
                     No
                 </th>
                 
                 <th class="px-1 py-2 font-xl">
                     Data Laporan
                 </th>
             
                 <th class="px-2 py-2 font-xl">
                     Tanggal
                 </th>
             
                 <th class="px-2 py-2 font-xl">
                     Status
                 </th>
             
                 <th class="px-2 py-2 font-xl">
                     Komentar
                 </th>
             
                 <th class="px-2 py-2 font-xl">
                     
                 </th>
         </thead>
   
      @foreach ($petani as $item)
         <tbody class=" bg-white">
                  <td class="text-center">
                     {{ $loop->iteration }}
                  </td>
                  <td class="px-3 py-4 border-b-2">
                        <a href="/laporan/{{ $item->id }}">
                           <div>{{ $item->laporan }}</div>
                        </a>
                  </td>
                  <td class=" text-center px-2 py-4 border-b-2">
                     <div>Patek</div>
                  </td>
                  <td class="px-2 py-4 border-b-2">
                        
                     <div>
                        <img src="/img/tambah.png" class="w-7" alt="">
                     </div>
                        
                  </td>
                  <td class=" object-center px-1 py-4 border-b-2">
                     <input type="text" class="px-2" placeholder="Komentar">      
                  </td>
                  <td class=" border-b-2">
                     <img src="/img/downloads.png" alt="" class="w-7">         
                  </td>
            </tbody>
         @endforeach
     </table>



     <style>
      body{
         background:#72B944;
      }
   </style>
@endsection


