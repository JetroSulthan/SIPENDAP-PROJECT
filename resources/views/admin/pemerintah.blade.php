@extends('layout.admin')

@section('container')
    <div class="flex flex-col mx-96 absolute top-36 bg-white w-[65vw] h-[40vw] rounded-[30px]">
        <div class="flex flex-col items-center justify-center">
            <p class="text-3xl font-bold mt-5 mb-10">Daftar Akun Pemerintah</p>
            <table class=" cursor-pointer text-left rounded-xl w-[60vw] text-sm">
                <thead class="rounded-xl">
                    <tr class="text-gray-700 rounded-2xl bg-gray-200">
                        <th class="px-2 py-2 font-xl">
                            Nama Lengkap
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($keltani as $item)
                    <tr>
                            <td class="px-4 py-4 border-b-2">
                                <a href="/pemerintah/{{ $item->id }}">
                                    <div>{{ $item->nama_lengkap }}</div>
                                </a>
                            </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <a href="/daftar/pemerintah" class="px-4 py-1.5 relative bg-[#72B944] w-24 text-center rounded-xl mt-3  text-white">Tambah</a>
        </div>
    </div>


<style>
    body{
    background: #72B944;
    }
</style>
@endsection