
@php
    $roleId = Auth::user()->roles_id;
    $layout = '';
    $link = '';

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
<div class="bg-[#72B944] flex justify-center h-[150vh]">
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
    <div class="alert alert-success" role="alert">
      <i class="bi bi-check-circle-fill"> </i>{{ session('success') }}
    </div>
    @endif

    <div class="flex flex-col justify-center space-y-6 items-center absolute top-4 right-48 bg-white w-[900px]  rounded-[30px]">

      <div class=" mt-6 font-2xl text-2xl font-[Poppins]">
        Data Petani
      </div>
        
        <form class=" bg-[FFFFFF] mt-4 flex flex-col space-y-3" enctype="multipart/form-data" action="" method="post">
            @csrf
            @method('PUT')
            <div class=" z-0 w-full group">
                <input type="text" name="nik" id="nik" class="block py-2.5 px-4 text-sm text-[#72B944] w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl"  placeholder="NIK" value="{{ $profil->nik }}"/>
            </div>

            <input type="hidden" name="id" value="{{ $profil->id }}">

            <div class=" z-0 w-full mt-1 group">
                <input type="text" name="nama_lengkap" id="floating_password" class="block py-2.5 px-4 text-sm text-[#72B944] w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Nama" value="{{ $profil->nama_lengkap }}" />
            </div>
            <div class="inline-flex content-between gap-6">
              <div class=" z-0 w-full mb-1 group">
                  <input type="text" name="jalan" id="floating_first_name" class="block py-2.5 px-4 text-sm mb-2 text-[#72B944] w-[400px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Jalan" value="{{ $profil->jalan }}" />
                  <input type="text" name="kecamatan" id="floating_first_name" class="block py-2.5 px-4 text-sm text-[#72B944] w-[400px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Kecamatan" value="{{ $profil->kecamatan }}" />
                  <input type="text" name="kota" id="floating_first_name" class="block py-2.5 px-4 text-sm mt-2 text-[#72B944] w-[400px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Kota" value="{{ $profil->kota }}" />
              </div>
              <div class=" flex z-0 w-full mb-1 group">
                  <input type="text" name="tempat_lahir" id="tempat" class="block py-2.5 px-4 text-sm text-[#72B944] w-[120px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Tempat Lahir " value="{{ $profil->tempat_lahir }}" />
                  <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="block ml-[10px] py-2.5 px-4 text-sm text-[#72B944] w-[245px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Tanggal Lahir" value="{{ $profil->tanggal_lahir }}" />
              </div>
            </div>
            <div class="inline-flex content-between grid-cols-2 gap-6">
              <div class=" z-0 w-full mb-1 group">
                  <select class="block py-2.5 px-4 text-sm text-[#72B944] w-[400px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" name="jenis_kelamin" id="kelurahan">
                      <option value="" disabled selected>Jenis Kelamin</option>
                      @foreach ($kelamin as $item)
                        <option value="{{ $item->id }}" {{ $kelaminuser->id == $item->id ? 'selected' : ''}} >{{ $item->nama }}</option>
                      @endforeach
                    </select>
                  {{-- <input type="text" name="jenis_kelamin" id="floating_phone" class="block py-2.5 px-4 text-sm text-[#72B944] w-[400px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Jenis Kelamin " required />  --}}
              </div>
              <div class=" z-0 w-full mb-1 group">
                  <input type="text" name="no_telp" id="floating_company" class="block py-2.5 px-4 text-sm text-[#72B944] w-[375px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="No. Telp" value="{{ $profil->no_telp }}" />
              </div>
            </div>
            <div class=" z-0 w-full group">
                <select class="block py-2.5 px-4 text-sm text-[#72B944] w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" name="komoditas" id="kelurahan">
                    <option value="" disabled selected>Komoditas</option>
                    @foreach ($komoditas as $item)
                      <option value="{{ $item->id }}" {{ $komoditasuser->id == $item->id ? 'selected' : '' }} >{{ $item->nama_komoditas }}</option>
                    @endforeach
                  </select>
                {{-- <input type="text" name="komoditas" id="floating_email" class="block py-2.5 px-4 text-sm text-[#72B944] w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl"  placeholder="Komoditas " required /> --}}
            </div>
            <div class=" z-0 w-full mt-2 group">
                <input type="text" name="titik_koor_lahan" id="floating_password" class="block py-2.5 px-4 text-sm text-[#72B944] w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Koordinat Lahan" value="{{ $profil->titik_koor_lahan }}" />
            </div>
            <div class="inline-flex content-between md:gap-6">
            <div class=" z-0 w-full group">
                <input id="text" type="number" name="vol_komoditas" id="floating_first_name" class="block py-2.5 px-4 text-sm text-[#72B944] w-[400px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="{{ $profil->vol_komoditas }}" value="" />
            </div>
            <div class=" z-0 w-full group">
                <input type="text" name="luas_lahan" id="floating_last_name" class="block py-2.5 px-4 text-sm text-[#72B944] w-[375px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Luas Total" value="{{ $profil->luas_lahan }}" />
            </div>
            </div>
            <div class=" z-0 w-full -mt-20 group">
                <select class="block py-2.5 px-4 text-sm text-[#72B944] w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" name="kategori_petanis" id="kelurahan">
                    <option value="" disabled selected>Kategori Petani</option>
                    @foreach ($kategori as $item)
                      <option value="{{ $item->id }}" {{ $kategoriuser->id == $item->id ? 'selected':'' }} >{{ $item->kategori_petani }}</option>
                    @endforeach
                  </select>
                {{-- <input type="text" name="kategori_petani" id="floating_phone" class="block py-2.5 px-4 text-sm text-[#72B944] w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Kategori Petani " required />  --}}
            </div>
            <div class=" z-0 w-full group">
                <label for="ktp">KTP</label>
                <input type="File" name="scan_ktp" id="ktp" class="block px-4 text-sm text-[#72B944] w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl"  placeholder="Klik Untuk Mengunggah " value="{{ $profil->scan_ktp }}" />
            </div>
            <div class=" z-0 w-full mt-1 group">
                <label for="KK">Kartu Keluarga</label>
                <input type="file" name="scan_kk" id="KK" class="block px-4 text-sm text-[#72B944] w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Klik Untuk Mengunggah" value="{{ $profil->scan_kk }}" />
            </div>
            <div class=" z-0 w-full -mt-10 group">
                <label for="foto lahan">Foto Lahan (Sertakan Timestamp)</label>
                <input type="file" name="foto_lahan" id="foto lahan" class="block px-4 text-sm text-[#72B944] w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Klik Untuk Mengunggah " value="{{ $profil->foto_lahan }}" /> 
            </div>
            <div class="">
              @switch($roleId)
                  @case(2) 
                    <a href="/verifikasi">
                        <button type="button" class=" mt-2 mb-4 text-white bg-[#72B944] hover:bg-[#5D9B35] focus:ring-2 focus:outline-none focus:ring-[#72B944] font-medium rounded-full text-[20px] w-full sm:w-auto px-16 py-1.5 text-center">Kembali</button>
                    </a>
                  @break

                  @case(3)
                    <a href="/mengubahdatapetanis">
                        <button type="submit" class=" mt-2 mb-4 text-white bg-[#72B944] hover:bg-[#5D9B35] focus:ring-2 focus:outline-none focus:ring-[#72B944] font-medium rounded-full text-[20px] w-full sm:w-auto px-16 py-1.5 text-center">Selesai</button>
                    </a>  
                  @break 
              @endswitch
            </div>
        </form>  
        
    </div>
</div>
@endsection
