
    @extends('layout.main')

@section('container')
<div class="bg-[#72B944] flex justify-center h-[140vh]">
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

        <form class="relative bg-[FFFFFF] px-48 mt-4 w-auto flex flex-col space-y-4" method="POST">
        <div class="relative z-0 w-full group">
            <input type="text" name="nik" id="nik" class="block py-2.5 px-4 text-sm text-[#72B944] w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl"  placeholder="NIK" required value="{{ old('nik') }}"/>
        </div>
        <div class="relative z-0 w-full mt-1 group">
            <input type="text" name="nama" id="floating_password" class="block py-2.5 px-4 text-sm text-[#72B944] w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Nama" required />
        </div>
        <div class="inline-flex content-between gap-6">
          <div class="relative z-0 w-full mb-1 group">
              <input type="text" name="alamat" id="floating_first_name" class="block py-2.5 px-4 text-sm text-[#72B944] w-[400px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Alamat Rumah" required />
          </div>
          <div class="relative flex z-0 w-full mb-1 group">
              <input type="text" name="floating_last_name" id="tempat" class="block py-2.5 px-4 text-sm text-[#72B944] w-[110px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Tempat " required />
              <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="block ml-[10px] py-2.5 px-4 text-sm text-[#72B944] w-[245px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Tanggal Lahir" required />
          </div>
        </div>
        <div class="inline-flex content-between grid-cols-2 gap-6">
          <div class="relative z-0 w-full mb-1 group">
              <input type="text" name="jenis" id="floating_phone" class="block py-2.5 px-4 text-sm text-[#72B944] w-[400px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Jenis Kelamin " required /> 
          </div>
          <div class="relative z-0 w-full mb-1 group">
              <input type="text" name="telepon" id="floating_company" class="block py-2.5 px-4 text-sm text-[#72B944] w-[365px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="No. Telp" required />
          </div>
        </div>
        <div class="relative z-0 w-full group">
            <input type="email" name="komoditas" id="floating_email" class="block py-2.5 px-4 text-sm text-[#72B944] w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl"  placeholder="Komoditas " required />
        </div>
        <div class="relative z-0 w-full mt-2 group">
            <input type="password" name="koordinat" id="floating_password" class="block py-2.5 px-4 text-sm text-[#72B944] w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Koordinat Lahan" required />
        </div>
        <div class="inline-flex content-between md:gap-6">
          <div class="relative z-0 w-full group">
              <input id="incre" type="number" name="volume" id="floating_first_name" class="block py-2.5 px-4 text-sm text-[#72B944] w-[400px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Volume Komoditas" value="Volume Komoditas (Kg)" required />
          </div>
          <div class="relative z-0 w-full group">
              <input type="text" name="Luas" id="floating_last_name" class="block py-2.5 px-4 text-sm text-[#72B944] w-[365px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Luas Total" required />
          </div>
        </div>
        <div class="relative z-0 w-full -mt-20 group">
            <input type="text" name="jenis" id="floating_phone" class="block py-2.5 px-4 text-sm text-[#72B944] w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Jenis Kelamin " required /> 
        </div>
        <div class="relative z-0 w-full group">
            <label for="ktp">KTP</label>
            <input type="File" name="ktp" id="ktp" class="block px-4 text-sm text-[#72B944] w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl"  placeholder="Klik Untuk Mengunggah " required />
        </div>
        <div class="relative z-0 w-full mt-1 group">
            <label for="KK">Kartu Keluarga</label>
            <input type="file" name="koordinat" id="KK" class="block px-4 text-sm text-[#72B944] w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Klik Untuk Mengunggah" required />
        </div>
        <div class="relative z-0 w-full -mt-10 group">
            <label for="foto lahan">Foto Lahan (Sertakan Timestamp)</label>
            <input type="file" name="jenis" id="foto lahan" class="block px-4 text-sm text-[#72B944] w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Klik Untuk Mengunggah " required /> 
        </div>
        <div class=" px-80">
            <a href="/register2">
                <button type="submit" class=" mt-2 text-white bg-[#72B944] hover:bg-[#5D9B35] focus:ring-2 focus:outline-none focus:ring-[#72B944] font-medium rounded-full text-[20px] w-full sm:w-auto px-20 py-1.5 text-center">Kirim</button>
            </a>
        </div>
        </form>  

        <script>
            const form = document.querySelector('form')

            form.addEventListener('submit', (e) => {
                e.preventDefault();
                const fd = new FormData(form);
                console.log(fd)
            })

        </script>
    </div>
</div>
@endsection
