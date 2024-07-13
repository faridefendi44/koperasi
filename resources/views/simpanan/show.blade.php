<title>Simpanan</title>
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
                <h1>Simpanan Anggota</h1>
            </div>
        </div>
        <div class="lg:px-10">


            <div class=" font-semibold text-center py-5">
                <h1>Data Simpanan</h1>
            </div>
            <div class="space-y-5 w-1/3 py-5">
                <div class="grid md:grid-cols-2 justify-center   border-b-2 ">
                    <h1 class="font-semibold">Nama</h1>
                    <h1 class="flex md:text-left text-center"><span class="hidden md:block mr-5">:</span>
                        {{ $anggota->user->name }}
                    </h1>
                </div>
                <div class="grid md:grid-cols-2 justify-center   border-b-2 ">
                    <h1 class="font-semibold">NIP</h1>
                    <h1 class="flex md:text-left text-center"><span class="hidden md:block mr-5">:</span>
                        {{ $anggota->nip }}
                    </h1>
                </div>
                <div class="grid md:grid-cols-2 justify-center   border-b-2 ">
                    <h1 class="font-semibold">Simpanan Pokok</h1>
                    <h1 class="flex md:text-left text-center"><span class="hidden md:block mr-5">:</span>
                        {{ 'Rp ' . number_format($anggota->simpanan, 0, ',', '.') }}
                    </h1>
                </div>

            </div>


            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 bg-[#D9D9D9]">
                    <thead class="text-xs text-gray-700 uppercase bg-[#D9D9D9] text-center  ">
                        <tr>

                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Simpanan Wajib
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tanggal Simpanan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="">Status</span>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="">Aksi</span>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($anggota->simpanans as $item)
                            <tr class="bg-[#D9D9D9] border-b   text-center  ">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $loop->iteration }} </th>

                                </th>
                                <td class="px-6 py-4">
                                    {{ 'Rp ' . number_format($item->simpanan_wajib, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->tanggal_simpanan }}
                                </td>
                                <td class="px-6 py-4 flex justify-center">
                                    <form action="{{ route('simpanan.status', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <select name="status" onchange="this.form.submit()"
                                            class="bg-gray-50  w-fit border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                            <option value="lunas" {{ $item->status == 'lunas' ? 'selected' : '' }}>Sudah
                                                Lunas</option>
                                            <option value="belum lunas"
                                                {{ $item->status == 'belum lunas' ? 'selected' : '' }}>Belum Lunas</option>
                                        </select>
                                    </form>
                                </td>

                                <td class="px-6 py-4 ">
                                    <div class="flex space-x-3 justify-center items-center">
                                        <!-- Modal toggle -->
                                        <button data-modal-target="authentication-modal-{{ $item->id }}"
                                            data-modal-toggle="authentication-modal-{{ $item->id }}" type="button">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M15 6.00019L18 9.00019M13 20.0002H21M5 16.0002L4 20.0002L8 19.0002L19.586 7.41419C19.9609 7.03913 20.1716 6.53051 20.1716 6.00019C20.1716 5.46986 19.9609 4.96124 19.586 4.58619L19.414 4.41419C19.0389 4.03924 18.5303 3.82861 18 3.82861C17.4697 3.82861 16.9611 4.03924 16.586 4.41419L5 16.0002Z"
                                                    stroke="#2B4AED" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </button>

                                        <!-- Main modal -->
                                        <div id="authentication-modal-{{ $item->id }}" tabindex="-1"
                                            aria-hidden="true"
                                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative p-4 w-full max-w-md max-h-full">
                                                <!-- Modal content -->
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <!-- Modal header -->
                                                    <div
                                                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                        <h3 class=" font-semibold text-gray-900 dark:text-white">
                                                            Edit Data Simpanan
                                                        </h3>
                                                        <button type="button"
                                                            class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                            data-modal-hide="authentication-modal-{{ $item->id }}">
                                                            <svg class="w-3 h-3" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 14 14">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                            </svg>
                                                            <span class="sr-only">Close modal</span>
                                                        </button>
                                                    </div>
                                                    <!-- Modal body -->
                                                    <div class="p-4 md:p-5">
                                                        <form class="space-y-4"
                                                            action="{{ route('simpanan.update', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div>
                                                                <label
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Simpanan
                                                                    Wajib</label>
                                                                <input value="{{ $item->simpanan_wajib }}" type="number"
                                                                    name="simpanan_wajib"
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                                    required />
                                                            </div>
                                                            <div>

                                                                <label
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                                    Tanggal Simpanan Wajib</label>
                                                                <input type="date" name="tanggal_simpanan"
                                                                    value="{{ $item->tanggal_simpanan }}"
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                                    required />
                                                            </div>

                                                            <button type="submit"
                                                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <button data-modal-target="popup-delete-{{ $item->id }}"
                                            data-modal-toggle="popup-delete-{{ $item->id }}" id="delete">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6 19C6 19.5304 6.21071 20.0391 6.58579 20.4142C6.96086 20.7893 7.46957 21 8 21H16C16.5304 21 17.0391 20.7893 17.4142 20.4142C17.7893 20.0391 18 19.5304 18 19V7H6V19ZM8 9H16V19H8V9ZM15.5 4L14.5 3H9.5L8.5 4H5V6H19V4H15.5Z"
                                                    fill="#FB3333" />
                                            </svg>
                                        </button>

                                        <div id="popup-delete-{{ $item->id }}" tabindex="-1"
                                            aria-labelledby="modal-title" role="dialog" aria-modal="true"
                                            id="interestDelete"
                                            class="hidden overflow-y-auto overflow-x-hidden fixed top-80 right-0 left-0 md:left-[35%] z-50 justify-center items-center w-full md:inset-10 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative p-4 w-full max-w-md max-h-full">
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <button type="button"
                                                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-hide="popup-delete-{{ $item->id }}">
                                                        <svg class="w-5 h-5 closeModal " aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                    <div class="p-4 md:p-5 text-center">
                                                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 20 20">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                        </svg>
                                                        <h3
                                                            class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                            Apakah
                                                            Anda yakin ingin
                                                            menghapus simpanan ini? </h3>
                                                        <form action="{{ route('simpanan.delete', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <button type="submit"
                                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                                Hapus
                                                            </button>
                                                            <button data-modal-hide="popup-delete-{{ $item->id }}"
                                                                type="button"
                                                                class="closeModal py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                                                Batal</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

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
