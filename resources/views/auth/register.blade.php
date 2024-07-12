<title>Daftar</title>
@extends('layouts.app')
@section('content')
<div class="mx-auto my-auto flex py-20 item-center justify-center font-['Poppins']">
    <div class="mx-auto h-[36rem] bg-white shadow-lg rounded-lg overflow-y-scroll p-10   my-auto justify-center w-3/4">
        <h1 class="text-3xl font-semibold">Daftar</h1>
        <form class="py-10 space-y-5" action="{{route('akun.store')}}" method="POST">
            @csrf
            <input type="text" hidden name="role" value="user" id="">
            <div>
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 ">Nama</label>
                <input type="text" name="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 h-12"
                    placeholder="Ketik nama anggota" required />
            </div>

            <div>
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 ">Username</label>
                <input type="text" name="username"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 h-12"
                    placeholder="Ketik username" required />
            </div>
            <div>
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 ">Email</label>
                <input type="text" name="email"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 h-12"
                    placeholder="Ketik username" required />
            </div>
            <div>
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
                <input type="password" id="first_name" name="password"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 h-12"
                    placeholder="Ketik password" required />
            </div>
            <div>
                <button
                    class="bg-[#8D7B68] text-md font-semibold w-full text-center mx-auto text-white py-3 rounded-lg">Register</button>
            </div>
            <div class="flex justify-between py-5">
                <span class="w-1/3 h-[1px] bg-black"></span>
                <span class="-mt-3 text-xl text-gray-400">ATAU</span>
                <span class="w-1/3 h-[1px] bg-black"></span>
            </div>
            <div class="py-5">
                <h1 class="text-center font-semibold">Sudah punya akun? <a href="/" class="text-red-500">Login</a> </h1>
            </div>
        </form>
    </div>
</div>
@endsection
