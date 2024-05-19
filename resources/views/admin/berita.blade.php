@extends('layout.addberita')
@section('container')
    <div class="flex flex-col mt-12 h-[1280px]">

        <div class="moving-container w-full bg-green-950">
            {{-- <img src="/img/berita.png" alt="Moving Image" class="moving-image"> --}}
            <div class="moving-text text-white">--NONA BERGERAK--</div>
        </div>

        <div class="flex flex-col ml-80">
            @if ($broadcastBerita->count() > 0)
                <?php $no = 1; ?>
                @foreach ($broadcastBerita as $bb)
                    <div class="py-4 px-2 w-full h-full">
                        <div class="w-[95%] bg-white border border-gray-200 rounded-3xl">
                            <div class="items-center md:max-w-[500px] h-[380px] ml-12 mt-10 flex">
                                <img src="{{ url('img/' . $bb->thumbnail) }}" class="w-[500px]">
                            </div>
    
    
                            <div class="  bg-white border p-6 flex flex-row justify-between rounded-xl">
                                <div class="flex flex-col w-[720px] h-full">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $bb->judul }}
                                    </h5>
                                    <p class="truncate tracking-tight text-gray-900">{{ $bb->isi_berita }}</p>
                                </div>
    
                                <div class="flex gap-4">
                                    <a href="{{ route('detail.berita', $bb->id) }}"
                                        class="items-center justify-center w-48 h-10 bg-[#F5682A] hover:bg-[#F54C2A] flex hover:cursor-pointer text-white font-medium py-2 px-4 rounded">
                                        Selengkapnya
                                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                        </svg>
                                    </a>
                                    @if (Auth::user()->roles_id == 1)
                                        <a href="{{ route('edit.berita', $bb->id) }}"
                                            class="items-center justify-center w-16 h-10 bg-blue-500 hover:bg-blue-700 flex hover:cursor-pointer fill-white font-medium py-2 px-4 rounded">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 16 16">
                                                <path fill="white"
                                                    d="m15.909 4.561l-4.47-4.47c-.146-.146-.338-.113-.427.073l-.599 1.248l4.175 4.175l1.248-.599c.186-.089.219-.282.073-.427zM9.615 2.115L5.5 2.458c-.273.034-.501.092-.58.449v.001C3.804 8.268 0 13.499 0 13.499l.896.896l4.25-4.25a1.5 1.5 0 1 1 .707.707l-4.25 4.25l.896.896s5.231-3.804 10.591-4.92h.001c.357-.078.415-.306.449-.58l.343-4.115l-4.269-4.269z" />
                                            </svg>
                                        </a>
    
                                        <button id="deleteButton/{{ $bb->id }}"
                                            data-modal-target="deleteModal/{{ $bb->id }}"
                                            data-modal-toggle="deleteModal/{{ $bb->id }}"
                                            class="items-center justify-center w-16 h-10 button bg-red-500 flex hover:cursor-pointer hover:bg-red-700 text-white font-medium py-2 px-4 rounded"
                                            type="button"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 512 512">
                                                <path fill="none"
                                                    d="M296 64h-80a7.91 7.91 0 0 0-8 8v24h96V72a7.91 7.91 0 0 0-8-8Z" />
                                                <path fill="white"
                                                    d="M432 96h-96V72a40 40 0 0 0-40-40h-80a40 40 0 0 0-40 40v24H80a16 16 0 0 0 0 32h17l19 304.92c1.42 26.85 22 47.08 48 47.08h184c26.13 0 46.3-19.78 48-47l19-305h17a16 16 0 0 0 0-32ZM192.57 416H192a16 16 0 0 1-16-15.43l-8-224a16 16 0 1 1 32-1.14l8 224A16 16 0 0 1 192.57 416ZM272 400a16 16 0 0 1-32 0V176a16 16 0 0 1 32 0Zm32-304h-96V72a7.91 7.91 0 0 1 8-8h80a7.91 7.91 0 0 1 8 8Zm32 304.57A16 16 0 0 1 320 416h-.58A16 16 0 0 1 304 399.43l8-224a16 16 0 1 1 32 1.14Z" />
                                            </svg></button>
                                        <div id="deleteModal/{{ $bb->id }}" tabindex="-1" aria-hidden="true"
                                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                                            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                                <div class="relative p-4 text-center bg-white rounded-lg sm:p-5">
                                                    <p class="mb-4 text-gray-900">Yakin Ingin Menghapus Berita?</p>
                                                    <div class="flex justify-center items-center space-x-4">
                                                        <button data-modal-toggle="deleteModal/{{ $bb->id }}"
                                                            type="button"
                                                            class="py-2 px-3 text-sm font-medium text-white bg-blue-500 rounded hover:bg-blue-700">
                                                            Tidak
                                                        </button>
                                                        <form id='delete' method="POST"
                                                            action="{{ route('destroy.berita', $bb->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="py-2 px-3 text-sm font-medium text-center text-white bg-red-500 rounded hover:bg-red-700">
                                                                Iya
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <h1 class="py-4 px-12 text-m font-medium text-gray-900">Belum Ada Berita...</h1>
            @endif
        </div>
        </div>
        </div>

    </div>

    <style>
        body {
            background-image: linear-gradient(#72B944, #FFFFFF);
        }

        @import url('https://fonts.googleapis.com/css2?family=DM+Sans&display=swap');

        .font-dm-sans {
            font-family: 'DM Sans', sans-serif;
        }

        .moving-container {
            position: relative;
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }
    
        .moving-image {
            position: absolute;
            width: 200px;
            height: 500px;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
            animation: moveHorizontally 10s linear infinite;
        }
    
        .moving-text {
            position: absolute;
            top: 0%;
            left: 0;
            font-size: 20px;
            transform: translateY(-50%);
            color: #FFFFFF;
            animation: moveText 5s linear infinite;
        }
    
        @keyframes moveHorizontally {
            0% {
                left: -100px;
            }
            50% {
                left: calc(100% - 100px);
            }
            100% {
                left: -100px;
            }
        }
    
        @keyframes moveText {
            0% {
                left: 100%;
            }
            50% {
                left: calc(50% - 50px);
            }
            100% {
                left: 100%;
            }
        }
    </style>
@endsection
