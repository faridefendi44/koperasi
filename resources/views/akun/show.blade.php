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
                <h1>Profil</h1>
            </div>
        </div>

        <div class="lg:w-5/6 w-[90%] flex  text-black mt-10 py-5 rounded-lg  justify-center mx-auto">
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
                            {{ $user->name }}
                        </h1>
                    </div>
                    <div class="grid md:grid-cols-2 justify-center   border-b-2 ">
                        <h1 class="font-semibold">Username</h1>
                        <h1 class="flex md:text-left text-center"><span class="hidden md:block mr-5">:</span>
                            {{ $user->username }}
                        </h1>
                    </div>
                    <div class="grid md:grid-cols-2 justify-center   border-b-2 ">
                        <h1 class="font-semibold">Email</h1>
                        <h1 class="flex md:text-left text-center"><span class="hidden md:block mr-5">:</span>
                            {{ $user->email }}
                        </h1>
                    </div>
                    <div class="grid md:grid-cols-2 justify-center   border-b-2 ">
                        <h1 class="font-semibold">Role</h1>
                        <h1 class="flex md:text-left text-center"><span class="hidden md:block mr-5">:</span>
                            {{ $user->role }}
                        </h1>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
