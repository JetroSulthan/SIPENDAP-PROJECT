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

<div class="flex flex-col justify-center items-center absolute top-10 mx-96 py-4 mb-8 bg-white w-[1000px]  rounded-[30px]">
    @if($errors->any())
      <div class="absolute top-20 z-10 alert bg-slate-400">
        <ul>
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill"></i> 
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <script>
            setTimeout(function() {
                let alert = document.querySelector('.alert');
                if (alert) {
                    let bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                }
            }, 5000); // 5 seconds
        </script>
    @endif


    <form class="relative bg-[FFFFFF] px-48 mt-4 w-auto flex flex-col space-y-3" enctype="multipart/form-data" method="POST" action="">
        @csrf
        @method('PUT')
        <div class="relative z-0 w-full group">
            <label for="username" class="px-4">Username</label>
            {{-- @foreach ( $user as $us ) --}}
                {{-- @if ($us->id == $users->id) --}}
            <input type="text" name="username" id="username" class="block py-2.5 px-4 text-sm text-black w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl"  placeholder="" value="{{ $users->username }}">
                {{-- @endif --}}
            {{-- @endforeach --}}
        </div>
        <div class="relative z-0 w-full group">
            <label for="nama" class="px-4"> Nama Lengkap</label>
            <input type="text" name="nama_lengkap" id="nama" class="block py-2.5 px-4 text-sm text-black w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl"  placeholder="NIK" value="{{ $profil->nama_lengkap }}"/>
        </div>
        <div class="relative z-0 w-full group">
            <label for="nik" class="px-4">NIK</label>
            <input type="text" name="nik" id="nik" class="block py-2.5 px-4 text-sm text-black w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl"  placeholder="NIK" value="{{ $profil->nik }}"/>
        </div>
        <div class="flex relative z-0 w-full group">
            <div class=" mr-16">
                <label for="jenis_kelamin" class="px-4">Jenis Kelamin</label>
                <select class="block py-2.5 px-4 text-sm text-[#72B944] w-[350px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" name="jenis_kelamin" id="jenis_kelamin">
                    <option value="" disabled selected>Jenis Kelamin</option>
                    @foreach ($kelamin as $item)
                      <option value="{{ $item->id }}" {{ $kelaminuser->id == $item->id ? 'selected' : ''}} >{{ $item->nama }}</option>
                    @endforeach
                  </select>
            </div>
            <div class="mr-4">
                <label for="tempat_lahir" class="px-4">Tempat Lahir</label>
                
                <input type="text" name="tempat_lahir" id="tempat" class="block py-2.5 px-4 text-sm text-black w-[150px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl"  placeholder="" value="{{ $profil->tempat_lahir }}"/>
            </div>
            <div>
                <label for="tanggal_lahir" class="px-4">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="block py-2.5 px-4 text-sm text-black w-[200px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl"  placeholder="" value="{{ $profil->tanggal_lahir }}"/>
            </div>
        </div>

        <input type="hidden" name="id" value="{{ $profil->id }}">
        <input type="hidden"name="users_id" value="{{ $userId }}">

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
        
        <button type="submit" class=" mt-2 text-white bg-[#72B944] hover:bg-[#5D9B35] focus:ring-2 focus:outline-none focus:ring-[#72B944] font-medium rounded-full text-[15px] w-full sm:w-auto px-8 py-1.5 text-center">Simpan</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var today = new Date();
        var day = today.getDate();
        var month = today.getMonth() + 1; // Months are zero based
        var year = today.getFullYear();

        if (month < 10) {
            month = '0' + month;
        }
        if (day < 10) {
            day = '0' + day;
        }

        var maxDate = year + '-' + month + '-' + day;
        document.getElementById('tanggal_lahir').setAttribute('max', maxDate);
    });
</script>

<style>
    body{
    background: #72B944;
    }
</style>
@endsection