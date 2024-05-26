
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
<div class="bg-[#72B944] flex justify-center h-[140vh]">
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

      <div class=" mt-6 font-2xl text-2xl font-semibold font-[Poppins]">
        Data Petani
      </div>
        
        <form class=" bg-[FFFFFF] mt-4 flex flex-col space-y-3" enctype="multipart/form-data">
            {{-- @foreach ($profil as $profil) --}}
            <div class=" z-0 w-full group">
                <p type="text" name="nik" id="nik" class="block py-2.5 px-4 text-sm text-[#72B944] w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl"  placeholder="NIK"\>{{ $profil->nik }}</p>
            </div>
            <div class=" z-0 w-full mt-1 group">
                <p type="text" name="nama_lengkap" id="floating_password" class="block py-2.5 px-4 text-sm text-[#72B944] w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Nama">{{ $profil->nama_lengkap }}</p>
            </div>
            <div class="inline-flex content-between gap-6">
              <div class=" z-0 w-full mb-1 group">
                  <p type="text" name="jalan" id="floating_first_name" class="block py-2.5 px-4 text-sm mb-2 text-[#72B944] w-[400px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Jalan">{{ $profil->jalan }}</p>
                  <p type="text" name="kecamatan" id="floating_first_name" class="block py-2.5 px-4 text-sm text-[#72B944] w-[400px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Kecamatan">{{ $profil->kecamatan }}</p>
                  <p type="text" name="kota" id="floating_first_name" class="block py-2.5 px-4 text-sm mt-2 text-[#72B944] w-[400px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Kota">{{ $profil->kota }}</p>
              </div>
              <div class=" flex z-0 w-full mb-1 group">
                  <p type="text" name="tempat_lahir" id="tempat" class=" text-center block py-2.5 px-4 text-sm text-[#72B944] w-[120px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Tempat Lahir ">{{ $profil->tempat_lahir }}</p>
                  <p type="date" name="tanggal_lahir" id="tanggal_lahir" class=" text-center text-balance   block ml-[10px] py-2.5 px-4 text-sm text-[#72B944] w-[245px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Tanggal Lahir">{{ $profil->tanggal_lahir }}</p>
              </div>
            </div>
            <div class="inline-flex content-between grid-cols-2 gap-6">
              <div class=" z-0 w-full mb-1 group">
                  <p class="block py-2.5 px-4 text-sm text-[#72B944] w-[400px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" name="jenis_kelamin" id="kelurahan">{{ $kelaminuser->nama }}</p>
              </div>
              <div class=" z-0 w-full mb-1 group">
                  <p type="text" name="no_telp" id="floating_company" class="block py-2.5 px-4 text-sm text-[#72B944] w-[375px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="No. Telp">{{ $profil->no_telp }}</p>
              </div>
            </div>
            <div class=" z-0 w-full group">
                <p class="block py-2.5 px-4 text-sm text-[#72B944] w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" name="komoditas" id="kelurahan">{{ $komoditasuser->nama_komoditas }}</p>      
            </div>
            <div class=" z-0 w-full mt-2 group">
                <p type="text" name="titik_koor_lahan" id="floating_password" class="block py-2.5 px-4 text-sm text-[#72B944] w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Koordinat Lahan">{{ $profil->titik_koor_lahan }}</p>
            </div>
            <div class="inline-flex content-between md:gap-6">
            <div class=" z-0 w-full group">
                <p id="text" type="number" name="vol_komoditas" id="floating_first_name" class="block py-2.5 px-4 text-sm text-[#72B944] w-[400px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Volume Komoditas" value="Volume Komoditas (Kg)">{{ $profil->vol_komoditas }}</p>
            </div>
            <div class=" z-0 w-full group">
                <p type="text" name="luas_lahan" id="floating_last_name" class="block py-2.5 px-4 text-sm text-[#72B944] w-[375px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Luas Total">{{ $profil->luas_lahan }}</p>
            </div>
            </div>
            <div class=" z-0 w-full -mt-20 group">
                <p class="block py-2.5 px-4 text-sm text-[#72B944] w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" name="kategori_petanis" id="kelurahan">{{ $kategoriuser->kategori_petani }}
            </div>
            <div class=" z-0 w-full group">
                <label for="ktp">KTP</label>
                <p type="File" name="scan_ktp" id="ktp" class="block px-4 py-2 text-sm text-[#72B944] w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl"  placeholder="Klik Untuk Mengunggah ">{{ $profil->scan_ktp }}</p>
            </div>
            <div class=" z-0 w-full mt-1 group">
                <label for="KK">Kartu Keluarga</label>
                <p type="file" name="scan_kk" id="KK" class="block px-4 py-2 text-sm text-[#72B944] w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Klik Untuk Mengunggah">{{ $profil->scan_kk }}</p>
            </div>
            <div class=" z-0 w-full -mt-10 group">
                <label for="foto lahan">Foto Lahan (Sertakan Timestamp)</label>
                <p type="file" name="foto_lahan" id="foto lahan" class="block px-4 py-2 text-sm text-[#72B944] w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Klik Untuk Mengunggah ">{{ $profil->foto_lahan }}</p> 
            </div>
            <div class="">
              @switch($roleId)
                  @case(2) 
                    <a href="/verifikasi">
                        <button type="button" class=" mt-2 mb-4 text-white bg-[#72B944] hover:bg-[#5D9B35] focus:ring-2 focus:outline-none focus:ring-[#72B944] font-medium rounded-full text-[20px] w-full sm:w-auto px-16 py-1.5 text-center">Kembali</button>
                    </a>
                  @break

                  @case(3)
                    <div class="space-x-96 mx-7">
                      <a href="/verifikasi">
                          <button type="button" class=" mt-2 mb-4 text-white bg-[#72B944] hover:bg-[#5D9B35] focus:ring-2 focus:outline-none focus:ring-[#72B944] font-medium rounded-full text-[15px] w-full sm:w-auto px-16 py-1.5 text-center">Kembali</button>
                      </a>  
                      <a href="/ubahdatapetani/{{ $profil->id }}">
                          <button type="button" class=" mt-2 mb-4 text-white bg-[#72B944] hover:bg-[#5D9B35] focus:ring-2 focus:outline-none focus:ring-[#72B944] font-medium rounded-full text-[15px] w-full sm:w-auto px-16 py-1.5 text-center">Ubah</button>
                      </a>  
                    </div>
                  @break 
              @endswitch
            </div>
        </form>  
        
    </div>
</div>
@endsection
