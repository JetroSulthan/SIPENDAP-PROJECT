@extends('layout.pemerintah')
@section('container')
<div  class="border-black">
   <div id="content" class="absolute top-20 right-2 overflow-x-auto w-[81.5%]  rounded-xl ">
      <table class="w-full table-auto">
         <thead class=" text-center bg-white">
             
                 <th class="px-1 py-2 font-xl">
                     No
                 </th>
                 
                 <th class="px- py-2 font-xl">
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
                     <div>{{ $tgl }}</div>
                  </td>
                  <td class="justify-center px-4 py-4 border-b-2">
                     <div class="ml-8">
                        <a href="">
                           <img src="/img/tambah.png" class="w-7" alt="">
                        </a>
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
   </div>
   <button onclick="generatePDF()" class="bottom-[270px] right-4 text-lg absolute font-sans text-black rounded-lg bg-white w-[115px] mt-1">Print PDF</button>
</div>

<script>
   function generatePDF() {
       const element = document.getElementById('content');
       html2pdf(element, {
           margin: 1,
           filename: 'document.pdf',
           image: { type: 'jpeg', quality: 0.98 },
           html2canvas: { scale: 2 },
           jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
       });
   }
</script>


     <style>
      body{
         background:#72B944;
      }
   </style>
@endsection


