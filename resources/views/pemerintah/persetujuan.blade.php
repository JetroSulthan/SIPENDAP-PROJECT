@extends('layout.laporankios')
@section('container')

   <div class="absolute top-20 right-2 overflow-x-auto w-[81.5%]  rounded-xl ">
      <table class="w-full table-auto border-black text-black">
         <thead class=" text-center bg-white border-black text-black">
                 <th class="px-1 py-2 font-xl text-black">
                     No
                 </th>
                 <th class="px- py-2 font-xl text-black">
                     Data Laporan
                 </th>
             
                 <th class="px-2 py-2 font-xl text-black">
                     Tanggal
                 </th>
             
                 <th class="px-2 py-2 font-xl text-black">
                     Status
                 </th>
             
                 <th class="px-2 py-2 font-xl text-black">
                     Komentar
                 </th>
             
                 <th class="px-2 py-2 font-xl text-black">
                     
                 </th>
         </thead>
   
         @foreach ($petani as $item)
         <tbody class=" bg-white border-black text-black">
                  <td class="text-center text-black">
                     {{ $loop->iteration }}
                  </td>
                  <td class="px-3 py-4 border-b-2 text-black">
                        <a href="/laporan/{{ $item->id }}">
                           <div>{{ $item->laporan }}</div>
                        </a>
                  </td>
                  <td class=" text-center px-2 py-4 border-b-2 text-black">
                     <div>{{ $tgl }}</div>
                  </td>
                  <td class="justify-center px-4 py-4 border-b-2 text-black">
                     @if ($item->persetujuans_id == null)    
                        <div class="ml-8">
                           <a href="/verifikasilaporan/{{ $item->id }}">
                              <img src="/img/tambah.png" class="w-7" alt="">
                           </a>
                        </div>
                     @elseif ($item->persetujuans_id != null )
                        @foreach ($persetujuan as $p)
                           @if ($item->persetujuans_id == $p->id)    
                              <div>
                                 <a href="/verifikasilaporan/{{  }}">
                                    {{ $p->opsi }}
                                 </a>
                              </div>
                           @endif
                        @endforeach
                     @endif
                  </td>
                  <td class=" object-center px-1 py-4 border-b-2 text-black">
                     <p class="px-2" placeholder="Komentar" value="">{{ $item->komentar }}</p>      
                  </td>
                  <td class=" border-b-2 text-black">
                     <img src="/img/downloads.png" alt="" class="w-7">         
                  </td>
            </tbody>
         @endforeach
     </table>
   </div>





   <style>
      body{
         background:#72B944;
      }
   </style>

@endsection


