
@extends('layout.main')

@section('container')
<div class="bg-[#72B944] flex justify-center h-screen">
    <div class="flex flex-col relative mx-auto mt-20 bg-white w-[1200px] h-[600px] rounded-[30px] justify-center">
        <div class=" flex -mt-16 flex-row items-center justify-center">
            <div class="-ml-80 mr-52">
                <a href="/register3">
                    <button type="submit" class=" text-[#72B944] hover:text-white border-2 border-[#72B944] bg-[#FFFFFF] hover:bg-[#5D9B35] focus:ring-2 focus:outline-none focus:ring-[#72B944] font-medium rounded-full text-sm w-full sm:w-auto px-5 py-1.5 text-center">Sebelumnya</button>
                </a>
            </div>

            <div class="flex flex-row gap-1 items-center">
                <p class="rounded-full bg-[#72B944] w-6 h-6 text-center">1</p>
                <div class="ml-2 mr-2 w-20 bg-gray-200 rounded-full h-3">
                    <div class="bg-[#72B944] h-3 rounded-full" style="width: 100%"></div>
                  </div>
                <p class="rounded-full bg-[#72B944] w-6 h-6 text-center">2</p>
                <div class="ml-2 mr-2 w-20 bg-gray-200 rounded-full h-3">
                    <div class="bg-[#72B944] h-3 rounded-full " style="width: 100%"></div>
                  </div>
                <p class="rounded-full bg-[#72B944] w-6 h-6 text-center">3</p>
                <div class="ml-2 mr-2 w-20 bg-gray-200 rounded-full h-3">
                    <div class="bg-[#72B944] h-3 rounded-full " style="width: 100%"></div>
                  </div>
                <p class="rounded-full bg-[#72B944] w-6 h-6 text-center">4</p>
            </div>

            

            {{-- <div class="ml-52 -mr-72">
                <a href="/register4">
                    <button type="submit" class=" text-white bg-[#72B944] hover:bg-[#5D9B35] focus:ring-2 focus:outline-none focus:ring-[#72B944] font-medium rounded-full text-sm w-full sm:w-auto px-5 py-1.5 text-center">Selanjutnya</button>
                </a>
            </div> --}}
        </div>
        
        <div class="mt-10 flex justify-center scale-75">
            <img src="img/centang.png" alt="">
        </div>

        <div class=" ml-[380px] justify-center flex flex-col mb-8">
            <h1 class="text-center font-bold text-2xl w-[450px]">Kirimkan Permintaan Anda</h1>
            <p class="text-center text-wrap text-md w-[450px]">Harap tinjau semua informasi yang Anda ketik sebelumnya pada langkah sebelumnya, dan jika semuanya baik-baik saja, kirimkan pesan Anda untuk menerima penawaran proyek dalam 24 - 48 jam.</p>
        </div>

        <div class="justify-center flex">
            <a href="" class=" text-white bg-[#72B944] hover:bg-[#5D9B35] focus:ring-2 focus:outline-none focus:ring-[#72B944] font-medium rounded-full text-lg w-full sm:w-auto px-10 py-1.5 text-center">Kirim</a>
        </div>

        
    </div>
</div>
@endsection
