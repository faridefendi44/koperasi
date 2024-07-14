@extends('layouts.master')
@section('content')
    <div class="w-4/5 py-10  mx-auto space-y-10">
        <div class="search ">

            <form action="{{route('angsuran.search')}}" method="GET" class="flex  items-center  mx-auto">
                <label for="simple-search" class="sr-only">Search</label>
                <div class="relative w-full">
                    <input type="text" id="simple-search" name="keyword"
                        class="bg-[#F1DEC9] h-14 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  "
                        placeholder="Masukkan Kata Kunci" required />
                </div>
                <button
                    class="flex space-x-2 h-14 p-2.5 ms-2 text-sm font-medium text-black bg-[#EAD196] rounded-lg border border-[#C8B6A6] hover:bg-opacity-80 focus:ring-4 focus:outline-none focus:ring-[#C8B6A6] ">
                    <svg class="w-5 h-5 mt-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                    <span class="mt-1">Search</span>
                </button>
            </form>
        </div>



        <div class="">


            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 bg-[#D9D9D9]">
                    <thead class="text-xs text-gray-700 uppercase bg-[#D9D9D9]  ">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nomor Pinjaman
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nomor Anggota
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jumlah Pinjaman
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
                            <tr class="bg-[#D9D9D9] border-b">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $loop->iteration }}
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
                                        <a href="{{route('angsuran.show', $item->pinjaman->id)}}" class="font-medium text-blue-600 hover:underline">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M12 9C11.2044 9 10.4413 9.31607 9.87868 9.87868C9.31607 10.4413 9 11.2044 9 12C9 12.7956 9.31607 13.5587 9.87868 14.1213C10.4413 14.6839 11.2044 15 12 15C12.7956 15 13.5587 14.6839 14.1213 14.1213C14.6839 13.5587 15 12.7956 15 12C15 11.2044 14.6839 10.4413 14.1213 9.87868C13.5587 9.31607 12.7956 9 12 9ZM12 17C10.6739 17 9.40215 16.4732 8.46447 15.5355C7.52678 14.5979 7 13.3261 7 12C7 10.6739 7.52678 9.40215 8.46447 8.46447C9.40215 7.52678 10.6739 7 12 7C13.3261 7 14.5979 7.52678 15.5355 8.46447C16.4732 9.40215 17 10.6739 17 12C17 13.3261 16.4732 14.5979 15.5355 15.5355C14.5979 16.4732 13.3261 17 12 17ZM12 4.5C7 4.5 2.73 7.61 1 12C2.73 16.39 7 19.5 12 19.5C17 19.5 21.27 16.39 23 12C21.27 7.61 17 4.5 12 4.5Z"
                                                    fill="#9D43BD" />
                                            </svg>
                                        </a>
                                        
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
