@extends('layout.pemerintah')

@section('container')


<div class="flex flex-col justify-center items-center absolute top-10 mx-96 py-4 mt-20 mb-8 bg-white w-[1000px]  rounded-[30px]">
    <form action="" method="POST">
        @csrf
        @method('PUT')

        <div class="">
            <label for="nama_lengkap" class="px-4">Nama Lengkap</label>
            <p type="text" class="block py-2.5 px-4 text-sm text-black w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" id="nama_lengkap" name="nama_lengkap" value="">{{ $datapetani->nama_lengkap }}</p>
        </div>
        <div>
            <input type="hidden" class="" name="id" value="{{ $datapetani->id }}">
        </div>
        <div class="flex flex-col">
            <label for="komentar">Komentar</label>
            <textarea class="rounded-xl" id="komentar" name="komentar">{{ $datapetani->komentar }}</textarea>
        </div>
        <!-- Tambahkan field lain sesuai kebutuhan -->
        <button type="submit" class="bg-lime-300 px-4 rounded-xl mt-4">Simpan</button>
    </form>
</div>

<style>
    body{
      background-image: linear-gradient(#72B944, #ffffff);
      background-attachment: fixed;
    }
</style>
@endsection