<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test Homepage</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
  <table class="rounded-xl w-full border-opacity-90 border-black">
      <thead class="bg-red-500 rounded-xl">
          <tr class="rounded-xl">
              <th rowspan="3" colspan="" class="py-2 text-left text-xs font-normal text-black tracking-wider font-[Poppins]">No</th>
              <th rowspan="3" colspan="" class="py-2 text-center text-xs font-normal text-black tracking-wider font-[Poppins]">NIK</th>
              <th rowspan="3" colspan="" class="py-2 text-center text-xs font-normal text-black tracking-wider font-[Poppins]">Nama</th>
              <th rowspan="3" class="py-2 text-center text-xs font-normal text-black tracking-wider font-[Poppins]">Rencana Tanam</th>
              <th colspan="12" class="w-auto py-1 text-center text-xs font-normal text-black tracking-wider font-[Poppins]">Alokasi Pupuk Bersubsidi (Kg)</th>
          </tr>
          <tr>
              <th colspan="4" class="py-2 text-center text-xs font-normal text-black tracking-wider font-[Poppins]">UREA</th>
              <th colspan="4" class="py-2 text-center text-xs font-normal text-black tracking-wider font-[Poppins]">NPK FORMULA</th>
              <th colspan="4" class="py-2 text-center text-xs font-normal text-black tracking-wider font-[Poppins]">NPK</th>
          </tr>
          <tr>
              <th class="px-1 py-2 text-center text-xs font-normal text-black tracking-wider font-[Poppins]">MT1</th>
              <th class="px-1 py-2 text-center text-xs font-normal text-black tracking-wider font-[Poppins]">MT2</th>
              <th class="px-1 py-2 text-center text-xs font-normal text-black tracking-wider font-[Poppins]">MT3</th>
              <th class="px-1 py-2 text-center text-xs font-normal text-black tracking-wider font-[Poppins]">Jml</th>
              <th class="px-1 py-2 text-center text-xs font-normal text-black tracking-wider font-[Poppins]">MT1</th>
              <th class="px-1 py-2 text-center text-xs font-normal text-black tracking-wider font-[Poppins]">MT2</th>
              <th class="px-1 py-2 text-center text-xs font-normal text-black tracking-wider font-[Poppins]">MT3</th>
              <th class="px-1 py-2 text-center text-xs font-normal text-black tracking-wider font-[Poppins]">Jml</th>
              <th class="px-1 py-2 text-center text-xs font-normal text-black tracking-wider font-[Poppins]">MT1</th>
              <th class="px-1 py-2 text-center text-xs font-normal text-black tracking-wider font-[Poppins]">MT2</th>
              <th class="px-1 py-2 text-center text-xs font-normal text-black tracking-wider font-[Poppins]">MT3</th>
              <th class="px-1 py-2 text-center text-xs font-normal text-black tracking-wider font-[Poppins]">Jml</th>
          </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
          <tr class="bg-white divide-y divide-gray-200">
              <td class="py-2 text-left text-xs font-normal text-black tracking-wider font-[Poppins]">1</td>
              <td class="py-2 text-center text-xs font-normal text-black tracking-wider font-[Poppins]">1234567890</td>
              <td class="py-2 text-center text-xs font-normal text-black tracking-wider font-[Poppins]">John Doe</td>
              <td class="py-2 text-center text-xs font-normal text-black tracking-wider font-[Poppins]">1000</td>
              <td class="py-2 text-center text-xs font-normal text-black tracking-wider font-[Poppins]">10</td>
              <td class="py-2 text-center text-xs font-normal text-black tracking-wider font-[Poppins]">10</td>
              <td class="py-2 text-center text-xs font-normal text-black tracking-wider font-[Poppins]">10</td>
              <td class="py-2 text-center text-xs font-normal text-black tracking-wider font-[Poppins]">30</td>
              <td class="py-2 text-center text-xs font-normal text-black tracking-wider font-[Poppins]">5</td>
              <td class="py-2 text-center text-xs font-normal text-black tracking-wider font-[Poppins]">5</td>
              <td class="py-2 text-center text-xs font-normal text-black tracking-wider font-[Poppins]">5</td>
              <td class="py-2 text-center text-xs font-normal text-black tracking-wider font-[Poppins]">15</td>
              <td class="py-2 text-center text-xs font-normal text-black tracking-wider font-[Poppins]">8</td>
              <td class="py-2 text-center text-xs font-normal text-black tracking-wider font-[Poppins]">8</td>
              <td class="py-2 text-center text-xs font-normal text-black tracking-wider font-[Poppins]">8</td>
              <td class="py-2 text-center text-xs font-normal text-black tracking-wider font-[Poppins]">24</td>
          </tr>
          <!-- Tambahkan baris lainnya sesuai kebutuhan -->
      </tbody>
  </table>
</body>
</html>