@extends('layout.pemerintah')

@section('container')

     <div class="flex absolute overflow-x-auto right-24 top-24 w-[1100px] rounded-xl ">
      <table class="rounded-xl overflow-hidden w-full">
          <thead class="bg-white rounded-xl">
              <tr class="rounded-xl">
                  <th 
                      class="px-3 py-2 text-left text-xs font-normal text-black  tracking-wider font-[Poppins]">
                      No</th>
                  <th 
                      class=" px-20 py-2 text-center text-xs font-normal text-black  tracking-wider font-[Poppins]">
                      Data Diri</th>
                  {{-- <th
                      class="px-12 py-2 text-center text-xs font-normal text-black  tracking-wider font-[Poppins]">
                      Data Lahan</th> --}}
                  <th
                      class="px-12 py-2 text-center text-xs font-normal text-black  tracking-wider font-[Poppins]">
                      Pembaruan Terakhir</th>
                  {{-- <th
                      class="px-12 py-2 text-center text-xs font-normal text-black  tracking-wider font-[Poppins]">
                      Berkas</th> --}}
                  <th 
                      class="px-12 py-2 text-center text-xs font-normal text-black  tracking-wider font-[Poppins]">
                      Komentar</th>
                  <th 
                      class="px-12 py-2 text-center text-xs font-normal text-black  tracking-wider font-[Poppins]">
                      Status</th>
                  {{-- <th 
                      class="px-12 py-2 text-center text-xs font-normal text-black  tracking-wider font-[Poppins]">
                     </th> --}}
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
                        @foreach ($dukcapil as $dc)
                            @if ($dp->nama_lengkap == $dc->nama)
                                <a href="/datapetanis/{{ $dp->id }}">
                                    <div class="px-3 text-green-500">{{ $dp->nama_lengkap }}</div>
                                </a>
                                @break
                            @endif
                        @endforeach

                        @if (!$dukcapil->contains('nama', $dp->nama_lengkap))
                            <a href="/datapetanis/{{ $dp->id }}">
                                <div class="px-3 text-red-700">{{ $dp->nama_lengkap }}</div>
                            </a>
                        @endif
                    </td>
                    {{-- <td class="flex content-center items-center justify-center">
                        @foreach ($data_lahan as $data)
                            @if ($dp->data_lahans_id == $data->id) <!-- Check if there is a related DataLahan -->
                                <div class="relative z-0 group">
                                <p>{{ $data->status }}</p> <!-- Displaying the ID, change to other property as necessary -->
                                </div>
                            @endif
                        @endforeach
                    </td> --}}
                    <td class="">
                       <div class=" flex justify-center px-3">{{ $tgl }}</div>
                    </td>
                    {{-- <td class=" flex items-center justify-center">
                        @foreach ($berkas as $b)
                            @if ($dp->berkas_id == $b->id)
                             <!-- Check if there is a related DataLahan -->
                            <div class="justify-center relative z-0 group">
                                <p>{{ $b->status }}</p> <!-- Displaying the ID, change to other property as necessary -->
                            </div>
                            @endif
                        @endforeach
                    </td> --}}
                    <td class="py-4">
                    @if ($dp->nama_lengkap == $dc->nama)    
                            @if ($dp->komentar != null)
                                    <!-- Check if there is a related DataLahan -->
                                        <a href="/ubahverif/{{ $dp->id }}">
                                            <div class="flex justify-center relative z-0 group">
                                                <p>{{ $dp->komentar }}</p> <!-- Displaying the ID, change to other property as necessary -->
                                            </div>
                                        </a>
                            @elseif ($dp->komentar == null)
                                <a href="/ubahverif/{{ $dp->id }}">
                                    <div class=" flex justify-center relative z-0 group">
                                        <img src="/img/edit.png" alt="" class="h-7 w-7"> <!-- Displaying the ID, change to other property as necessary -->
                                    </div>
                                </a>
                            @endif
                    @elseif ($dp->nama_lengkap != $dc->nama)
                        <div class="flex items-center justify-center z-0">
                            <img src="/img/edit.png" alt="" class="h-7 w-7"> <!-- Displaying the ID, change to other property as necessary -->
                        </div>   
                    @endif
                    </td>
                    <td class="flex py-4 justify-center items-center content-center">
                        @switch($dp->nama_lengkap == $dc->nama)
                            @case(true)
                                @if ($dp->persetujuans_id == null)    
                                    <a href="/ubahverifs/{{ $dp->id }}">
                                        <div class="flex justify-center items-center relative z-0 group">
                                            <img src="/img/tambah.png" alt="" class="h-7 w-7"> <!-- Displaying the ID, change to other property as necessary -->
                                        </div>
                                    </a>
                                @else
                                    @foreach ($persetujuan as $p)
                                        @if ($dp->persetujuans_id == $p->id)
                                        <!-- Check if there is a related DataLahan -->
                                            <a href="/ubahverifs/{{ $dp->id }}">
                                                <div class="flex justify-center items-center relative z-0 group">
                                                    <p class="text-center">{{ $p->opsi }}</p> <!-- Displaying the ID, change to other property as necessary -->
                                                </div>
                                            </a>
                                        @endif
                                    @endforeach
                                @endif
                                @break
                            @case(false)
                                <div class="flex items-center justify-center z-0">
                                    <img src="/img/tambah.png" alt="" class="h-7 w-7"> <!-- Displaying the ID, change to other property as necessary -->
                                </div>
                                @break 
                        @endswitch

                        {{-- @if ($dp->nama_lengkap == $dc->nama)
                            @if ($persetujuan != null)
                                @foreach ($persetujuan as $p)
                                    @if ($dp->persetujuans_id == $p->id)
                                    <!-- Check if there is a related DataLahan -->
                                        <a href="/ubahverifs/{{ $dp->id }}">
                                            <div class="justify-center items-center flex relative z-0 group">
                                                <p class="text-center">{{ $p->opsi }}</p> <!-- Displaying the ID, change to other property as necessary -->
                                            </div>
                                        </a>
                                    @endif
                                @endforeach
                            @elseif ($persetujuan == null)
                                <a href="/ubahverifs/{{ $dp->id }}">
                                    <div class="flex justify-center items-center relative z-0 group">
                                        <img src="/img/tambah.png" alt="" class="h-7 w-7"> <!-- Displaying the ID, change to other property as necessary -->
                                    </div>
                                </a>
                            @endif
                        @elseif ($dp->nama_lengkap != $dc->nama)
                            <div class="flex items-center justify-center z-0">
                                <img src="/img/tambah.png" alt="" class="h-7 w-7"> <!-- Displaying the ID, change to other property as necessary -->
                            </div>
                        @endif --}}
                    </td>                    
                   {{-- <td class="px-4 py-4">
                    @if ($dp->nama_lengkap == $dc->nama)
                        <a href="/ubahverif/{{ $dp->id }}">
                            <img src="/img/edit.png" alt="" class="h-7 w-7">
                        </a>
                    @elseif ($dp->nama_lengkap != $dc->nama)
                        <img src="/img/edit.png" alt="" class="h-7 w-7">
                    @endif
                   </td> --}}
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
      background-image: linear-gradient(#72B944, #ffffff);
      background-attachment: fixed;
    }
</style>
@endsection

