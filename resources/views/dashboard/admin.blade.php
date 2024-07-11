@extends('layouts.master')
@section('content')
    <div class="">
        <div class="bg-slate-100 py-3 px-5 flex space-x-5 items-center">
            <h1>
                <svg class="" width="25" height="25" viewBox="0 0 35 35" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M13.125 32.0834V17.5H21.875V32.0834M4.375 13.125L17.5 2.91669L30.625 13.125V29.1667C30.625 29.9402 30.3177 30.6821 29.7707 31.2291C29.2237 31.7761 28.4819 32.0834 27.7083 32.0834H7.29167C6.51812 32.0834 5.77625 31.7761 5.22927 31.2291C4.68229 30.6821 4.375 29.9402 4.375 29.1667V13.125Z"
                        stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </h1>
            <div class="">
                <h1>Beranda Admin</h1>
            </div>

        </div>
        <div class="lg:w-3/4 mx-auto justify-center py-10 flex space-x-10">

            <div class="w-2/5 h-60 bg-[#EAD196] p-5 font-semibold rounded-lg">
                <h1>Data Peminjaman</h1>
                <div class="">
                    <div class="w-full h-[1px] bg-black"></div>
                    <div class="flex space-x-10 mt-8">
                        <h1>{{$peminjam}}</h1>
                        <h1>Peminjam</h1>
                    </div>
                    <div class="flex space-x-10 mt-2">
                        <h1>{{$lunas}}</h1>
                        <h1>Sudah Lunas</h1>
                    </div>
                    <div class="flex space-x-10 mt-2">
                        <h1>{{$belumLunas}}</h1>
                        <h1>Belum Lunas</h1>
                    </div>
                </div>
            </div>
            <div class="w-2/5 h-60 bg-[#EAD196] p-5 font-semibold rounded-lg">
                <h1>Simpanan</h1>
                <div class="">
                    <div class="w-full h-[1px] bg-black"></div>
                </div>
            </div>
        </div>

        <div class="lg:w-3/4 mx-auto justify-center py-10 flex space-x-10">

            <div class="w-2/5 h-60 bg-[#EAD196] p-5 font-semibold rounded-lg">
                <h1>Data Pengguna</h1>
                <div class="">
                    <div class="w-full h-[1px] bg-black"></div>
                    <div class="flex space-x-10 mt-8">
                        <h1>{{$pengguna}}</h1>
                        <h1>Pengguna</h1>
                    </div>
                </div>
            </div>
            <div class="w-2/5 h-60 bg-[#EAD196] p-5 font-semibold rounded-lg">
                <h1>Data Anggota Koperasi</h1>
                <div class="">
                    <div class="w-full h-[1px] bg-black"></div>
                    <div class="flex space-x-10 mt-8">
                        <h1>{{$anggota}}</h1>
                        <h1>Anggota</h1>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
