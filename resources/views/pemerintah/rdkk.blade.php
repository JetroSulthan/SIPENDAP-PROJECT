@php
    function getLuasValues($luas) {
        if ($luas <= 1) {
            return [
                'key' => 1000,
                'values' => [10, 10, 10, 30, 5, 5, 5, 15, 8, 8, 8, 24]
            ];
        } elseif ($luas > 1 && $luas <= 2) {
            return [
                'key' => 2000,
                'values' => [20, 20, 20, 60, 10, 10, 10, 30, 16, 16, 16, 48]
            ];
        } else {
            return [
                'key' => 3000,
                'values' => [30, 30, 30, 90, 15, 15, 15, 45, 24, 24, 24, 72]
            ];
        }
    }
@endphp

@extends('layout.pemerintah')

@section('container')
<div class="w-[80%] space-y-4 top-10 right-3 overflow-x-auto absolute rounded-xl">
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
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($datapetani as $dp)
                @if ($dp->persetujuans_id == 1)
                    @php
                        $luasData = getLuasValues($dp->luas_lahan);
                    @endphp
        
                    <tr class="bg-white divide-y divide-gray-200">
                        <td class="py-2 text-center text-xs font-normal text-black font-[Poppins]">{{ $loop->iteration }}</td>
                        <td class="py-2 text-center text-xs font-normal text-black font-[Poppins]">{{ $dp->nik }}</td>
                        <td class="py-2 text-center text-xs font-normal text-black font-[Poppins]">{{ $dp->nama_lengkap }}</td>
                        <td class="py-2 text-center text-xs font-normal text-black font-[Poppins]">{{ $luasData['key'] }}</td>
        
                        @foreach ($luasData['values'] as $value)
                            <td class="py-2 text-center text-xs font-normal text-black font-[Poppins]">{{ $value }}</td>
                        @endforeach
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>

    <div>
        <a href="{{ url('/rdkk/view') }}" class="text-xl px-5 rounded-xl mt-7 text-white bg-[#FFA500]">Unduh</a>
    </div>
</div>

  <style>
    body{
      background-image: linear-gradient(#72B944, #ffffff);
      background-attachment: fixed;
    }

    table, th, td {
        border: 1px solid black;
        /* border-collapse: separate; */
    }
</style>


@endsection