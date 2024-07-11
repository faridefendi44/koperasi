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

        <div class="lg:w-5/6 w-[90%]  text-black mt-10 py-20 rounded-lg bg-[#C8B6A6] mx-auto">
            <h1 class="text-xl font-bold text-center">
                @if (auth()->user()->anggota && auth()->user()->anggota->status == 'proses')
                    Terimakasih, permintaan Anda telah terkirim dan akan dilakukan
                    verifikasi terlebih dahulu oleh Admin.
                    @else
                   Status keanggotaan anda telah di verifikasi
                @endif

            </h1>
            @if (auth()->user()->anggota && auth()->user()->anggota->status == 'proses')
                <a href="" class="bg-[#A98F03] px-10 rounded-lg py-3 text-white mx-auto flex w-fit">Oke</a>
            @endif

        </div>

    </div>
@endsection
