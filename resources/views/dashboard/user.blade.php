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
                <h1>Beranda</h1>
            </div>
        </div>

        <div class="lg:w-5/6 text-black mt-10 p-5 bg-[#C8B6A6] mx-auto">
            <h1 class="text-xl font-bold text-center">Silakan isi form dibawah ini untuk mendaftarkan diri sebagai Anggota
                Koperasi</h1>
            <form class="lg:w-4/5 justify-center mx-auto space-y-6 mt-10" action="{{ route('member.store') }}"
                method="POST">
                @csrf
                <div class="flex justify-around space-x-10">
                    <label for="first_name" class="w-36 font-semibold block mt-3 text-sm text-gray-900 ">Nama
                        Anggota</label>
                    <input disabled type="text" value="{{ auth()->user()->name }}" id="nama_anggota"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 h-12"
                        placeholder="Ketik nama anggota" required />
                </div>
                <div class="flex justify-around space-x-10">
                    <label for="first_name" class="w-36 font-semibold block mt-3 text-sm text-gray-900 ">No. WA</label>
                    <input type="number" name="no_wa"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 h-12"
                        placeholder="Ketik nama anggota" required />
                </div>
                <div class="flex justify-around space-x-10">
                    <label for="first_name" class="w-36 font-semibold block mt-3 text-sm text-gray-900 ">NIP</label>
                    <input name="nip" type="text" id="nip"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 h-12"
                        placeholder="Ketik nip anggota" required />
                </div>
                <div class="flex justify-around space-x-10">
                    <label for="first_name" class="w-36 font-semibold block mt-3 text-sm text-gray-900 ">Golongan</label>
                    <input name="golongan" type="text" id="golongan"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 h-12"
                        placeholder="Ketik golongan anggota" required />
                </div>
                <div class="flex justify-around space-x-10">
                    <label for="first_name" class="w-36 font-semibold block mt-3 text-sm text-gray-900 ">Bidang</label>
                    <input name="bidang" type="text" id="bidang"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 h-12"
                        placeholder="Ketik bidang anggota" required />
                </div>
                <div class="flex justify-around space-x-10">
                    <label for="first_name" class="w-36 font-semibold block mt-3 text-sm text-gray-900 ">Pangkat</label>
                    <input name="pangkat" type="text" id="bidang"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 h-12"
                        placeholder="Ketik pangkat anggota" required />
                </div>
                <div class="flex justify-around space-x-10">
                    <label for="first_name" class="w-36 font-semibold block mt-3 text-sm text-gray-900 ">Jabatan</label>
                    <input name="jabatan" type="text" id="bidang"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 h-12"
                        placeholder="Ketik jabatan anggota" required />
                </div>
                <div class="flex justify-around space-x-10">
                    <label for="first_name" class="w-36 font-semibold block mt-3 text-sm text-gray-900 ">Gaji</label>
                    <input name="gaji" type="number" id="gaji"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 h-12"
                        placeholder="Ketik gaji anggota" required />
                </div>

                <div class="flex justify-around space-x-10">
                    <label for="first_name" class="w-36 font-semibold block mt-3 text-sm text-gray-900 ">Alamat</label>
                    <input name="alamat" type="text" id="alamat"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 h-12"
                        placeholder="Ketik alamat anggota" required />
                </div>

                <h1>** Simpanan Pokok yang wajib Anda bayarkan saat bergabung menjadi anggota koperasi sebesar Rp 50.000,-
                </h1>

                <div>
                    <button
                        class="bg-[#A98F03] flex space-x-3 text-md font-semibold w-fit text-center   py-3 px-5 rounded-lg">

                        <span class="text-white">
                            Daftar Anggota Koperasi
                        </span>
                    </button>
                </div>

            </form>
        </div>

    </div>
@endsection
