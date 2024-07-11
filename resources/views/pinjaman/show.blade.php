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

        <div class="lg:w-3/4 w-[90%]  text-black mt-10 py-20 rounded-lg bg-[#C8B6A6] mx-auto">

            <div class="lg:w-1/2  rounded-lg p-5">

                <div class="space-y-5 ">
                    <div class="grid md:grid-cols-2 justify-center  ">
                        <h1 class="font-semibold">Id Pinjaman</h1>
                        <h1 class="flex md:text-left text-center"><span class="hidden md:block">:</span>
                            {{ $pinjaman->id }}
                        </h1>
                    </div>
                    <div class="grid md:grid-cols-2 justify-center  ">
                        <h1 class="font-semibold">Id Anggota</h1>
                        <h1 class="flex md:text-left text-center"><span class="hidden md:block">:</span>
                            {{ $pinjaman->anggota->id_anggota }}
                        </h1>
                    </div>
                    <div class="grid md:grid-cols-2 justify-center  ">
                        <h1 class="font-semibold">Nama Anggota</h1>
                        <h1 class="flex md:text-left text-center"><span class="hidden md:block">:</span>
                            {{ $pinjaman->anggota->user->name }}
                        </h1>
                    </div>
                    <div class="grid md:grid-cols-2 justify-center  ">
                        <h1 class="font-semibold">Tanggal Pinjaman</h1>
                        <h1 class="flex md:text-left text-center"><span class="hidden md:block">:</span>
                            {{ $pinjaman->tanggal_pinjaman }}
                        </h1>
                    </div>
                    <div class="grid md:grid-cols-2 justify-center  ">
                        <h1 class="font-semibold">Jumlah Pinjaman</h1>
                        <h1 class="flex md:text-left text-center"><span class="hidden md:block">:</span>
                            {{ 'Rp ' . number_format($pinjaman->jumlah_pinjaman, 0, ',', '.') }}
                        </h1>
                    </div>
                    <div class="grid md:grid-cols-2 justify-center  ">
                        <h1 class="font-semibold">Jangka Waktu</h1>
                        <h1 class="flex md:text-left text-center"><span class="hidden md:block">:</span>
                            {{ $pinjaman->jangka_waktu }} bulan
                        </h1>
                    </div>
                    <div class="grid md:grid-cols-2 justify-center  ">
                        <h1 class="font-semibold">Angsuran Pokok</h1>
                        <h1 class="flex md:text-left text-center"><span class="hidden md:block">:</span>
                            {{ 'Rp ' . number_format($angsuranPokok, 0, ',', '.') }}
                        </h1>
                    </div>
                    <div class="grid md:grid-cols-2 justify-center  ">
                        <h1 class="font-semibold">Cicilan Pertama</h1>
                        <h1 class="flex md:text-left text-center"><span class="hidden md:block">:</span>
                            {{ $cicilanPertama }}
                        </h1>
                    </div>
                    <div class="grid md:grid-cols-2 justify-center  ">
                        <h1 class="font-semibold">Bunga Pinjaman</h1>
                        <h1 class="flex md:text-left text-center"><span class="hidden md:block">:</span>
                            {{ 'Rp ' . number_format($bungaPinjaman, 0, ',', '.') }}
                        </h1>
                    </div>
                </div>

            </div>

            <div class="flex space-x-10  w-full mx-auto justify-center ">
                @if ($pinjaman->status == 'pending')
                    <div class="">
                        <button id="reject" data-modal-target="popup-reject-{{ $pinjaman->id }}"
                            data-modal-toggle="popup-reject-{{ $pinjaman->id }}"
                            class="px-5 py-2 bg-[#BF3131] text-white rounded-md">Tolak</button>
                    </div>
                    <div class="">
                        <button id="approve" data-modal-target="popup-approve-{{ $pinjaman->id }}"
                            data-modal-toggle="popup-approve-{{ $pinjaman->id }}"
                            class="px-5 py-2 bg-green-500 text-white rounded-md">Setujui</button>
                    </div>
                @elseif ($pinjaman->status == 'rejected')
                    <div class="">
                        <button disabled class="px-3 py-2 bg-[#BF3131] text-white rounded-md">Telah
                            Ditolak</button>
                    </div>
                @elseif ($pinjaman->status == 'approved')
                    <div class="">
                        <button disabled class="px-3 py-2 bg-green-500 text-white rounded-md">Telah
                            Disetujui</button>
                    </div>
                @endif

                <div id="popup-approve-{{ $pinjaman->id }}" tabindex="-1" aria-labelledby="modal-title"
                    role="dialog" aria-modal="true" id="interestModal"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-80 right-0 left-0 md:left-[35%] z-50 justify-center items-center w-full md:inset-10 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <button type="button"
                                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="popup-approve-{{ $pinjaman->id }}">
                                <svg class="w-5 h-5 closeModal " aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2"
                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="p-4 md:p-5 text-center">
                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2"
                                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Anda
                                    yakin ingin menyetujui
                                    pinjaman ini?</h3>
                                <form action="{{ route('pinjaman.approve', $pinjaman->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button data-modal-hide="popup-modal" type="submit"
                                        class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                        Setujui
                                    </button>
                                    <button data-modal-hide="popup-approve-{{ $pinjaman->id }}"
                                        type="button"
                                        class="closeModal py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                        Batal</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="popup-reject-{{ $pinjaman->id }}" tabindex="-1" aria-labelledby="modal-title"
                    role="dialog" aria-modal="true" id="interestReject"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-80 right-0 left-0 md:left-[35%] z-50 justify-center items-center w-full md:inset-10 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <button type="button"
                                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="popup-reject-{{ $pinjaman->id }}">
                                <svg class="w-5 h-5 closeModal " aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2"
                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="p-4 md:p-5 text-center">
                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2"
                                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah
                                    Anda yakin ingin
                                    menolak anggota ini? </h3>
                                <form action="{{route('pinjaman.reject', $pinjaman->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button data-modal-hide="popup-modal" type="submit"
                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                        Tolak
                                    </button>
                                    <button data-modal-hide="popup-reject-{{ $pinjaman->id }}" type="button"
                                        class="closeModal py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                        Batal</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="popup-delete-{{ $pinjaman->id }}" tabindex="-1" aria-labelledby="modal-title"
                    role="dialog" aria-modal="true" id="interestDelete"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-80 right-0 left-0 md:left-[35%] z-50 justify-center items-center w-full md:inset-10 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <button type="button"
                                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="popup-delete-{{ $pinjaman->id }}">
                                <svg class="w-5 h-5 closeModal " aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2"
                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="p-4 md:p-5 text-center">
                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2"
                                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah
                                    Anda yakin ingin
                                    menghapus user ini? </h3>
                                <form action="" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                        Hapus
                                    </button>
                                    <button data-modal-hide="popup-delete-{{ $pinjaman->id }}" type="button"
                                        class="closeModal py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                        Batal</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
