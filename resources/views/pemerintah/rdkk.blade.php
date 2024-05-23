@extends('layout.pemerintah')

@section('container')
<div class="w-[80%] top-10 right-3 overflow-x-auto absolute rounded-xl">
    <table class="rounded-xl w-full table-auto border-opacity-90 border-black">
        <thead class="bg-[#FFA500] rounded-xl text-center">
            <tr class="rounded-xl">
                <th rowspan="3" colspan="" class="py-2 text-center text-xs font-normal text-black  font-[Poppins]">No</th>
                <th rowspan="3" colspan="" class="py-2 text-center text-xs font-normal text-black  font-[Poppins]">NIK</th>
                <th rowspan="3" colspan="" class="py-2 text-center text-xs font-normal text-black  font-[Poppins]">Nama</th>
                <th rowspan="3" class="py-2 text-center text-xs font-normal text-black  font-[Poppins]">Rencana Tanam</th>
                <th colspan="12" class="w-auto py-1 text-center text-xs font-normal text-black  font-[Poppins]">Alokasi Pupuk Bersubsidi (Kg)</th>
            </tr>
            <tr>
                <th colspan="4" class="py-2 text-center text-xs font-normal text-black  font-[Poppins]">UREA</th>
                <th colspan="4" class="py-2 text-center text-xs font-normal text-black  font-[Poppins]">NPK FORMULA</th>
                <th colspan="4" class="py-2 text-center text-xs font-normal text-black  font-[Poppins]">NPK</th>
            </tr>
            <tr>
                <th class="px-1 py-2 text-center text-xs font-normal text-black  font-[Poppins]">MT1</th>
                <th class="px-1 py-2 text-center text-xs font-normal text-black  font-[Poppins]">MT2</th>
                <th class="px-1 py-2 text-center text-xs font-normal text-black  font-[Poppins]">MT3</th>
                <th class="px-1 py-2 text-center text-xs font-normal text-black  font-[Poppins]">Jml</th>
                <th class="px-1 py-2 text-center text-xs font-normal text-black  font-[Poppins]">MT1</th>
                <th class="px-1 py-2 text-center text-xs font-normal text-black  font-[Poppins]">MT2</th>
                <th class="px-1 py-2 text-center text-xs font-normal text-black  font-[Poppins]">MT3</th>
                <th class="px-1 py-2 text-center text-xs font-normal text-black  font-[Poppins]">Jml</th>
                <th class="px-1 py-2 text-center text-xs font-normal text-black  font-[Poppins]">MT1</th>
                <th class="px-1 py-2 text-center text-xs font-normal text-black  font-[Poppins]">MT2</th>
                <th class="px-1 py-2 text-center text-xs font-normal text-black  font-[Poppins]">MT3</th>
                <th class="px-1 py-2 text-center text-xs font-normal text-black  font-[Poppins]">Jml</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y  divide-gray-200">
          @foreach ($datapetani as $dp)
          <tr class="bg-white divide-y divide-gray-200">
              <td class="py-2 text-center text-xs font-normal text-black  font-[Poppins]">{{ $loop->iteration }}</td>
              <td class="py-2 text-center text-xs font-normal text-black  font-[Poppins]">{{ $dp->nik }}</td>
              <td class="py-2 text-center text-xs font-normal text-black  font-[Poppins]">{{ $dp->nama_lengkap }}</td>
              <td class="py-2 text-center text-xs font-normal text-black  font-[Poppins]">1000</td>
              <td class="py-2 text-center text-xs font-normal text-black  font-[Poppins]">10</td>
              <td class="py-2 text-center text-xs font-normal text-black  font-[Poppins]">10</td>
              <td class="py-2 text-center text-xs font-normal text-black  font-[Poppins]">10</td>
              <td class="py-2 text-center text-xs font-normal text-black  font-[Poppins]">30</td>
              <td class="py-2 text-center text-xs font-normal text-black  font-[Poppins]">5</td>
              <td class="py-2 text-center text-xs font-normal text-black  font-[Poppins]">5</td>
              <td class="py-2 text-center text-xs font-normal text-black  font-[Poppins]">5</td>
              <td class="py-2 text-center text-xs font-normal text-black  font-[Poppins]">15</td>
              <td class="py-2 text-center text-xs font-normal text-black  font-[Poppins]">8</td>
              <td class="py-2 text-center text-xs font-normal text-black  font-[Poppins]">8</td>
              <td class="py-2 text-center text-xs font-normal text-black  font-[Poppins]">8</td>
              <td class="py-2 text-center text-xs font-normal text-black  font-[Poppins]">24</td>
          </tr>
          @endforeach
            <!-- Tambahkan baris lainnya sesuai kebutuhan -->
        </tbody>
    </table>
</div>

  <style>
    body{
         background:#72B944;
    }

    table, th, td {
        border: 1px solid black;
        /* border-collapse: separate; */
    }
</style>

@endsection