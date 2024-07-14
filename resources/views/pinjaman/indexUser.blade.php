@extends('layouts.master')
@section('content')
    <div class="">

        <div class="bg-slate-100 py-3 px-5 flex space-x-5 items-center">
            <h1>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M11.25 6H9C7.114 6 6.172 6 5.586 6.586C5 7.172 5 8.114 5 10V16.25H19V10C19 8.114 19 7.172 18.414 6.586C17.828 6 16.886 6 15 6H12.75V10.973L13.43 10.179C13.4941 10.1041 13.5723 10.0426 13.6601 9.99802C13.748 9.95339 13.8438 9.9265 13.942 9.91888C14.0403 9.91127 14.139 9.92308 14.2327 9.95364C14.3264 9.9842 14.4131 10.0329 14.488 10.097C14.5629 10.1611 14.6244 10.2393 14.669 10.3271C14.7136 10.415 14.7405 10.5108 14.7481 10.609C14.7557 10.7073 14.7439 10.806 14.7134 10.8997C14.6828 10.9934 14.6341 11.0801 14.57 11.155L12.57 13.488C12.4996 13.5703 12.4122 13.6364 12.3138 13.6818C12.2154 13.7271 12.1083 13.7506 12 13.7506C11.8917 13.7506 11.7846 13.7271 11.6862 13.6818C11.5878 13.6364 11.5004 13.5703 11.43 13.488L9.43 11.155C9.36592 11.0801 9.3172 10.9934 9.28664 10.8997C9.25608 10.806 9.24427 10.7073 9.25188 10.609C9.2595 10.5108 9.28639 10.415 9.33102 10.3271C9.37565 10.2393 9.43715 10.1611 9.512 10.097C9.58685 10.0329 9.6736 9.9842 9.76728 9.95364C9.86096 9.92308 9.95974 9.91127 10.058 9.91888C10.1562 9.9265 10.252 9.95339 10.3399 9.99802C10.4277 10.0426 10.5059 10.1041 10.57 10.179L11.25 10.973V6ZM5.03 17.75H18.97C18.918 18.54 18.781 19.047 18.414 19.414C17.828 20 16.886 20 15 20H9C7.114 20 6.172 20 5.586 19.414C5.219 19.047 5.081 18.541 5.03 17.75Z"
                        fill="black" />
                    <path
                        d="M5.88899 3H18.11C20.26 3 22 4.8 22 7.02C22 8.31 21.413 9.457 20.5 10.193V9.911C20.5 9.045 20.5 8.251 20.413 7.606C20.318 6.895 20.093 6.143 19.475 5.526C18.857 4.907 18.105 4.682 17.395 4.586C16.749 4.5 15.955 4.5 15.089 4.5H8.90999C8.04499 4.5 7.25099 4.5 6.60599 4.587C5.89499 4.682 5.14299 4.907 4.52599 5.525C3.90699 6.143 3.68199 6.895 3.58599 7.605C3.49999 8.251 3.49999 9.045 3.49999 9.911V10.193C3.0287 9.80986 2.6493 9.32593 2.38971 8.77682C2.13012 8.2277 1.99695 7.62737 1.99999 7.02C1.99999 4.8 3.74099 3 5.88899 3Z"
                        fill="black" />
                </svg>
            </h1>
            <div class="">
                <h1>Pinjaman</h1>
            </div>
        </div>
        <div class="lg:px-10">
            <div class="">
                <div class="lg:flex  lg:space-x-10 justify-center py-10 px-2 mx-auto  ">

                    <div class="bg-[#EAD196] lg:w-1/2 rounded-lg p-5">
                        <h1 class="text-lg font-semibold">Pinjaman</h1>
                        <div class="h-1 w-1/2 bg-[#A98F03]"></div>
                        <div class="lg:flex py-5 items-center text-lg lg:space-x-5 justify-between">
                            <h1>
                                Pengajuan Pinjaman
                            </h1>
                            <button class="px-2 py-3 bg-[#ebca7d] rounded-lg toggleButton">
                                Selengkapnya
                            </button>
                        </div>
                        <div class="pl-10 text-justify hidden">
                            <p>
                                Dengan Wesbite ini, Anda dapat melakukan pengajuan pinjaman dana ke koperasi.

                            </p>
                        </div>
                        <div class="py-5">
                            <a href="{{ route('pinjaman.create') }} "
                                class="bg-[#7D0A0A] w-fit text-white rounded-lg mx-auto flex px-5 py-2">
                                Klik disini pengajuan pinjaman
                            </a>
                        </div>
                    </div>

                </div>
            </div>

            <div class=" font-semibold text-center py-5">
                <h1>Riwayat Pinjaman</h1>
            </div>
            <div class="space-y-5 w-1/3 py-5">
                <div class="grid md:grid-cols-2 justify-center   border-b-2 ">
                    <h1 class="font-semibold">Nama</h1>
                    <h1 class="flex md:text-left text-center"><span class="hidden md:block mr-5">:</span>
                        {{ auth()->user()->name }}
                    </h1>
                </div>
                <div class="grid md:grid-cols-2 justify-center   border-b-2 ">
                    <h1 class="font-semibold">Nip</h1>
                    <h1 class="flex md:text-left text-center"><span class="hidden md:block mr-5">:</span>
                        {{ auth()->user()->anggota->nip }}
                    </h1>
                </div>
                <div class="grid md:grid-cols-2 justify-center   border-b-2 ">
                    <h1 class="font-semibold">Bidang</h1>
                    <h1 class="flex md:text-left text-center"><span class="hidden md:block mr-5">:</span>
                        {{ auth()->user()->anggota->bidang }}
                    </h1>
                </div>
                <div class="grid md:grid-cols-2 justify-center   border-b-2 ">
                    <h1 class="font-semibold">Golongan</h1>
                    <h1 class="flex md:text-left text-center"><span class="hidden md:block mr-5">:</span>
                        {{ auth()->user()->anggota->golongan }}
                    </h1>
                </div>
                <div class="grid md:grid-cols-2 justify-center   border-b-2 ">
                    <h1 class="font-semibold">Jumlah Gaji</h1>
                    <h1 class="flex md:text-left text-center"><span class="hidden md:block mr-5">:</span>
                        {{ 'Rp ' . number_format(auth()->user()->anggota->gaji, 0, ',', '.') }}
                    </h1>
                </div>

            </div>


            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 bg-[#D9D9D9]">
                    <thead class="text-xs text-gray-700 uppercase bg-[#D9D9D9]  ">
                        <tr>

                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Besar Pinjaman
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jangka Waktu
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tanggal Pinjaman
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="">Status</span>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($pinjamans as $item)
                            <tr class="bg-[#D9D9D9] border-b    ">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $loop->iteration + ($pinjamans->currentPage() - 1) * $pinjamans->perPage() }} </th>

                                </th>
                                <td class="px-6 py-4">
                                    {{ 'Rp ' . number_format($item->jumlah_pinjaman, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->jangka_waktu }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->tanggal_pinjaman }}
                                </td>
                                <td class="px-6 py-4">
                                    @if ($item->status == 'pending')
                                        <h1>Sedang diproses</h1>
                                    @elseif($item->status == 'approved')
                                        <h1>Disetujui</h1>
                                    @elseif($item->status == 'rejected')
                                        <h1>Tidak Disetujui</h1>
                                    @elseif($item->status == 'lunas')
                                        <h1>Sudah Lunas</h1>
                                    @elseif($item->status == 'belum')
                                        <h1>Belum Lunas</h1>
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>


    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var buttons = document.querySelectorAll('.toggleButton');
            buttons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var description = this.closest('div').nextElementSibling;
                    if (description.classList.contains('hidden')) {
                        description.classList.remove('hidden');
                    } else {
                        description.classList.add('hidden');
                    }
                });
            });
        });
    </script>
@endsection
