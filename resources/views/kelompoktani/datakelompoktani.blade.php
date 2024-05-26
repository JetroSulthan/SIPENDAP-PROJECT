
@extends('layout.kelompoktani')

@section('container')

  {{-- @dd($regist); --}}

<div class=" flex justify-center h-[100vh]">
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

    <div class="flex flex-col justify-center items-center relative mt-20 mb-8 bg-white w-[900px] rounded-[30px]">
        <div class="mt-4">
            <h1 class="text-center font-bold text-2xl">Username</h1>
            <p class="text-center"></p>
        </div>

        <form class="relative bg-[FFFFFF] justify-center mt-2 w-auto flex flex-col space-y-3" enctype="multipart/form-data" action="" method="">    
            <div class="relative z-0 w-full group">
              <label for="username" class="px-4">Username</label>
                <input type="text" name="username" id="username" class="block py-2.5 px-4 text-sm text-[#72B944] w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" value="{{ $user->username }}" required/>
            </div>
            
            <div class="mb-3">
              <h1 class="text-center font-bold text-2xl">Data Diri Kelompok Tani</h1>
              <p class="text-center"></p>
            </div>
            <div class="relative z-0 w-full group">
              <label for="nama_lengkap" class="px-5">Nama Lengkap</label>
              <input type="text" name="nama_lengkap" id="nama_lengkap" class="block py-2.5 px-4 text-sm text-[#72B944] w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Nama Lengkap" value="{{ $keltani->nama_lengkap }}" required/>
            </div>
            <div class="relative z-0 w-full group">
              <label for="nik" class="px-5">NIK</label>
              <input type="text" name="nik" id="nik" class="block py-2.5 px-4 text-sm text-[#72B944] w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="NIK" value="{{ $keltani->nik }}" required/>
            </div>
            <div class="inline-flex ">
              <div class="relative z-0 w-full mb-1 group">
                <label for="jalan" class="px-5">Alamat</label>
                  <input type="text" name="jalan" id="floating_first_name" class="block py-2.5 px-4 text-sm mb-2 text-[#72B944] w-[400px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Jalan" value="{{ implode(' ', [$keltani->jalan, $keltani->kecamatan, $keltani->kota]) }}" required />
              </div>
              <div class="relative flex z-0 ml-5 w-full mb-1 group">
                <div class="flex flex-col">
                  <label for="tempat_lahir" class="px-3">Tempat Lahir</label>
                  <input type="text" name="tempat_lahir" id="tempat" class="block py-2.5 px-4 text-sm text-[#72B944] w-[135px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Tempat Lahir" value="{{ $keltani->tempat_lahir }}" required />
                </div>
                <div class="flex flex-col">
                  <label for="tanggal_lahir" class="px-6">Tanggal Lahir</label>
                  <p type="date" name="tanggal_lahir" id="tanggal_lahir" class="block ml-[10px] py-2.5 px-4 text-sm text-[#72B944] w-[235px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Tanggal Lahir">{{ $keltani->tanggal_lahir }}</p>
                </div>
              </div>
            </div>

            
            {{-- <div class="relative z-0 w-full mb-1 group">
                <select class="block py-2.5 px-4 text-sm text-[#72B944] w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" name="jenis_kelamin" id="kelurahan">
                    <option value="" disabled selected>Jenis Kelamin</option>
                    @foreach ($jenis_kelamins as $item)
                      <option value="{{ $item->id }}" >{{ $item->nama }}</option>
                    @endforeach
                </select> --}}
                {{-- <input type="text" name="jenis_kelamin" id="floating_phone" class="block py-2.5 px-4 text-sm text-[#72B944] w-[400px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Jenis Kelamin " required />  --}}
            {{-- </div> --}}
          </form>  
          {{-- <div class="mx-auto">
            <a href="/ubah-akun" class=" mt-2 text-white bg-[#72B944] hover:bg-[#5D9B35] focus:ring-2 focus:outline-none focus:ring-[#72B944] font-medium rounded-full text-[20px] w-full sm:w-auto px-20 py-1.5 text-center">Ubah
            </a>
          </div> --}}
    </div>
</div>

<style>
  body{
    background-image: url('img/sawah.jpg');
    background-size: cover; /* Menutup seluruh bagian body */
    background-position: center; /* Pusatkan gambar */
    background-repeat: no-repeat;
  }
</style>
@endsection
