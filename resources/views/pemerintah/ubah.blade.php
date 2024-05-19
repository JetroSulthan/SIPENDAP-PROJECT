@extends('layout.pemerintah')

@section('container')


<div class="flex flex-col justify-center items-center absolute top-10 mx-96 py-4 mt-20 mb-8 bg-white w-[1000px]  rounded-[30px]">
    <form action="" method="POST">
        @csrf
        @method('POST')

        <div class="">
            <label for="nama_lengkap" class="px-4">Nama Lengkap</label>
            <input type="text" class="block py-2.5 px-4 text-sm text-black w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" id="nama_lengkap" name="nama_lengkap" value="{{ $datapetani->nama_lengkap }}">
        </div>
        <div class="">
            @if ($petani->datalahan) <!-- Check if there is a related DataLahan -->
                <div class="relative z-0 group">
                    <p>{{ $petani->datalahan->status }}</p> <!-- Displaying the ID, change to other property as necessary -->
                </div>
            @endif
            <label for="nama_lengkap" class="px-4">Data Lahan</label>
            <input type="text" class="block py-2.5 px-4 text-sm text-black w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" id="nama_lengkap" name="nama_lengkap" value="{{ $petani->datalahan->status }}">
        </div>
        <div class="">
            <label for="nama_lengkap" class="px-4">Berkas</label>
            <input type="text" class="block py-2.5 px-4 text-sm text-black w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" id="nama_lengkap" name="nama_lengkap" value="{{ $datapetani->nama_lengkap }}">
        </div>

        <div class="">
            <label for="komentar">Komentar:</label>
            <textarea class="form-control" id="komentar" name="komentar">{{ $datapetani->komentar }}</textarea>
        </div>

        <!-- Tambahkan field lain sesuai kebutuhan -->

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<style>
    body{
    background: #72B944;
    }
</style>
@endsection