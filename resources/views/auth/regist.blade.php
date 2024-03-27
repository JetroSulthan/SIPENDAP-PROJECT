
    @extends('layout.main')

@section('container')
<div class="bg-[#72B944] flex justify-center h-screen">
    <div class="flex flex-col relative mx-auto mt-20 bg-white w-[1200px] h-[600px] rounded-[30px] justify-center">
        <div class="-mt-24 flex flex-row items-center justify-center">
            
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
            <div class="ml-52 -mr-72">
                <a href="/register2">
                    <button type="submit" class=" text-white bg-[#72B944] hover:bg-[#5D9B35] focus:ring-2 focus:outline-none focus:ring-[#72B944] font-medium rounded-full text-sm w-full sm:w-auto px-5 py-1.5 text-center">Selanjutnya</button>
                </a>
            </div>
        </div>
        
        <div class="mt-10">
            <h1 class="text-center font-bold text-2xl">Lengkapi Data Diri</h1>
            <p class="text-center">Isi Keterangan Lahanmu dibawah Ini dengan Sesuai!</p>
        </div>

        <form class="relative bg-[FFFFFF] block px-48 mt-4 w-auto justify-center space-y-7">
        <div class="relative z-0 w-full group">
            <input type="email" name="nik" id="floating_email" class="block py-2.5 px-4 text-sm text-[#72B944] w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl"  placeholder="NIK " required />
        </div>
        <div class="relative z-0 w-full mt-2 group">
            <input type="password" name="nama" id="floating_password" class="block py-2.5 px-4 text-sm text-[#72B944] w-[800px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Nama" required />
        </div>
        <div class="inline-flex content-between md:gap-6">
          <div class="relative z-0 w-full mb-5 group">
              <input type="text" name="alamat" id="floating_first_name" class="block py-2.5 px-4 text-sm text-[#72B944] w-[400px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Alamat Rumah" required />
          </div>
          <div class="relative z-0 w-full mb-5 group">
              <input type="text" name="floating_last_name" id="floating_last_name" class="block py-2.5 px-4 text-sm text-[#72B944] w-[380px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Tempat " required />
          </div>
        </div>
        <div class="inline-flex content-between md:grid-cols-2 md:gap-6">
          <div class="relative z-0 w-full mb-5 group">
              <input type="text" name="jenis" id="floating_phone" class="block py-2.5 px-4 text-sm text-[#72B944] w-[400px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Jenis Kelamin " required /> 
          </div>
          <div class="relative z-0 w-full mb-5 group">
              <input type="text" name="telepon" id="floating_company" class="block py-2.5 px-4 text-sm text-[#72B944] w-[380px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="No. Telp" required />
          </div>
        </div>
        
        </form>  
    </div>
</div>
@endsection
