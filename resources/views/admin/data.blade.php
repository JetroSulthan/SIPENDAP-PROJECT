@extends('layout.admin')

@section('container')

    <div class="flex flex-col justify-center content-center mx-auto my-auto mt-20 mb-8 bg-red-100 h-auto w-[600px] rounded-[30px]">

        <div class=" mx-auto z-0 w-full group">
            <label for="username" class="px-4">Username</label>
              <input type="text" name="username" id="username" class="block py-2.5 px-4 text-sm text-[#72B944] w-[400px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" value="{{ $users->username }}" required/>

              <label for="username" class="px-4">Nama</label>
              <input type="text" name="username" id="username" class="block py-2.5 px-4 text-sm text-[#72B944] w-[400px] border-[#72B944] focus:border-[#72B944] border-2 rounded-3xl" value="{{ $keltani->nama }}" required/>
        </div>
    </div>
@endsection