@extends('layout.pemerintah')

@section('container')


<div class="flex flex-col justify-center items-center absolute top-10 mx-96 py-4 mt-20 mb-8 bg-white w-[1000px]  rounded-[30px]">
    <form action="" method="POST">
        @csrf
        @method('PUT')

        <div class="">
            <label for="nama_lengkap" class="px-4">Nama Lengkap</label>
            <div class="block py-2.5 px-4 text-sm text-[#72B944] w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl">{{$datapetani->laporan }}</div>
        </div>
        <div class="">
            <label for="nama_lengkap" class="px-4">Status</label>
            <select class="block py-2.5 px-4 text-sm text-[#72B944] w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" name="persetujuan" id="kelurahan">
                <option value="" disabled selected>Opsi</option>
                @foreach ($persetujuan as $item)
                  <option value="{{ $item->id }}" >{{ $item->opsi }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <input type="hidden" class="" name="id" value="{{ $datapetani->id }}">
        </div>
        <div class="flex flex-col">
            <label for="komentar">Komentar</label>
            <textarea class="rounded-lg border-lime-500" id="komentar" name="komentar">{{ $datapetani->komentar }}</textarea>
        </div>
        <!-- Tambahkan field lain sesuai kebutuhan -->
        <button type="submit" class="bg-lime-300 px-4 rounded-xl mt-4 ">Update</button>
    </form>
</div>

<style>
    body{
    background: #72B944;
    }
</style>
@endsection