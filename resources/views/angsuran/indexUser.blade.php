<title>Angsuran</title>
@extends('layouts.master')
@section('content')
    <div class="">

        <div class="bg-slate-100 py-3 px-5 flex space-x-5 items-center">
            <h1>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M5.25 4.5C4.25544 4.5 3.30161 4.89509 2.59835 5.59835C1.89509 6.30161 1.5 7.25544 1.5 8.25V9H22.5V8.25C22.5 7.25544 22.1049 6.30161 21.4016 5.59835C20.6984 4.89509 19.7446 4.5 18.75 4.5H5.25ZM22.5 10.5H1.5V15.75C1.5 16.7446 1.89509 17.6984 2.59835 18.4017C3.30161 19.1049 4.25544 19.5 5.25 19.5H18.75C19.7446 19.5 20.6984 19.1049 21.4016 18.4017C22.1049 17.6984 22.5 16.7446 22.5 15.75V10.5ZM15.75 15H18.75C18.9489 15 19.1397 15.079 19.2803 15.2197C19.421 15.3603 19.5 15.5511 19.5 15.75C19.5 15.9489 19.421 16.1397 19.2803 16.2803C19.1397 16.421 18.9489 16.5 18.75 16.5H15.75C15.5511 16.5 15.3603 16.421 15.2197 16.2803C15.079 16.1397 15 15.9489 15 15.75C15 15.5511 15.079 15.3603 15.2197 15.2197C15.3603 15.079 15.5511 15 15.75 15Z"
                        fill="black" />
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
                <div class="grid md:grid-cols-2 justify-center   border-b-2 ">
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
                        {{ auth()->user()->anggota->bidang }}
                    </h1>
                </div>

            </div>


            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 bg-[#D9D9D9]">
                    <thead class="text-xs text-gray-700 uppercase bg-[#D9D9D9]  ">
                        <tr class="text-center">
                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
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
                                <td class="px-6 py-4">
                                    {{ 'Rp ' . number_format($item->pinjaman->jumlah_pinjaman, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->pinjaman->jangka_waktu . ' bulan' }}
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
