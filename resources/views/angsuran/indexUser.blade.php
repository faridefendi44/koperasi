<title>Angsuran</title>
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
                <h1>Angsuran</h1>
            </div>
        </div>
        <div class="lg:px-10">


            <div class=" font-semibold text-center py-5">
                <h1>Riwayat Angsuran</h1>
            </div>
            <div class="space-y-5 w-1/3 py-5">
                <div class="grid md:grid-cols-2 justify-center   border-b-2 ">
                    <h1 class="font-semibold">Nama</h1>
                    <h1 class="flex md:text-left text-center"><span class="hidden md:block mr-5">:</span>
                        {{ auth()->user()->name }}
                    </h1>
                </div>
                <div class="grid md:grid-cols-2 justify-center   border-b-2 ">
                    <h1 class="font-semibold">NIP</h1>
                    <h1 class="flex md:text-left text-center"><span class="hidden md:block mr-5">:</span>
                        {{ auth()->user()->anggota->nip }}
                    </h1>
                </div>
                {{-- <div class="grid md:grid-cols-2 justify-center   border-b-2 ">
                    <h1 class="font-semibold">Pangkat</h1>
                    <h1 class="flex md:text-left text-center"><span class="hidden md:block mr-5">:</span>
                        {{ auth()->user()->anggota->pangkat }}
                    </h1>
                </div>
                <div class="grid md:grid-cols-2 justify-center   border-b-2 ">
                    <h1 class="font-semibold">Jabatan</h1>
                    <h1 class="flex md:text-left text-center"><span class="hidden md:block mr-5">:</span>
                        {{ auth()->user()->anggota->jabatan }}
                    </h1>
                </div>
                <div class="grid md:grid-cols-2 justify-center   border-b-2 ">
                    <h1 class="font-semibold">Bidang</h1>
                    <h1 class="flex md:text-left text-center"><span class="hidden md:block mr-5">:</span>
                        {{ 'Rp ' . number_format(auth()->user()->anggota->simpanan, 0, ',', '.') }}
                    </h1>
                </div> --}}

            </div>


            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 bg-[#D9D9D9]">
                    <thead class="text-xs text-gray-700 uppercase bg-[#D9D9D9]  ">
                        <tr class="text-center">
                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            {{-- <th scope="col" class="px-6 py-3">
                                Nomor Pinjaman
                            </th> --}}
                            {{-- <th scope="col" class="px-6 py-3">
                                Nomor Anggota
                            </th> --}}
                            <th scope="col" class="px-6 py-3">
                                Jumlah Pinjaman
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jangka Waktu
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tanggal Pinjaman
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jumlah Angsuran
                            </th>

                            <th scope="col" class="px-6 py-3">
                                <span class="">Aksi</span>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($angsurans->unique('id_pinjaman') as $item)
                            @php
                                $totalAngsuran = $angsurans
                                    ->where('id_pinjaman', $item->id_pinjaman)
                                    ->sum('total_angsuran');
                            @endphp
                            <tr class="bg-[#D9D9D9] border-b text-center">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $loop->iteration }}
                                </th>
                                {{-- <td class="px-6 py-4">
                                    {{ $item->id_pinjaman }}
                                </td> --}}
                                {{-- <td class="px-6 py-4">
                                    {{ $item->anggota->user->name }}
                                </td> --}}
                                <td class="px-6 py-4">
                                    {{ 'Rp ' . number_format($item->pinjaman->jumlah_pinjaman, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->pinjaman->jangka_waktu .' bulan' }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->pinjaman->tanggal_pinjaman }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ 'Rp ' . number_format($totalAngsuran, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 ">
                                    <div class="flex mx-auto  justify-center">

                                        <a class="px-5 py-2 text-white font-semibold bg-[#908477]"
                                            href="{{ route('angsuran.download', $item->pinjaman->id) }}">Lihat Detail
                                            Angsuran</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

        </div>


    </div>
@endsection
