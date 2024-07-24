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
                <h1>Detail Pinjaman</h1>
            </div>
        </div>

        <div class="lg:w-3/4 w-[90%]  text-black mt-10 py-20 rounded-lg bg-[#C8B6A6] mx-auto">

            <div class="lg:w-1/2  rounded-lg p-5">

                <div class="space-y-5 ">

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
                            {{ \Carbon\Carbon::parse($cicilanPertama)->setTimezone('Asia/Jakarta')->locale('id')->isoFormat(' MMMM YYYY') }}
                        </h1>
                    </div>
                    <div class="grid md:grid-cols-2 justify-center  ">
                        <h1 class="font-semibold">Lampiran</h1>
                        <h1 class="flex md:text-left "><span class="hidden md:block">:</span>
                        <a href="{{$pinjaman->lampiran}}">{{basename($pinjaman->lampiran)}}</a>
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
