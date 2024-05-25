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
    <form class="relative bg-[FFFFFF] px-48 mt-4 w-auto flex flex-col space-y-3" enctype="multipart/form-data" method="POST" action="">
        @csrf
        @method('PUT')
        <div class="relative z-0 w-full group">
            <label for="username" class="px-4">Username</label>
            {{-- @foreach ( $user as $us ) --}}
                {{-- @if ($us->id == $users->id) --}}
            <input type="text" name="nik" id="username" class="block py-2.5 px-4 text-sm text-black w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl"  placeholder="" value="{{ $users->username }}">
                {{-- @endif --}}
            {{-- @endforeach --}}
        </div>
        <div class="relative z-0 w-full group">
            <label for="nama" class="px-4"> Nama Lengkap</label>
            <input type="text" name="nama" id="nama" class="block py-2.5 px-4 text-sm text-black w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl"  placeholder="NIK" value="{{ $profil->nama_lengkap }}"/>
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
                        <p type="text" name="kelamin" id="kelamin" class="block py-2.5 px-4 text-sm text-black w-[350px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl"  placeholder=""> {{ $kel->nama }}</p>
                    @endif
                @endforeach
            </div>
            <div class="mr-4">
                <label for="tempat_lahir" class="px-4">Tempat Lahir</label>
                
                <input type="text" name="tempat_lahir" id="tempat" class="block py-2.5 px-4 text-sm text-black w-[150px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl"  placeholder="" value="{{ $profil->tempat_lahir }}"/>
            </div>
            <div>
                <label for="tanggal_lahir" class="px-4">Tanggal Lahir</label>
                <input type="text" name="tanggal_lahir" id="lahir" class="block py-2.5 px-4 text-sm text-black w-[200px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl"  placeholder="" value="{{ $profil->tanggal_lahir }}"/>
            </div>
        </div>

        <input type="hidden" class="" name="users_id" value="{{ $profil->users_id }}">

        <div class="relative z-0 w-full group">
            <label for="jalan" class="px-4">Jalan</label>
            <input type="text" name="jalan" id="jalan" class="block py-2.5 px-4 text-sm text-black w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl"  placeholder="Jalan" value="{{ $profil->jalan }}"/>
        </div>
        <div class="relative z-0 w-full group">
            <label for="kecamatan" class="px-4">Kecamatan</label>
            <input type="text" name="kecamatan" id="kecamatan" class="block py-2.5 px-4 text-sm text-black w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl"  placeholder="Kecamatan" value="{{ $profil->kecamatan }}"/>
        </div>
        <div class="relative z-0 w-full group">
            <label for="kota" class="px-4">Kota</label>
            <input type="text" name="kota" id="kota" class="block py-2.5 px-4 text-sm text-black w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl"  placeholder="Kota" value="{{ $profil->kota }}"/>
        </div>
        
        
        <div>
            <button type="submit" class=" mt-2 text-white bg-[#72B944] hover:bg-[#5D9B35] focus:ring-2 focus:outline-none focus:ring-[#72B944] font-medium rounded-full text-[15px] w-full sm:w-auto px-8 py-1.5 text-center">Simpan</button>
        </div>
    </form>
</div>

<style>
    body{
    background: #72B944;
    }
</style>
@endsection