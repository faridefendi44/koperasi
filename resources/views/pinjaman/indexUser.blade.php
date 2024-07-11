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
