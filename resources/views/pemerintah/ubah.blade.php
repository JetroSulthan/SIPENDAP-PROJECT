@extends('layout.pemerintah')

@section('container')


<div class="flex flex-col justify-center items-center absolute top-10 mx-96 py-4 mt-20 mb-8 bg-white w-[1000px]  rounded-[30px]">
    <form action="" method="POST">
        @csrf
        @method('POST')

        <div class="">
            <label for="nama_lengkap">Nama Lengkap</label>
            <input type="text" class="" id="nama_lengkap" name="nama_lengkap" value="{{ $datapetani->nama_lengkap }}">
        </div>

        <div class="form-group">
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