@extends('layouts.master')
@section('content')
    <div class="w-4/5  mx-auto space-y-10">

        <div class="">

            <div class=" text-black mt-10 py-20 rounded-lg mx-auto">
                <div class="lg:w-1/2  rounded-lg p-2">
                    <div class="space-y-3 ">
                        <div class="grid md:grid-cols-2 justify-center  ">
                            <h1 class="font-semibold">Nama Anggota</h1>
                            <h1 class="flex md:text-left text-center"><span class="hidden md:block">: </span>
                                 {{ $pinjamans->anggota->user->name }}
                            </h1>
                        </div>
                        <div class="grid md:grid-cols-2 justify-center  ">
                            <h1 class="font-semibold">Jumlah Pinjaman</h1>
                            <h1 class="flex md:text-left text-center"><span class="hidden md:block">: </span>
                                 {{ 'Rp ' . number_format($pinjamans->jumlah_pinjaman, 0, ',', '.') }}
                            </h1>
                        </div>
                        <div class="grid md:grid-cols-2 justify-center  ">
                            <h1 class="font-semibold">Jangka Waktu</h1>
                            <h1 class="flex md:text-left text-center"><span class="hidden md:block">: </span>
                                {{ $pinjamans->jangka_waktu }}
                            </h1>
                        </div>
                        <div class="grid md:grid-cols-2 justify-center  ">
                            <h1 class="font-semibold">Bulan Pinjaman</h1>
                            <h1 class="flex md:text-left text-center"><span class="hidden md:block">: </span>
                                {{ \Carbon\Carbon::parse($pinjamans->created_at)->setTimezone('Asia/Jakarta')->locale('id')->isoFormat('MMMM YYYY') }}
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-5">
                <h1><strong>Daftar Angsuran</strong></h1>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 bg-[#D9D9D9]">
                    <thead class="text-xs text-gray-700 uppercase bg-[#D9D9D9]  ">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jumlah Sisa
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jumlah Cicilan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Bunga
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Total Angsuran
                            </th>

                            <th scope="col" class="px-6 py-3">
                                <span class="">Keterangan</span>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        {{-- @foreach ($angsurans->unique('id_pinjaman') as $item)
                            @php
                                $totalAngsuran = $angsurans
                                    ->where('id_pinjaman', $item->id_pinjaman)
                                    ->sum('total_angsuran');
                            @endphp
                            <tr class="bg-[#D9D9D9] border-b">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$loop->iteration}}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $item->id_pinjaman }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->anggota->user->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ 'Rp ' . number_format($item->pinjaman->jumlah_pinjaman, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ 'Rp ' . number_format($totalAngsuran, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex space-x-3">
                                        <a href="#" class="font-medium text-blue-600 hover:underline">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 9C11.2044 9 10.4413 9.31607 9.87868 9.87868C9.31607 10.4413 9 11.2044 9 12C9 12.7956 9.31607 13.5587 9.87868 14.1213C10.4413 14.6839 11.2044 15 12 15C12.7956 15 13.5587 14.6839 14.1213 14.1213C14.6839 13.5587 15 12.7956 15 12C15 11.2044 14.6839 10.4413 14.1213 9.87868C13.5587 9.31607 12.7956 9 12 9ZM12 17C10.6739 17 9.40215 16.4732 8.46447 15.5355C7.52678 14.5979 7 13.3261 7 12C7 10.6739 7.52678 9.40215 8.46447 8.46447C9.40215 7.52678 10.6739 7 12 7C13.3261 7 14.5979 7.52678 15.5355 8.46447C16.4732 9.40215 17 10.6739 17 12C17 13.3261 16.4732 14.5979 15.5355 15.5355C14.5979 16.4732 13.3261 17 12 17ZM12 4.5C7 4.5 2.73 7.61 1 12C2.73 16.39 7 19.5 12 19.5C17 19.5 21.27 16.39 23 12C21.27 7.61 17 4.5 12 4.5Z" fill="#9D43BD" />
                                            </svg>
                                        </a>
                                        <a href="#">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15 6.00019L18 9.00019M13 20.0002H21M5 16.0002L4 20.0002L8 19.0002L19.586 7.41419C19.9609 7.03913 20.1716 6.53051 20.1716 6.00019C20.1716 5.46986 19.9609 4.96124 19.586 4.58619L19.414 4.41419C19.0389 4.03924 18.5303 3.82861 18 3.82861C17.4697 3.82861 16.9611 4.03924 16.586 4.41419L5 16.0002Z" stroke="#2B4AED" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                        <a href="#">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6 19C6 19.5304 6.21071 20.0391 6.58579 20.4142C6.96086 20.7893 7.46957 21 8 21H16C16.5304 21 17.0391 20.7893 17.4142 20.4142C17.7893 20.0391 18 19.5304 18 19V7H6V19ZM8 9H16V19H8V9ZM15.5 4L14.5 3H9.5L8.5 4H5V6H19V4H15.5Z" fill="#FB3333" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach --}}
                        @foreach ($pinjamans->angsuran as $angsuran)
                            <tr class="bg-[#D9D9D9] border-b    ">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $loop->iteration }} </th>

                                </th>
                                <td class="px-6 py-4">
                                    {{ 'Rp ' . number_format($angsuran->jumlah_sisa, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ 'Rp ' . number_format($angsuran->angsuran_pokok, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ 'Rp ' . number_format($angsuran->bunga, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ 'Rp ' . number_format($angsuran->total_angsuran, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ \Carbon\Carbon::parse($angsuran->tanggal_angsuran)->locale('id')->isoFormat('MMMM YYYY') }}
                                </td>



                                {{-- <td class="px-6 py-4 text-right">
                                    <div class="flex space-x-3">

                                        <a href="{{ route('pinjaman.show', $item->id) }}"
                                            class="font-medium text-blue-600  hover:underline">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M12 9C11.2044 9 10.4413 9.31607 9.87868 9.87868C9.31607 10.4413 9 11.2044 9 12C9 12.7956 9.31607 13.5587 9.87868 14.1213C10.4413 14.6839 11.2044 15 12 15C12.7956 15 13.5587 14.6839 14.1213 14.1213C14.6839 13.5587 15 12.7956 15 12C15 11.2044 14.6839 10.4413 14.1213 9.87868C13.5587 9.31607 12.7956 9 12 9ZM12 17C10.6739 17 9.40215 16.4732 8.46447 15.5355C7.52678 14.5979 7 13.3261 7 12C7 10.6739 7.52678 9.40215 8.46447 8.46447C9.40215 7.52678 10.6739 7 12 7C13.3261 7 14.5979 7.52678 15.5355 8.46447C16.4732 9.40215 17 10.6739 17 12C17 13.3261 16.4732 14.5979 15.5355 15.5355C14.5979 16.4732 13.3261 17 12 17ZM12 4.5C7 4.5 2.73 7.61 1 12C2.73 16.39 7 19.5 12 19.5C17 19.5 21.27 16.39 23 12C21.27 7.61 17 4.5 12 4.5Z"
                                                    fill="#9D43BD" />
                                            </svg>
                                        </a>
                                        <a href="">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M15 6.00019L18 9.00019M13 20.0002H21M5 16.0002L4 20.0002L8 19.0002L19.586 7.41419C19.9609 7.03913 20.1716 6.53051 20.1716 6.00019C20.1716 5.46986 19.9609 4.96124 19.586 4.58619L19.414 4.41419C19.0389 4.03924 18.5303 3.82861 18 3.82861C17.4697 3.82861 16.9611 4.03924 16.586 4.41419L5 16.0002Z"
                                                    stroke="#2B4AED" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>

                                        </a>
                                        <a href="">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6 19C6 19.5304 6.21071 20.0391 6.58579 20.4142C6.96086 20.7893 7.46957 21 8 21H16C16.5304 21 17.0391 20.7893 17.4142 20.4142C17.7893 20.0391 18 19.5304 18 19V7H6V19ZM8 9H16V19H8V9ZM15.5 4L14.5 3H9.5L8.5 4H5V6H19V4H15.5Z"
                                                    fill="#FB3333" />
                                            </svg>

                                        </a>
                                    </div>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

        </div>
    </div>
@endsection
