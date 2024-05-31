@php
    $roleId = Auth::user()->roles_id;
    $layout = '';

    switch ($roleId) {
        case 1:
            $layout = 'layout.addberita';
            break;
        case 2:
            $layout = 'layout.pemerintah';
            break;
        case 3:
            $layout = 'layout.kelompoktani';
            break;
        default:
            $layout = 'layout.default';  // Optionally handle unrecognized roles
            break;
    }
@endphp

@extends($layout)



@section('container')

<div class="flex flex-col">
    <div class="flex justify-center items-center w-full md:w-auto md:max-w-[1100px] h-full ml-80 mt-20 bg-white rounded-lg shadow-lg p-6">
        <div class="w-full flex flex-col">
            <div class="mt-4 mb-4">
                <h1 class="text-3xl font-bold text-gray-900 text-center">
                    {{ $broadcastBerita->judul }}
                </h1>
                <div class="flex w-full items-center justify-center mt-4">
                    <img src="{{ url('img/' . $broadcastBerita->thumbnail) }}" class="w-full max-w-[720px] rounded-lg">
                </div>
                <br>
                <div class="flex h-full items-center justify-center mt-4">
                    <div class="prose lg:prose-xl text-justify px-4">
                        {!! nl2br(e($broadcastBerita->isi_berita)) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    
    <style>
          body,
        html {
            height: 100%;
            margin: 0;
        }

        body {
            background-image: linear-gradient(#72B944, #FFFFFF);
            background-attachment: fixed;

        }
    </style>
@endsection