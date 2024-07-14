<title>Simpanan</title>
@extends('layouts.master')
@section('content')
    <div class="">

        <div class="bg-slate-100 py-3 px-5 flex space-x-5 items-center">
            <h1>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_79_186)">
                        <path
                            d="M12.75 2.25C12.75 1.65326 12.9871 1.08097 13.409 0.65901C13.831 0.237053 14.4033 0 15 0L21 0C21.7956 0 22.5587 0.316071 23.1213 0.87868C23.6839 1.44129 24 2.20435 24 3V21C24 21.7956 23.6839 22.5587 23.1213 23.1213C22.5587 23.6839 21.7956 24 21 24H3C2.20435 24 1.44129 23.6839 0.87868 23.1213C0.316071 22.5587 0 21.7956 0 21V3C0 2.20435 0.316071 1.44129 0.87868 0.87868C1.44129 0.316071 2.20435 0 3 0L12 0C11.529 0.627 11.25 1.4055 11.25 2.25V13.9395L7.281 9.969C7.21127 9.89927 7.12848 9.84395 7.03738 9.80622C6.94627 9.76848 6.84862 9.74905 6.75 9.74905C6.65138 9.74905 6.55373 9.76848 6.46262 9.80622C6.37152 9.84395 6.28873 9.89927 6.219 9.969C6.14927 10.0387 6.09395 10.1215 6.05621 10.2126C6.01848 10.3037 5.99905 10.4014 5.99905 10.5C5.99905 10.5986 6.01848 10.6963 6.05621 10.7874C6.09395 10.8785 6.14927 10.9613 6.219 11.031L11.469 16.281C11.5387 16.3508 11.6214 16.4063 11.7125 16.4441C11.8037 16.4819 11.9013 16.5013 12 16.5013C12.0987 16.5013 12.1963 16.4819 12.2874 16.4441C12.3786 16.4063 12.4613 16.3508 12.531 16.281L17.781 11.031C17.9218 10.8902 18.0009 10.6992 18.0009 10.5C18.0009 10.3008 17.9218 10.1098 17.781 9.969C17.6402 9.82817 17.4492 9.74905 17.25 9.74905C17.0508 9.74905 16.8598 9.82817 16.719 9.969L12.75 13.9395V2.25Z"
                            fill="black" />
                    </g>
                    <defs>
                        <clipPath id="clip0_79_186">
                            <rect width="24" height="24" fill="white" />
                        </clipPath>
                    </defs>
                </svg>
            </h1>
            <div class="">
                <h1>Simpanan</h1>
            </div>
        </div>
        <div class="lg:px-10">


            <div class=" font-semibold text-center py-5">
                <h1>Riwayat Simpanan</h1>
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
                    <h1 class="font-semibold">Simpanan Pokok</h1>
                    <h1 class="flex md:text-left text-center"><span class="hidden md:block mr-5">:</span>
                        {{ 'Rp ' . number_format(auth()->user()->anggota->simpanan, 0, ',', '.') }}
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
                                Simpanan Wajib
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tanggal Simpanan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="">Status</span>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($simpanans as $item)
                            <tr class="bg-[#D9D9D9] border-b    ">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $loop->iteration + ($simpanans->currentPage() - 1) * $simpanans->perPage() }} </th>

                                </th>
                                <td class="px-6 py-4">
                                    {{ 'Rp ' . number_format($item->simpanan_wajib, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->tanggal_simpanan }}
                                </td>
                                <td class="px-6 py-4">

                                    @if ($item->status == 'lunas')
                                        <h1>Sudah Lunas</h1>
                                    @elseif($item->status == 'belum lunas')
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
@endsection
