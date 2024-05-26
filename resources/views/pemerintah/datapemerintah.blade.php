
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

      <div class="flex flex-col justify-center items-center mx-auto relative mt-20 mb-8 bg-white w-[600px] rounded-[30px]">
          <div class="mt-4">
              <h1 class="text-center font-bold text-2xl">Username</h1>
          </div>
          <form class="relative bg-[FFFFFF] justify-center items-center mt-2 w-auto mx-auto flex flex-col space-y-3">
            <div>
              <div class="relative z-0 w-full group">
                  <label for="username" class="px-4">Username</label>
                  @switch($roleId)
                    @case(1)
                      <div type="text" name="username" id="username" class="flex py-2.5 px-4 text-sm text-[#72B944] w-[500px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl">{{ $users->username }}</div>
                      @break
                    @case(2)
                      <div type="text" name="username" id="username" class="flex py-2.5 px-4 text-sm text-[#72B944] w-[500px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl">{{ $user->username }}</div>
                      @break    
                  @endswitch
                  
              </div>
            </div>

            <div>
              <div class="mb-3">
                  <h1 class="text-center font-bold text-2xl">Data Diri Pemerintah</h1>
              </div>
              <div class="relative z-0 w-full group">
                  <label for="nama_lengkap" class="px-4">Nama Lengkap</label>
                  <div type="text" name="nama_lengkap" id="nama_lengkap" class="block py-2.5 px-4 text-sm text-[#72B944] w-[500px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Nama Lengkap">{{ $keltani->nama_lengkap }}</div>
              </div>
              <div class="relative z-0 w-full group">
                  <label for="nip" class="px-4">NIP</label>
                  <div type="text" name="nip" id="nip" class="block py-2.5 px-4 text-sm text-[#72B944] w-[500px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="NIP">{{ $keltani->nip }}</div>
              </div>
              <div class="relative z-0 w-full group">
                  <label for="nomor_sk" class="px-4">Nomor SK</label>
                  <div type="text" name="nomor_sk" id="nomor_sk" class="block py-2.5 px-4 text-sm text-[#72B944] w-[500px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" placeholder="Nomor SK">{{ $keltani->nomor_sk }}</div>
              </div>
            </div> 

          </form>  

          <div class=" px-80">
            @switch($roleId)
                @case(1)
                      {{-- <a href="/editdatapemerintah">
                        <button class=" mt-5 text-white bg-[#72B944] hover:bg-[#5D9B35] focus:ring-2 focus:outline-none focus:ring-[#72B944] font-medium rounded-full text-[20px] w-full sm:w-auto px-20 py-1.5 text-center">Ubah</button>
                      </a>     --}}
                    @break
                @case(2)
                      <a href="/ubahdatapemerintah">
                        <button class=" mt-5 text-white bg-[#72B944] hover:bg-[#5D9B35] focus:ring-2 focus:outline-none focus:ring-[#72B944] font-medium rounded-full text-[20px] w-full sm:w-auto px-20 py-1.5 text-center">Ubah</button>
                      </a>
                    @break
            @endswitch
          </div>
      </div>
  </div>

  <style>
    body{
      background-image: linear-gradient(#72B944, #FFFFFF)
    }
  </style>
@endsection
