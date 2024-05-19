@extends('layout.admin')
@section('container')
   
        <form class="space-y-4 md:space-y-6" action="/buatberita" method="POST" enctype="multipart/form-data" novalidate>
            @csrf
            <div class="flex flex-col justify-center items-center w-full md:w-auto md:max-w-[1000px] h-[720px] ml-28 mt-10">
                <div class="bg-white shadow-md rounded-lg p-6 mt-8 ml-72 mx-auto w-[1000px] h-[720px]">
                    <!-- Content of your rectangular card goes here -->
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Judul Berita</h2>
                    <div>
                        <label for="judul" class="block mb-2 text-sm font-medium text-gray-900"></label>
                        <input type="text" name="judul" id="judul" placeholder="Isi Judul Berita..."
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-[#F5682A] focus:border-[#F5682A] block w-64 p-2.5"
                            required="">
                        @error('judul')
                            <p class="text-red-500 text-sm font-medium py-2 capitalize" role="alert">{{ $message }}</p>
                        @enderror
                    </div>
                    <br>
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Isi Berita</h2>
                    <div>
                        <label for="isi_berita" class="block mb-2 text-sm font-medium text-gray-900"></label>
                        <div
                            class="overflow-hidden rounded-lg w-1/2 h-64 border border-gray-300 focus-within:border-[#F5682A] focus-within:ring-1 focus-within:ring-[#F5682A]">
                            <textarea id="isi_berita" name="isi_berita"
                                class="p-2 w-full h-full resize-none border-none align-top focus:ring-0 sm:text-sm"
                                placeholder="Tuliskan Isi Berita..."></textarea>
                        </div>
                        @error('isi_berita')
                            <p class="text-red-500 text-sm font-medium py-2 capitalize" role="alert">{{ $message }}</p>
                        @enderror
                    </div>
                    <br>
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Keterangan foto (Wajib)</h2>
                    <div>
                        <label for="thumbnail" class="block mb-2 text-sm font-medium text-gray-900"></label>
                        <input type="file" name="thumbnail" id="thumbnail" required="">
                        @error('thumbnail')
                            <p class="text-red-500 text-sm font-medium py-2 capitalize" role="alert">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="bg-green-500 hover:bg-green-500 text-white font-bold py-2 px-4 rounded mt-4">Simpan</button>
                </div>
            </div>
        </form>


    </div>

    <style>
        body {
            background-image: linear-gradient(#72B944, #FFFFFF);
        }
    </style>
@endsection
