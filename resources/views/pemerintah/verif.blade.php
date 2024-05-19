@extends('layout.pemerintah')

@section('container')

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
                      Data Lahan</th>
                  <th
                      class="px-12 py-2 text-center text-xs font-normal text-black  tracking-wider font-[Poppins]">
                      Pembaruan Terakhir</th>
                  <th
                      class="px-12 py-2 text-center text-xs font-normal text-black  tracking-wider font-[Poppins]">
                      Berkas</th>
                  <th 
                      class="px-12 py-2 text-center text-xs font-normal text-black  tracking-wider font-[Poppins]">
                      Komentar</th>
                  <th 
                      class="px-12 py-2 text-center text-xs font-normal text-black  tracking-wider font-[Poppins]">
                      Status</th>
                  <th 
                      class="px-12 py-2 text-center text-xs font-normal text-black  tracking-wider font-[Poppins]">
                     </th>
              </tr>
          </thead>
<div>
         <form action="">
            @csrf
            <tbody class="bg-white  ">
                @foreach ($datapetani as $dp)
                <tr class="border-b">
                    <td class="">
                        <div class="px-2 py-1">{{ $loop->iteration }}</div>
                    </td>
                    <td class="">
                       <a href="/datapetani/{{ $dp->id }}">
                          <div class="px-3">{{ $dp->nama_lengkap }}</div>
                       </a>
                    </td>
                    <td class="flex content-center items-center justify-center">
                       @if ($petani->datalahan) <!-- Check if there is a related DataLahan -->
                           <div class="relative z-0 group">
                              <p>{{ $petani->datalahan->status }}</p> <!-- Displaying the ID, change to other property as necessary -->
                           </div>
                       @endif
                    </td>
                    <td class="">
                       <div class="px-3">{{ $tgl }}</div>
                    </td>
                    <td class=" flex justify-center">
                     @if ($petani->berkas) <!-- Check if there is a related DataLahan -->
                     <div class="relative z-0 group">
                        <p>{{ $petani->berkas->status }}</p> <!-- Displaying the ID, change to other property as necessary -->
                     </div>
                     @endif
                    </td>
                    <td class="">
                        <div class=" px-2 py-1">
                           <p>{{ $dp->komentar }}</p>
                          {{-- <input type="text"> --}}
                        </div>
                    </td>
                    <td class="relative flex justify-center">
                     @if ($petani->Persetujuan) <!-- Check if there is a related DataLahan -->
                     <div class=" z-0 group">
                        <p>{{ $petani->Persetujuan->opsi }}</p> <!-- Displaying the ID, change to other property as necessary -->
                     </div>
                     @endif
                   </td>
                   <td class="px-4 py-4">
                     <a href="/ubahverif/{{ $dp->id }}">
                        <img src="/img/edit.png" alt="" class="h-7 w-7">
                     </a>
                   </td>
                </tr>
                @endforeach
            </tbody>
         </form>
        </table>

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

            

// // Menambahkan event listener untuk tombol-tombol submit
//             document.querySelectorAll('.submit-btn').forEach(function(btn) {
//                btn.addEventListener('click', function(event) {
//                event.preventDefault(); // Mencegah perilaku bawaan submit tombol
//         // Lakukan pengiriman data melalui Ajax ke server di sini
//         // Anda bisa menggunakan fetch atau library Ajax seperti axios
//     });
// });

            // document.getElementById('tambah').addEventListener('click', function() {
            //    var tooltip = document.getElementById('tooltip');
            //    tooltip.classList.toggle('invisible');
            // });

//             document.querySelectorAll('.submit-btn').forEach(function(btn) {
//     btn.addEventListener('click', function(event) {
//         event.preventDefault();
//         var value = btn.value;
//         document.getElementById('gambar').src = "/img/" + value + ".png"; // Ganti sumber gambar sesuai dengan nilai tombol yang diklik
//     });
// });



        </script> 

<style>
   body{
      background:#72B944;
   }
</style>
@endsection

