@extends('layout.pemerintah')

@section('container')
    <div class="flex flex-col justify-center items-center absolute top-10 mx-96 py-4 mt-20 mb-8 bg-white w-[1000px]  rounded-[30px]">
        <form action="" method="POST">
            @csrf
            @method('PUT')

            <div class="">
                <label for="nama_lengkap" class="px-4">File Laporan</label>
                <div class="block py-2.5 px-4 text-sm text-[#72B944] w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl">{{$datapetani->laporan }}</div>
            </div>
            <div>
                <input type="hidden" class="" name="id" value="{{ $datapetani->id }}">
            </div>
            <div class="flex justify-center text-2xl font-semibold">Apakah Laporan Diterima?</div>
            <div class="flex justify-center space-x-48">
                <input name="persetujuan" type="submit" value="Tolak" class="bg-red-500 text-white px-10 py-1.5 text-xl rounded-xl mt-4">
                <input name="persetujuan" type="submit" value="Terima" class="bg-lime-500 px-10 text-white py-1.5 text-xl rounded-xl mt-4">
            </div>
        </form>
    </div>

    <style>
        body{
            background-image: linear-gradient(#72B944, #FFFFFF);
        }
    </style>
@endsection