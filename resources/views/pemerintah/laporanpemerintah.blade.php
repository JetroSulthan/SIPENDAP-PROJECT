@extends('layout.pemerintah')

@section('container')

<div class="flex absolute w-[1100px] my-16 right-20">

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

   <table class="rounded-2xl overflow-hidden w-full">
      <thead class="bg-white rounded-xl">
         <tr class="rounded-xl">
            <th class="px-2 py-2 text-left text-sm font-normal text-black tracking-wider font-[Poppins]">No</th>
            <th class="px-3 py-2 text-left text-sm font-normal text-black tracking-wider font-[Poppins]">Data Laporan</th>
            <th class="py-2 text-center text-sm font-normal text-black tracking-wider font-[Poppins]"></th>
         </tr>
      </thead>
      <tbody class="bg-white">
         @foreach ($files as $file)
         <tr class="border-b">
            <td class="">
               <div class="px-2 py-1">{{ $loop->iteration }}</div>
            </td>
            <td class="">
               <a href="/laporanpemerintah/{{ $file->id }}">
                  <div class="px-3">{{ $file->laporan }}</div>
               </a>
            </td>
            <td class="py-4">
               <form action="{{ route('download', $file->id) }}" method="POST">
                  @csrf
                  <button type="submit" class="btn btn-success">
                     <img src="/img/downloads.png" alt="" class="h-7 w-7">
                  </button>
               </form>
            </td>
         </tr>
         @endforeach
      </tbody>
   </table>
</div>



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
      background-image: linear-gradient(#72B944, #ffffff);
      background-attachment: fixed;
    }
</style>
@endsection

