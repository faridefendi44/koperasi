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
        <div class=" mx-auto py-10 ">
            <h1 class="text-center lg:w-1/2 mx-auto lg:text-3xl font-semibold">Selamat Datang di Koperasi Simpan Pinjam
                Pegawai Kejaksaan Negeri Payakumbuh</h1>
        </div>
        <div class="py-10 flex justify-start">
            <div class="bg-[#C8B6A6] w-1/2 rounded-lg p-5">
                <h1 class="text-lg font-semibold">Layanan Kami</h1>
            </div>
        </div>
        <div class="lg:w-3/4 mx-auto">

            <div class="container  mx-auto w-full h-full">
                <div class="relative wrap overflow-hidden p-2 lg:p-10 h-full">
                    <div class="border-2-2 absolute  border-[#A4907C] h-full border" style="left: 50%">
                    </div>
                    <!-- left timeline -->
                    <div class="mb-8 flex justify-between flex-row-reverse items-center w-full left-timeline">
                        <div class="order-1 w-5/12"></div>
                        <div class="z-20 flex items-center order-1 bg-[#A4907C] shadow-xl w-8 h-8 rounded-full">
                        </div>
                        <div class="order-1 rounded-lg w-5/12 shadow-xl px-6 py-4">
                            <h3 class="mb-3 font-bold text-black text-end text-xl">Simpanan</h3>
                            <p
                                class="text-sm font-medium leading-snug tracking-wide text-black text-justify text-opacity-100">
                                Koperasi Simpan Pinjam Pegawai Kejaksaan Negeri Payakumbuh menawarkan berbagai jenis
                                simpanan kepada anggotanya, dengan bunga yang kompetitif dan aman. Berikut adalah beberapa
                                jenis simpanan yang ditawarkan :
                            <p
                                class="text-sm font-medium leading-snug tracking-wide text-black text-justify text-opacity-100">
                                Simpanan Pokok: Merupakan simpanan wajib yang harus dibayarkan oleh setiap anggota saat
                                pertama kali bergabung dengan koperasi.</p>
                            <p
                                class="text-sm font-medium leading-snug tracking-wide text-black text-justify text-opacity-100">
                                Simpanan Wajib: Merupakan simpanan yang wajib dibayarkan oleh setiap anggota setiap bulan
                                dengan besaran yang telah ditentukan.</p>
                            </p>
                        </div>
                    </div>

                    <!-- right timeline -->
                    <div class="mb-8 flex justify-between items-center w-full right-timeline">
                        <div class="order-1 w-5/12"></div>
                        <div class="z-20 flex items-center order-1 bg-[#A4907C] shadow-xl w-8 h-8 rounded-full">
                            <h1 class="mx-auto font-semibold text-lg text-white"></h1>
                        </div>
                        <div class="order-1 rounded-lg shadow-xl w-5/12 px-6 py-4">
                            <h3 class="mb-3 font-bold text-black text-xl">Pinjaman</h3>
                            <p class="text-sm leading-snug tracking-wide text-black text-opacity-100">Koperasi Simpan
                                Pinjam Pegawai Kejaksaaan Negeri Payakumbuh juga menawarkan pinjaman berjangka kepada
                                anggotanya yaitu pinjaman yang terikat waktu dengan jangka waktu tertentu dan menawarkan
                                bunga yang ringan. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-10 flex justify-start">
            <div class="bg-[#C8B6A6] w-1/2 rounded-lg p-5">
                <h1 class="text-lg font-semibold">Lokasi Kantor</h1>
            </div>
        </div>
        <div class="px-5">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.7821543061264!2d100.61075817613678!3d-0.24395619975364177!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd54b4b61dab573%3A0xe6b93e1b5a5ad34b!2sKejaksaan%20Negeri%20Payakumbuh!5e0!3m2!1sen!2sid!4v1720789100636!5m2!1sen!2sid"
                class="w-full" height="450" style="border:0;" allowfullscreen="true" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="py-10 flex justify-start">
            <div class="bg-[#C8B6A6] w-1/2 rounded-lg p-5">
                <h1 class="text-lg font-semibold">Kontak</h1>
            </div>
        </div>
        <div class="flex items-center space-x-3">
            <h1>
                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                    stroke="#A98F03">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path d="M4 7.00005L10.2 11.65C11.2667 12.45 12.7333 12.45 13.8 11.65L20 7" stroke="#A98F03"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <rect x="3" y="5" width="18" height="14" rx="2" stroke="#A98F03"
                            stroke-width="2" stroke-linecap="round"></rect>
                    </g>
                </svg>
            </h1>
            <a target="blank" href="koperasi_knpayakumbuh@gmail.com">
                koperasi_knpayakumbuh@gmail.com
            </a>
        </div>
    </div>
@endsection
