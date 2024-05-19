@extends('layout.pemerintah')

@section('container')
{{-- @php
   $berkas = Berkas::all();
   $datapetani = Petani::all();
   $idBerkasPetani = $datapetani->pluck('berkas_id')->toArray();
   $berkasTerpilih = $berkas->whereIn('id', $idBerkasPetani);

   dd($berkasTerpilih);
@endphp --}}
{{-- @dd($lahan_user) --}}
     <div class="flex absolute top-32 px-[340px] rounded-xl ">
      <table class="rounded-xl w-full table-auto">
          <thead class="bg-white rounded-xl">
              <tr class="rounded-xl">
                  <th 
                      class="px-3 py-2 text-left text-xs font-normal text-black  tracking-wider font-[Poppins]">
                      No</th>
                  <th 
                      class=" px-20 py-2 text-center text-xs font-normal text-black  tracking-wider font-[Poppins]">
                      Data Diri</th>
                  <th 
                      class="px-12 py-2 text-center text-xs font-normal text-black  tracking-wider font-[Poppins]">
                     </th>
              </tr>
          </thead>
<div>
   @foreach ($files as $file)
   {{-- @dd($file->id) --}}
         <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <tbody class="bg-white  ">
               
                <tr class="border-b">
                    <td class="">
                        <div class="px-2 py-1">{{ $loop->iteration }}</div>
                    </td>
                    <td class="">
                       <a href="/laporan/{{ $file->id }}">
                          <div class="px-3">{{ $file->laporan }}</div>
                       </a>
                    </td>
                   <td class="px-4 py-4">
                     {{-- <a href="/laporan/{{ $file->id }}"> --}}
                        <button type="submit" class="btn btn-succes">
                           <img src="/img/downloads.png" alt="" class="h-7 w-7">
                        </button>
                     {{-- </a> --}}
                   </td>
                </tr>
                @endforeach
            </tbody>
         </form>

          <script>
            document.getElementById('tambah').onclick = function(event) {
               event.stopPropagation(); // Menghentikan event bubbling untuk mencegah penutupan tooltip saat ikon diklik
               document.getElementById('tooltip').classList.toggle('invisible');
            };

            const tdElements = document.querySelectorAll('td.relative');

    // Loop melalui setiap elemen td
            tdElements.forEach(td => {
               // Tambahkan event listener untuk event click
               td.addEventListener('click', function() {
                     // Ketika td diklik, toggle kelas 'invisible' pada elemen dengan id "tooltip" di dalamnya
                     const tooltip = this.querySelector('#tooltip');
                     tooltip.classList.toggle('invisible');
               });
            });



        </script> 

<style>
   body{
      background:#72B944;
   }
</style>
@endsection

