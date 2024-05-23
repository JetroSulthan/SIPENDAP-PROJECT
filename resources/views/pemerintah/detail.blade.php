@php
    $roleId = Auth::user()->roles_id;
    $layout = '';

    switch ($roleId) {
        case 1:
            $layout = 'layout.admin';
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

<div class="flex flex-col justify-center items-center absolute top-10 mx-96 py-4 mt-20 mb-8 bg-white w-[1000px]  rounded-[30px]">
    <form class="relative bg-[FFFFFF] px-48 mt-4 w-auto flex flex-col space-y-3">
        <div class="relative z-0 w-full group">
            <label for="username" class="px-4">Username</label>
            {{-- @foreach ( $user as $us ) --}}
                {{-- @if ($us->id == $users->id) --}}
                    <p type="text" name="nik" id="username" class="block py-2.5 px-4 text-sm text-black w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl"  placeholder="">{{ $users->username }} </p>
                {{-- @endif --}}
            {{-- @endforeach --}}
        </div>
        <div class="relative z-0 w-full group">
            <label for="nama" class="px-4"> Nama Lengkap</label>
            <input type="text" name="nik" id="nama" class="block py-2.5 px-4 text-sm text-black w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl"  placeholder="NIK" value="{{ $profil->nama_lengkap }}"/>
        </div>
        <div class="relative z-0 w-full group">
            <label for="nik" class="px-4">NIK</label>
            <input type="text" name="nik" id="nik" class="block py-2.5 px-4 text-sm text-black w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl"  placeholder="NIK" value="{{ $profil->nik }}"/>
        </div>
        <div class="flex relative z-0 w-full group">
            <div class=" mr-16">
                <label for="kelamin" class="px-4">Jenis Kelamin</label>
                @foreach ( $kelamin as $kel ) 
                    @if ($kel->id == $kelaminuser->id)  
                        <p type="text" name="nik" id="kelamin" class="block py-2.5 px-4 text-sm text-black w-[350px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl"  placeholder=""> {{ $kel->nama }}</p>
                    @endif
                @endforeach
            </div>
            <div class="mr-4">
                <label for="tempat" class="px-4">Tempat</label>
                
                <input type="text" name="nik" id="tempat" class="block py-2.5 px-4 text-sm text-black w-[150px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl"  placeholder="" value="{{ $profil->tempat_lahir }}"/>
            </div>
            <div>
                <label for="lahir" class="px-4">Tanggal Lahir</label>
                <input type="text" name="nik" id="lahir" class="block py-2.5 px-4 text-sm text-black w-[200px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl"  placeholder="" value="{{ $profil->tanggal_lahir }}"/>
            </div>
        </div>
        <div class="relative z-0 w-full group">
            <label for="alamat" class="px-4">Alamat Rumah</label>
            <input type="text" name="nik" id="alamat" class="block py-2.5 px-4 text-sm text-black w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl"  placeholder="NIK" value="{{ $profil->jalan }}"/>
        </div>
        <div>
            <a href="" class=" mt-2 text-white bg-[#72B944] hover:bg-[#5D9B35] focus:ring-2 focus:outline-none focus:ring-[#72B944] font-medium rounded-full text-[15px] w-full sm:w-auto px-8 py-1.5 text-center"> Ubah
            </a>
        </div>
    </form>
</div>

<style>
    body{
    background: #72B944;
    }
</style>
@endsection