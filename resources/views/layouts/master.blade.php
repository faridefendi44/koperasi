<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    {{-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>Logbook Online</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <script src="/assets/library/jquery.js"></script>
    <script src="/assets/library/datepicker.js"></script>
    <script src="/assets/library/chart.js"></script>
    <script src="/assets/library/datatables.js"></script>
    <link rel="stylesheet" href="/assets/library/datatables.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>



    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            width: 100%;
            min-height: 100vh;
            display: flex;
        }
    </style>
</head>


<body class="font-['Poppins'] ">
    @include('components.sidebar')
    <div class=" flex-1 bg-white relative pb-20 ">
        <nav id="navbar  " class=" bg-[#A4907C] border-b-2 z-10 h-16 w-full  border-gray-300 transition-all duration-500 ease-in-out">
            <div class="mx-auto space-x-2 flex items-center justify-end right-2 md:right-10 mr-10  absolute left-0 w-full z-20">
                <button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar"
                    class="flex text-sm mt-2 bg-white rounded-lg px-2 py-2 md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    type="button">
                    <span class="sr-only">Open user menu</span>
                    <svg class="w-5 h-5 mx-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7 8C7 5.23858 9.23858 3 12 3C14.7614 3 17 5.23858 17 8C17 10.7614 14.7614 13 12 13C9.23858 13 7 10.7614 7 8ZM12 11C13.6569 11 15 9.65685 15 8C15 6.34315 13.6569 5 12 5C10.3431 5 9 6.34315 9 8C9 9.65685 10.3431 11 12 11Z"
                            fill="currentColor"></path>
                        <path
                            d="M6.34315 16.3431C4.84285 17.8434 4 19.8783 4 22H6C6 20.4087 6.63214 18.8826 7.75736 17.7574C8.88258 16.6321 10.4087 16 12 16C13.5913 16 15.1174 16.6321 16.2426 17.7574C17.3679 18.8826 18 20.4087 18 22H20C20 19.8783 19.1571 17.8434 17.6569 16.3431C16.1566 14.8429 14.1217 14 12 14C9.87827 14 7.84344 14.8429 6.34315 16.3431Z"
                            fill="currentColor"></path>
                    </svg>
                    <svg class="w-5 h-5 mx-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12 15.713L18.01 9.70299L16.597 8.28799L12 12.888L7.40399 8.28799L5.98999 9.70199L12 15.713Z"
                            fill="currentColor"></path>
                    </svg>
                </button>

                <div id="dropdownAvatar"
                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-60 dark:bg-gray-700 dark:divide-gray-600">

                    {{-- <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                        <div>guest</div>
                        <div class="font-medium truncate">email</div>
                    </div> --}}

                    @guest
                        <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                            <div>Guest</div>
                            <div class="font-medium truncate">guest@example.com</div>
                            <!-- Ganti dengan email default atau pesan lain -->
                        </div>
                    @else
                        <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="font-medium truncate">{{ Auth::user()->email }}</div>
                        </div>
                    @endguest


                    <div class="py-2">
                        <a href="/actionlogout"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                            out</a>
                    </div>
                </div>
            </div>
        </nav>
        @yield('content')

        <div class="bg-[#C8B6A6] text-center h-16 font-semibold absolute  bottom-0 w-full">
            <h1 class="py-5">Copyright Koperasi Simpan Pinjam Pegawai Kejaksaan Negeri Payakumbuh</h1>
        </div>
    </div>
</div>
</body>

</html>
