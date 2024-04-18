
@extends('layout.main')

@section('container')
<div class="bg-[#72B944] flex flex-col justify-center h-screen">
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

        <form action="" method="POST" class=" mx-auto  bg-[#72B944] shadow-2xl border-4 border-white focus:ring-lime-300 columns px-7 py-1.5 rounded-2xl w-[500px] h-[400px]">
            @csrf
            <div>
                <h1 class="text-center font-semibold text-2xl">Login</h1>
            </div>
            <div class="mb-5">
            <label for="text" class="block mb-2 text-sm font-medium text-gray-900 px-2"  >Username</label>
            <input type="text" id="username" name="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-lime-500 focus:border-lime-500 block mt-2 rounded-2xl w-full p-2.5" placeholder="Username" required />
            </div>
            <div class="mb-5">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Your password</label>
            <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-lime-500 focus:border-lime-500 block mt-2 rounded-2xl w-full p-2.5" placeholder="*********" required />
            </div>
            <div class="flex flex-col">
                <button type="submit" class="mb-3 text-black bg-white hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-blue-300 font-semibold rounded-lg text-lg w-full sm:w-auto px-5 py-1.5 text-center">Login</button>
                {{-- <a class="relative text-black bg-clear underline focus:bg-sky-600" href="/register">Don't have an account?</a> --}}
            </div>
        </form>
</div>
@endsection



