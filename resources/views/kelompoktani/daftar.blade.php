
@extends('layout.main')

@section('container')
<div class=" flex h-[180vh]">
    {{-- @if($errors->any())
      <div class="absolute top-20 z-10 alert bg-slate-400">
        <ul>
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif --}}
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle-fill"></i> 
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

    <div class="flex flex-col  items-center mx-auto mt-10 mb-8 bg-white w-[1000px] rounded-[30px]">
        <div class="mt-6">
            <h1 class="text-center font-bold text-2xl">Lengkapi Data Diri</h1>
            <p class="text-center">Isi Keterangan Lahanmu dibawah Ini dengan Sesuai!</p>
        </div>

        <form class="relative bg-[FFFFFF] px-48 mt-4 w-auto flex flex-col space-y-3" enctype="multipart/form-data" action="" method="POST">
        @csrf
        
        <div>
          <div class="relative z-0 w-full group">
              <input type="text" name="nik" id="nik" class="block py-2.5 px-4 text-sm text-[#72B944] w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl"  placeholder="NIK" value="{{ old('nik') }}"/>
              <button id="start" class="absolute top-0 right-0 flex items-center justify-center h-full px-4">
                <i class="fas fa-microphone"></i> 
              </button>
          </div>
          <div>
            @error('nik')
              <div class="text-red-500 text-xs  px-4">
                *{{ $message }}
              </div>
            @enderror
          </div>
        </div>
          <div>
            <div class="relative z-0 w-full mt-1 group">
                <input type="text" name="nama_lengkap" id="nama_lengkap" class="block py-2.5 px-4 text-sm text-[#72B944] w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Nama" value="{{ old('nama_lengkap') }}" />
                <button id="start2" class="absolute top-0 right-0 flex items-center justify-center h-full px-4">
                  <i class="fas fa-microphone"></i> 
                </button>
            </div>
            <div>
              @error('nama_lengkap')
                <div class="text-red-500 text-xs px-4">
                  *{{ $message }}
                </div>
              @enderror
            </div>
          </div>
            <div class="inline-flex content-between gap-6">
              <div class="relative z-0 w-full mb-1 group">
                <div>
                  <input type="text" name="jalan" id="floating_first_name" class="block py-2.5 px-4 text-sm text-[#72B944] w-[400px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Jalan" value="{{ old('jalan') }}"  />
                  @error('jalan')
                    <div class="text-red-500 text-xs  px-4">
                      *{{ $message }}
                    </div>
                  @enderror
                </div>
                <div>
                  <input type="text" name="kecamatan" id="floating_first_name" class="block py-2.5 px-4 text-sm mt-2 text-[#72B944] w-[400px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Kecamatan" value="{{ old('kecamatan') }}"  />
                  @error('kecamatan')
                    <div class="text-red-500 text-xs  px-4">
                      *{{ $message }}
                    </div>
                  @enderror
                </div>
                <div>
                  <input type="text" name="kota" id="floating_first_name" class="block py-2.5 px-4 text-sm mt-2 text-[#72B944] w-[400px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Kota" value="{{ old('kota') }}"  />
                  @error('kota')
                    <div class="text-red-500 text-xs  px-4">
                      *{{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
              <div class="relative flex z-0 w-full mb-1 group">
                  <div>
                    <input type="text" name="tempat_lahir" id="tempat" class="block py-2.5 px-4 text-sm text-[#72B944] w-[120px] h-[140px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Tempat Lahir" value="{{ old('tempat_lahir') }}"  />
                    @error('tempat_lahir')
                      <div class="text-red-500 text-xs  px-4">
                        *{{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="block ml-[10px] py-2.5 px-4 text-sm text-[#72B944] w-[235px] h-[140px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Tanggal Lahir" value="{{ old('tanggal_lahir') }}"  />
                    @error('tanggal_lahir')
                      <div class="text-red-500 text-xs  px-4">
                        *{{ $message }}
                      </div>
                    @enderror
                  </div>
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
                  @error('jenis_kelamin')
                    <div class="text-red-500 text-xs  px-4">
                      *{{ $message }}
                    </div>
                  @enderror                 
              </div>
              <div class="relative z-0 w-full mb-1 group">
                <input type="text" name="no_telp" id="floating_company" class="block py-2.5 px-4 text-sm text-[#72B944] w-[365px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="No. Telp" value="{{ old('no_telp') }}"  />
                @error('no_telp')
                  <div class="text-red-500 text-xs  px-4">
                    *{{ $message }}
                  </div>
                @enderror  
              </div>
            </div>
            <div class="relative z-0 w-full group">
                <select class="block py-2.5 px-4 text-sm text-[#72B944] w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" name="komoditas" id="kelurahan">
                    <option value="" disabled selected>Komoditas</option>
                    @foreach ($komoditas as $item)
                      <option value="{{ $item->id }}" value="{{ $item->id }}" >{{ $item->nama_komoditas }}</option>
                    @endforeach
                </select>
                  @error('komoditas')
                    <div class="text-red-500 text-xs  px-4">
                      *{{ $message }}
                    </div>
                  @enderror
            </div>
            <div class="relative z-0 w-full mt-2 group">
              <input type="text" name="titik_koor_lahan" id="floating_password" class="block py-2.5 px-4 text-sm text-[#72B944] w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Koordinat Lahan" value="{{ old('titik_koor_lahan') }}"  />
              @error('titik_koor_lahan')
                <div class="text-red-500 text-xs  px-4">
                  *{{ $message }}
                </div>
              @enderror  
            </div>
            <div class="inline-flex content-between md:gap-6">
              <div class="relative z-0 w-full group">
                <input id="text" type="number" name="vol_komoditas" min="0" id="floating_first_name" class="block py-2.5 px-4 text-sm text-[#72B944] w-[400px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Volume Komoditas (dalam Kg)" value="{{ old('vol_komoditas') }}"  />
                @error('vol_komoditas')
                  <div class="text-red-500 text-xs  px-4">
                    *{{ $message }}
                  </div>
                @enderror
              </div>
              <div class="relative z-0 w-full group">
                <input type="text" name="luas_lahan" id="floating_last_name" class="block py-2.5 px-4 text-sm text-[#72B944] w-[365px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Luas Total (Dalam Bentuk Hektar)" value="{{ old('luas_lahan') }}"  />
                @error('luas_lahan')
                  <div class="text-red-500 text-xs  px-4">
                    *{{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="relative z-0 w-full -mt-20 group">
                <select class="block py-2.5 px-4 text-sm text-[#72B944] w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" name="kategori_petanis" id="kelurahan">
                    <option value="" disabled selected>Kategori Petani</option>
                    @foreach ($kategoris as $item)
                      <option value="{{ $item->id }}" value="{{ $item->id }}" >{{ $item->kategori_petani }}</option>
                    @endforeach
                  </select>
                  @error('kategori_petanis')
                    <div class="text-red-500 text-xs  px-4">
                      *{{ $message }}
                    </div>
                  @enderror
            </div>
            <div class="relative z-0 w-full group">
                <label for="ktp">KTP</label>
                <input type="file" name="scan_ktp" id="ktp" class="block px-4 text-sm text-[#72B944] w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl"  placeholder="Klik Untuk Mengunggah" value="{{  old('scan_ktp') }}"  />
                @error('scan_ktp')
                  <div class="text-red-500 text-xs  px-4">
                    *{{ $message }}
                  </div>
                @enderror
            </div>
            <div class="relative z-0 w-full mt-1 group">
                <label for="KK">Kartu Keluarga</label>
                <input type="file" name="scan_kk" id="KK" class="block px-4 text-sm text-[#72B944] w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Klik Untuk Mengunggah" value="{{ old('scan_kk') }}"  />
                @error('scan_kk')
                  <div class="text-red-500 text-xs  px-4">
                    *{{ $message }}
                  </div>
                @enderror
            </div>
            <div class="relative z-0 w-full -mt-10 group">
                <label for="foto lahan">Foto Lahan (Sertakan Timestamp)</label>
                <input type="file" name="foto_lahan" id="foto lahan" class="block px-4 text-sm text-[#72B944] w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Klik Untuk Mengunggah" value="{{ old('foto_lahan') }}"  /> 
                @error('foto_lahan')
                  <div class="text-red-500 text-xs  px-4">
                    *{{ $message }}
                  </div>
                @enderror
            </div>
            <div class=" px-80">
                  <button type="submit" class=" mt-2 text-white bg-[#72B944] hover:bg-[#5D9B35] focus:ring-2 focus:outline-none focus:ring-[#72B944] font-medium rounded-full text-[20px] w-full sm:w-auto px-20 py-1.5 text-center">Kirim</button>
            </div>

        
        </form>  
    </div>
</div>

<style>
  body{
    background-image: linear-gradient(#72B944, #ffffff);
    background-attachment: fixed;
  }
</style>

<script>
  const output = document.getElementById('nik');
  const startBtn = document.getElementById('start');
  const startBtn2 = document.getElementById('start2');
  const stopBtn = document.getElementById('stop');
  
  let recognition;
  
  startBtn.addEventListener('click', () => {
    const lang = "id-ID";
    recognition = new webkitSpeechRecognition() || new SpeechRecognition();
    recognition.lang = lang;
    recognition.start();
    recognition.onresult = (event) => {
      const transcript = event.results[0][0].transcript;
      document.getElementById('nik').value = transcript;
    };
  });

  startBtn2.addEventListener('click', () => {
    const lang = "id-ID";
    recognition = new webkitSpeechRecognition() || new SpeechRecognition();
    recognition.lang = lang;
    recognition.start();
    recognition.onresult = (event) => {
      const transcript = event.results[0][0].transcript;
      document.getElementById('nama_lengkap').value = transcript;
    };
  });

  function formatDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2) month = '0' + month;
            if (day.length < 2) day = '0' + day;

            return [year, month, day].join('-');
        }

        // Set the max attribute for the date input
        document.addEventListener('DOMContentLoaded', function() {
            var dateInput = document.getElementById('tanggal_lahir');
            var today = new Date();
            dateInput.max = formatDate(today);
    });

  
  // stopBtn.addEventListener('click', () => {
  //   recognition.stop();
  // });
</script>
@endsection
