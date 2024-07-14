@extends('layouts.master')
@section('content')
    <div class="">
        <div class="bg-slate-100 py-3 px-5 flex space-x-5 items-center">
            <h1>
                <svg width="24" height="24" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M16.6667 14.5833C16.6667 12.3732 17.5446 10.2536 19.1074 8.69078C20.6702 7.12797 22.7899 6.25 25 6.25C27.2101 6.25 29.3298 7.12797 30.8926 8.69078C32.4554 10.2536 33.3333 12.3732 33.3333 14.5833C33.3333 16.7935 32.4554 18.9131 30.8926 20.4759C29.3298 22.0387 27.2101 22.9167 25 22.9167C22.7899 22.9167 20.6702 22.0387 19.1074 20.4759C17.5446 18.9131 16.6667 16.7935 16.6667 14.5833ZM16.6667 27.0833C13.904 27.0833 11.2545 28.1808 9.30097 30.1343C7.34747 32.0878 6.25 34.7373 6.25 37.5C6.25 39.1576 6.90848 40.7473 8.08058 41.9194C9.25269 43.0915 10.8424 43.75 12.5 43.75H37.5C39.1576 43.75 40.7473 43.0915 41.9194 41.9194C43.0915 40.7473 43.75 39.1576 43.75 37.5C43.75 34.7373 42.6525 32.0878 40.699 30.1343C38.7455 28.1808 36.096 27.0833 33.3333 27.0833H16.6667Z"
                        fill="#000" />
                </svg>
            </h1>
            <div class="">
                <h1>Detail Anggota</h1>
            </div>
        </div>



        <div class="lg:w-5/6 w-[90%] bg-white shadow-lg px-5 text-black mt-10 py-5 rounded-lg  justify-center mx-auto">
            <div class="mt-5">
                <a href="{{route('member.index')}}"
                    class="bg-[#A94438] flex space-x-3 text-md font-semibold w-fit text-center   py-3 px-5 rounded-lg">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 4C7.26522 4 7.51957 4.10536 7.70711 4.29289C7.89464 4.48043 8 4.73478 8 5V11.333L18.223 4.518C18.2983 4.4679 18.3858 4.43915 18.4761 4.43483C18.5664 4.43051 18.6563 4.45077 18.736 4.49346C18.8157 4.53615 18.8824 4.59966 18.9289 4.67724C18.9754 4.75482 19 4.84356 19 4.934V19.066C19 19.1564 18.9754 19.2452 18.9289 19.3228C18.8824 19.4003 18.8157 19.4639 18.736 19.5065C18.6563 19.5492 18.5664 19.5695 18.4761 19.5652C18.3858 19.5608 18.2983 19.5321 18.223 19.482L8 12.667V19C8 19.2652 7.89464 19.5196 7.70711 19.7071C7.51957 19.8946 7.26522 20 7 20C6.73478 20 6.48043 19.8946 6.29289 19.7071C6.10536 19.5196 6 19.2652 6 19V5C6 4.73478 6.10536 4.48043 6.29289 4.29289C6.48043 4.10536 6.73478 4 7 4ZM17 7.737L10.606 12L17 16.263V7.737Z" fill="white"/>
                        </svg>

                        <span class="text-white">
                            Kembali
                        </span>
                    </a>
            </div>
            <div class="lg:w-4/5  rounded-lg p-5">
                <div class="justify-center w-full mx-auto py-5 flex">
                    <div class="w-20 h-20 bg-[#A4907C] rounded-full relative flex justify-center items-center">
                        <div class="">
                            <svg width="40" height="40" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M16.6667 14.5833C16.6667 12.3732 17.5446 10.2536 19.1074 8.69078C20.6702 7.12797 22.7899 6.25 25 6.25C27.2101 6.25 29.3298 7.12797 30.8926 8.69078C32.4554 10.2536 33.3333 12.3732 33.3333 14.5833C33.3333 16.7935 32.4554 18.9131 30.8926 20.4759C29.3298 22.0387 27.2101 22.9167 25 22.9167C22.7899 22.9167 20.6702 22.0387 19.1074 20.4759C17.5446 18.9131 16.6667 16.7935 16.6667 14.5833ZM16.6667 27.0833C13.904 27.0833 11.2545 28.1808 9.30097 30.1343C7.34747 32.0878 6.25 34.7373 6.25 37.5C6.25 39.1576 6.90848 40.7473 8.08058 41.9194C9.25269 43.0915 10.8424 43.75 12.5 43.75H37.5C39.1576 43.75 40.7473 43.0915 41.9194 41.9194C43.0915 40.7473 43.75 39.1576 43.75 37.5C43.75 34.7373 42.6525 32.0878 40.699 30.1343C38.7455 28.1808 36.096 27.0833 33.3333 27.0833H16.6667Z"
                                    fill="#F1DEC9" />
                            </svg>
                        </div>

                    </div>
                </div>
                <div class="space-y-5 ">
                    <div class="grid md:grid-cols-2 justify-center   border-b-2 ">
                        <h1 class="font-semibold">Nama</h1>
                        <h1 class="flex md:text-left text-center"><span class="hidden md:block mr-5">:</span>
                            {{ $user->user->name }}
                        </h1>
                    </div>
                    <div class="grid md:grid-cols-2 justify-center   border-b-2 ">
                        <h1 class="font-semibold">NIP</h1>
                        <h1 class="flex md:text-left text-center"><span class="hidden md:block mr-5">:</span>
                            {{ $user->nip }}
                        </h1>
                    </div>
                    <div class="grid md:grid-cols-2 justify-center   border-b-2 ">
                        <h1 class="font-semibold">Golongan</h1>
                        <h1 class="flex md:text-left text-center"><span class="hidden md:block mr-5">:</span>
                            {{ $user->golongan }}
                        </h1>
                    </div>
                    <div class="grid md:grid-cols-2 justify-center   border-b-2 ">
                        <h1 class="font-semibold">Gaji</h1>
                        <h1 class="flex md:text-left text-center"><span class="hidden md:block mr-5">:</span>
                            {{ 'Rp ' . number_format($user->gaji, 0, ',', '.') }}
                        </h1>
                    </div>
                    <div class="grid md:grid-cols-2 justify-center   border-b-2 ">
                        <h1 class="font-semibold">Bidang</h1>
                        <h1 class="flex md:text-left text-center"><span class="hidden md:block mr-5">:</span>
                            {{ $user->bidang }}
                        </h1>
                    </div>
                    <div class="grid md:grid-cols-2 justify-center   border-b-2 ">
                        <h1 class="font-semibold">Alamat</h1>
                        <h1 class="flex md:text-left "><span class="hidden md:block mr-5">:</span>
                            {{ $user->alamat }}
                        </h1>
                    </div>
                    <div class="grid md:grid-cols-2 justify-center   border-b-2 ">
                        <h1 class="font-semibold">Simpanan Pokok</h1>
                        <h1 class="flex md:text-left text-center"><span class="hidden md:block mr-5">:</span>
                            {{ 'Rp ' . number_format($user->simpanan, 0, ',', '.') }}
                        </h1>
                    </div>
                    <div class="grid md:grid-cols-2 justify-center   border-b-2 ">
                        <h1 class="font-semibold">Tanggal Masuk</h1>
                        <h1 class="flex md:text-left text-center"><span class="hidden md:block mr-5">:</span>
                            {{ $user->tanggal_masuk }}
                        </h1>
                    </div>
                    <div class="grid md:grid-cols-2 justify-center   border-b-2 ">
                        <h1 class="font-semibold">Nomor whatsapp</h1>
                        <h1 class="flex md:text-left text-center"><span class="hidden md:block mr-5">:</span>
                            {{ $user->user->no_wa }}
                        </h1>
                    </div>
                    <div class="grid md:grid-cols-2 justify-center   border-b-2 ">
                        <h1 class="font-semibold">Email</h1>
                        <h1 class="flex md:text-left text-center"><span class="hidden md:block mr-5">:</span>
                            {{ $user->user->email }}
                        </h1>
                    </div>
                    <div class="grid md:grid-cols-2 justify-center   border-b-2 ">
                        <h1 class="font-semibold">Username</h1>
                        <h1 class="flex md:text-left text-center"><span class="hidden md:block mr-5">:</span>
                            {{ $user->user->username }}
                        </h1>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
