<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Document</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
   <div class="absolute top-20 right-2 overflow-x-auto w-[81.5%]  rounded-xl ">
      <table class="w-full table-auto border-black text-black">
         <thead class=" text-center bg-white border-black text-black">
            <tr>
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
            </tr>
         </thead>
   
         @foreach ($petani as $item)
         <tbody class=" bg-white border-black text-black">
            <tr>
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
                        -
                     @else
                        @if ($item->persetujuans_id == 1)
                            Disetujui
                        @elseif ($item->persetujuans_id == 2)
                            Ditolak
                        @endif
                     @endif
                </td>
                <td class=" object-center px-1 py-4 border-b-2 text-black">
                   <p class="px-2" placeholder="Komentar" value="">{{ $item->komentar }}</p>      
                </td>
            </tr>
            </tbody>
         @endforeach
     </table>
   </div>

   @if (strpos(url()->current(), 'pdf') == false)
        <a href="/testing/pdf">
            <button class="bottom-[270px] right-4 text-lg absolute font-sans text-black rounded-lg bg-white w-[115px] mt-1">Print PDF</button>
        </a>
   @endif

</body>
</html>