
@extends('layout.main')

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

    <div class="flex flex-col justify-center items-center relative mx-auto mt-20 mb-8 bg-white w-[1000px]  rounded-[30px]">
        {{-- <div class="mt-7 flex flex-row items-center justify-center">
            
            <div class="flex flex-row gap-1 items-center">
                <p class="rounded-full bg-[#72B944] w-6 h-6 text-center">1</p>
                <div class="ml-2 mr-2 w-20 bg-gray-200 rounded-full h-3">
                    <div class="bg-[#72B944] h-3 rounded-full" style="width: 50%"></div>
                  </div>
                <p class="rounded-full bg-gray-300 w-6 h-6 text-center">2</p>
                <div class="ml-2 mr-2 w-20 bg-gray-200 rounded-full h-3">
                    <div class=" h-3 rounded-full " style="width: 50%"></div>
                  </div>
                <p class="rounded-full bg-gray-300 w-6 h-6 text-center">3</p>
                <div class="ml-2 mr-2 w-20 bg-gray-200 rounded-full h-3">
                    <div class=" h-3 rounded-full " style="width: 50%"></div>
                  </div>
                <p class="rounded-full bg-gray-300 w-6 h-6 text-center">4</p>
            </div>
            
        </div> --}}
        
        <div class="mt-6">
            <h1 class="text-center font-bold text-2xl">Lengkapi Data Diri</h1>
            <p class="text-center">Isi Keterangan Lahanmu dibawah Ini dengan Sesuai!</p>
        </div>

        <form class="relative bg-[FFFFFF] px-48 mt-4 w-auto flex flex-col space-y-3" enctype="multipart/form-data" action="" method="POST">
        @csrf    
            <div class="relative z-0 w-full group">
                <input type="text" name="nik" id="nik" class="block py-2.5 px-4 text-sm text-[#72B944] w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl"  placeholder="NIK" required value="{{ old('nik') }}"/>
            </div>
            <div class="relative z-0 w-full mt-1 group">
                <input type="text" name="nama_lengkap" id="floating_password" class="block py-2.5 px-4 text-sm text-[#72B944] w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Nama" required />
            </div>
            <div class="inline-flex content-between gap-6">
            <div class="relative z-0 w-full mb-1 group">
                <input type="text" name="jalan" id="floating_first_name" class="block py-2.5 px-4 text-sm mb-2 text-[#72B944] w-[400px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Jalan" required />
                <input type="text" name="kecamatan" id="floating_first_name" class="block py-2.5 px-4 text-sm text-[#72B944] w-[400px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Kecamatan" required />
                <input type="text" name="kota" id="floating_first_name" class="block py-2.5 px-4 text-sm mt-2 text-[#72B944] w-[400px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Kota" required />
            </div>
            <div class="relative flex z-0 w-full mb-1 group">
                <input type="text" name="tempat_lahir" id="tempat" class="block py-2.5 px-4 text-sm text-[#72B944] w-[120px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Tempat Lahir " required />
                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="block ml-[10px] py-2.5 px-4 text-sm text-[#72B944] w-[235px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Tanggal Lahir" required />
            </div>
            </div>
            <div class="inline-flex content-between grid-cols-2 gap-6">
            <div class="relative z-0 w-full mb-1 group">
                <select class="block py-2.5 px-4 text-sm text-[#72B944] w-[400px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" name="jenis_kelamin" id="kelurahan">
                    <option value="" disabled selected>Jenis Kelamin</option>
                    @foreach ($jenis_kelamins as $item)
                      <option value="{{ $item->id }}" value="{{ $item->id }}" >{{ $item->nama }}</option>
                    @endforeach
                  </select>
                {{-- <input type="text" name="jenis_kelamin" id="floating_phone" class="block py-2.5 px-4 text-sm text-[#72B944] w-[400px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Jenis Kelamin " required />  --}}
            </div>
            <div class="relative z-0 w-full mb-1 group">
                <input type="text" name="no_telp" id="floating_company" class="block py-2.5 px-4 text-sm text-[#72B944] w-[365px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="No. Telp" required />
            </div>
            </div>
            <div class="relative z-0 w-full group">
                <select class="block py-2.5 px-4 text-sm text-[#72B944] w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" name="komoditas" id="kelurahan">
                    <option value="" disabled selected>Komoditas</option>
                    @foreach ($komoditas as $item)
                      <option value="{{ $item->id }}" value="{{ $item->id }}" >{{ $item->nama_komoditas }}</option>
                    @endforeach
                  </select>
                {{-- <input type="text" name="komoditas" id="floating_email" class="block py-2.5 px-4 text-sm text-[#72B944] w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl"  placeholder="Komoditas " required /> --}}
            </div>
            <div class="relative z-0 w-full mt-2 group">
                <input type="text" name="titik_koor_lahan" id="floating_password" class="block py-2.5 px-4 text-sm text-[#72B944] w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Koordinat Lahan" required />
            </div>
            <div class="inline-flex content-between md:gap-6">
            <div class="relative z-0 w-full group">
                <input id="text" type="number" name="vol_komoditas" id="floating_first_name" class="block py-2.5 px-4 text-sm text-[#72B944] w-[400px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Volume Komoditas" value="Volume Komoditas (Kg)" required />
            </div>
            <div class="relative z-0 w-full group">
                <input type="text" name="luas_lahan" id="floating_last_name" class="block py-2.5 px-4 text-sm text-[#72B944] w-[365px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Luas Total" required />
            </div>
            </div>
            <div class="relative z-0 w-full -mt-20 group">
                <select class="block py-2.5 px-4 text-sm text-[#72B944] w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" name="kategori_petanis" id="kelurahan">
                    <option value="" disabled selected>Kategori Petani</option>
                    @foreach ($kategoris as $item)
                      <option value="{{ $item->id }}" value="{{ $item->id }}" >{{ $item->kategori_petani }}</option>
                    @endforeach
                  </select>
                {{-- <input type="text" name="kategori_petani" id="floating_phone" class="block py-2.5 px-4 text-sm text-[#72B944] w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Kategori Petani " required />  --}}
            </div>
            <div class="relative z-0 w-full group">
                <label for="ktp">KTP</label>
                <input type="File" name="scan_ktp" id="ktp" class="block px-4 text-sm text-[#72B944] w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl"  placeholder="Klik Untuk Mengunggah " required />
            </div>
            <div class="relative z-0 w-full mt-1 group">
                <label for="KK">Kartu Keluarga</label>
                <input type="file" name="scan_kk" id="KK" class="block px-4 text-sm text-[#72B944] w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Klik Untuk Mengunggah" required />
            </div>
            <div class="relative z-0 w-full -mt-10 group">
                <label for="foto lahan">Foto Lahan (Sertakan Timestamp)</label>
                <input type="file" name="foto_lahan" id="foto lahan" class="block px-4 text-sm text-[#72B944] w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Klik Untuk Mengunggah " required /> 
            </div>
            <div class=" px-80">
                    <button type="submit" class=" mt-2 text-white bg-[#72B944] hover:bg-[#5D9B35] focus:ring-2 focus:outline-none focus:ring-[#72B944] font-medium rounded-full text-[20px] w-full sm:w-auto px-20 py-1.5 text-center">Kirim</button>
            </div>
        </form>  
    </div>
</div>
@endsection
