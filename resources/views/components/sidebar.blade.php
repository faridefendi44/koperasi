<style>
    .parent:hover .child {
        opacity: 1;
    }

    .parent .active {
        opacity: 1;
    }

    .child {
        opacity: 0;
        transition: opacity 0.3s ease;
    }
</style>
<div id="sidebar" class="relative   bg-[#A4907C] text-white  left-0 top-0  transition-all duration-300 ease-in-out">
    <div class="p-2.5   bg-[#A4907C]   flex items-center h-16 p-4">
        <div class="w-2/3">
            <img src="{{ URL::to('assets/img/logo.png') }}" class="justify-end" alt="">
        </div>
    </div>
    <div class="p-4">
        <a id="toggleSidebar" class=" absolute h-10 w-10  -right-8 top-4 focus:outline-none">
            <svg class="h-6 w-6 text-black ml-1 " fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </a>

        <ul class="mt-4 space-y-5 text-black   " id="sidebarMenu">
            @php
                $user = auth()->user();
            @endphp

            @if (!$user)
                <li>
                    <a href="{{ url('/') }}"
                        class="parent  {{ Request::path() == '/' ? 'bg-[#F1DEC9]' : '' }}  hover:bg-[#F1DEC9]  -ml-2 p-4 w-auto h-12 mt-2 flex items-center rounded-md duration-300 cursor-pointer   font-semibold shadow relative">
                        <h1
                            class="{{ Request::path() == '/' ? 'active' : 'opacity-0' }}  bg-red-400

                    bg-[#345C6D]    w-1 h-full  absolute left-0 child">
                        </h1>
                        <svg class="" width="35" height="35" viewBox="0 0 35 35" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.125 32.0834V17.5H21.875V32.0834M4.375 13.125L17.5 2.91669L30.625 13.125V29.1667C30.625 29.9402 30.3177 30.6821 29.7707 31.2291C29.2237 31.7761 28.4819 32.0834 27.7083 32.0834H7.29167C6.51812 32.0834 5.77625 31.7761 5.22927 31.2291C4.68229 30.6821 4.375 29.9402 4.375 29.1667V13.125Z"
                                stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                        <span id="show" class="text-[12px] md:text-[18px] ml-4 ">Beranda</span>
                    </a>
                </li>
            @elseif($user->role == 'user')
                @if ($user->anggota && $user->anggota->status != '')
                    <li>
                        <a href="{{ url('/users/verifikasi') }}"
                            class="parent  {{ Request::path() == '/' ? 'bg-[#F1DEC9]' : '' }}  hover:bg-[#F1DEC9]  -ml-2 p-4 w-auto h-12 mt-2 flex items-center rounded-md duration-300 cursor-pointer   font-semibold shadow relative">
                            <h1
                                class="{{ Request::path() == '/' ? 'active' : 'opacity-0' }}  bg-red-400

                    bg-[#345C6D]    w-1 h-full  absolute left-0 child">
                            </h1>
                            <svg class="" width="35" height="35" viewBox="0 0 35 35" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13.125 32.0834V17.5H21.875V32.0834M4.375 13.125L17.5 2.91669L30.625 13.125V29.1667C30.625 29.9402 30.3177 30.6821 29.7707 31.2291C29.2237 31.7761 28.4819 32.0834 27.7083 32.0834H7.29167C6.51812 32.0834 5.77625 31.7761 5.22927 31.2291C4.68229 30.6821 4.375 29.9402 4.375 29.1667V13.125Z"
                                    stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                            <span id="show" class="text-[12px] md:text-[18px] ml-4 ">Beranda</span>
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{ url('/users') }}"
                            class="parent  {{ Request::path() == '/' ? 'bg-[#F1DEC9]' : '' }}  hover:bg-[#F1DEC9]  -ml-2 p-4 w-auto h-12 mt-2 flex items-center rounded-md duration-300 cursor-pointer   font-semibold shadow relative">
                            <h1
                                class="{{ Request::path() == '/' ? 'active' : 'opacity-0' }}  bg-red-400

                    bg-[#345C6D]    w-1 h-full  absolute left-0 child">
                            </h1>
                            <svg class="" width="35" height="35" viewBox="0 0 35 35" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13.125 32.0834V17.5H21.875V32.0834M4.375 13.125L17.5 2.91669L30.625 13.125V29.1667C30.625 29.9402 30.3177 30.6821 29.7707 31.2291C29.2237 31.7761 28.4819 32.0834 27.7083 32.0834H7.29167C6.51812 32.0834 5.77625 31.7761 5.22927 31.2291C4.68229 30.6821 4.375 29.9402 4.375 29.1667V13.125Z"
                                    stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                            <span id="show" class="text-[12px] md:text-[18px] ml-4 ">Beranda</span>
                        </a>
                    </li>
                @endif
            @elseif($user->role == 'admin')
                <li>
                    <a href="{{ url('/admin') }}"
                        class="parent  {{ Request::path() == '/admin' ? 'bg-[#F1DEC9]' : '' }}  hover:bg-[#F1DEC9]  -ml-2 p-4 w-auto h-12 mt-2 flex items-center rounded-md duration-300 cursor-pointer   font-semibold shadow relative">
                        <h1
                            class="{{ Request::path() == '/admin' ? 'active' : 'opacity-0' }}  bg-red-400

                    bg-[#345C6D]    w-1 h-full  absolute left-0 child">
                        </h1>
                        <svg class="" width="35" height="35" viewBox="0 0 35 35" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.125 32.0834V17.5H21.875V32.0834M4.375 13.125L17.5 2.91669L30.625 13.125V29.1667C30.625 29.9402 30.3177 30.6821 29.7707 31.2291C29.2237 31.7761 28.4819 32.0834 27.7083 32.0834H7.29167C6.51812 32.0834 5.77625 31.7761 5.22927 31.2291C4.68229 30.6821 4.375 29.9402 4.375 29.1667V13.125Z"
                                stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                        <span id="show" class="text-[12px] md:text-[18px] ml-4 ">Beranda</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('members/all') }}"
                        class="parent  {{ Request::path() == 'members/all' ? 'bg-[#F1DEC9]' : '' }}  hover:bg-[#F1DEC9]  -ml-2 p-4 w-auto h-12 mt-2 flex items-center rounded-md duration-300 cursor-pointer   font-semibold shadow relative">
                        <h1
                            class="{{ Request::path() == 'members/all' ? 'active' : 'opacity-0' }}  bg-red-400bg-[#345C6D]    w-1 h-full  absolute left-0 child">
                        </h1>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5.5 7C5.5 6.60603 5.5776 6.21593 5.72836 5.85195C5.87913 5.48797 6.1001 5.15726 6.37868 4.87868C6.65726 4.6001 6.98797 4.37913 7.35195 4.22836C7.71593 4.0776 8.10603 4 8.5 4C8.89397 4 9.28407 4.0776 9.64805 4.22836C10.012 4.37913 10.3427 4.6001 10.6213 4.87868C10.8999 5.15726 11.1209 5.48797 11.2716 5.85195C11.4224 6.21593 11.5 6.60603 11.5 7C11.5 7.79565 11.1839 8.55871 10.6213 9.12132C10.0587 9.68393 9.29565 10 8.5 10C7.70435 10 6.94129 9.68393 6.37868 9.12132C5.81607 8.55871 5.5 7.79565 5.5 7ZM8.5 2C7.17392 2 5.90215 2.52678 4.96447 3.46447C4.02678 4.40215 3.5 5.67392 3.5 7C3.5 8.32608 4.02678 9.59785 4.96447 10.5355C5.90215 11.4732 7.17392 12 8.5 12C9.82608 12 11.0979 11.4732 12.0355 10.5355C12.9732 9.59785 13.5 8.32608 13.5 7C13.5 5.67392 12.9732 4.40215 12.0355 3.46447C11.0979 2.52678 9.82608 2 8.5 2ZM15.5 2H14.5V4H15.5C15.894 4 16.2841 4.0776 16.6481 4.22836C17.012 4.37913 17.3427 4.6001 17.6213 4.87868C17.8999 5.15726 18.1209 5.48797 18.2716 5.85195C18.4224 6.21593 18.5 6.60603 18.5 7C18.5 7.39397 18.4224 7.78407 18.2716 8.14805C18.1209 8.51203 17.8999 8.84274 17.6213 9.12132C17.3427 9.3999 17.012 9.62087 16.6481 9.77164C16.2841 9.9224 15.894 10 15.5 10H14.5V12H15.5C16.8261 12 18.0979 11.4732 19.0355 10.5355C19.9732 9.59785 20.5 8.32608 20.5 7C20.5 5.67392 19.9732 4.40215 19.0355 3.46447C18.0979 2.52678 16.8261 2 15.5 2ZM0 19C0 17.6739 0.526784 16.4021 1.46447 15.4645C2.40215 14.5268 3.67392 14 5 14H12C13.3261 14 14.5979 14.5268 15.5355 15.4645C16.4732 16.4021 17 17.6739 17 19V21H15V19C15 18.2044 14.6839 17.4413 14.1213 16.8787C13.5587 16.3161 12.7956 16 12 16H5C4.20435 16 3.44129 16.3161 2.87868 16.8787C2.31607 17.4413 2 18.2044 2 19V21H0V20V19ZM24 19C24 18.3434 23.8707 17.6932 23.6194 17.0866C23.3681 16.48 22.9998 15.9288 22.5355 15.4645C22.0712 15.0002 21.52 14.6319 20.9134 14.3806C20.3068 14.1293 19.6566 14 19 14H18V16H19C19.7956 16 20.5587 16.3161 21.1213 16.8787C21.6839 17.4413 22 18.2044 22 19V21H24V20V19Z"
                                fill="black" />
                        </svg>

                        <span id="show" class="text-[12px] md:text-[18px] ml-4 ">Anggota</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('akun/all') }}"
                        class="parent  {{ Request::path() == 'akun/all' ? 'bg-[#F1DEC9]' : '' }}  hover:bg-[#F1DEC9]  -ml-2 p-4 w-auto h-12 mt-2 flex items-center rounded-md duration-300 cursor-pointer   font-semibold shadow relative">
                        <h1
                            class="{{ Request::path() == 'akun/all' ? 'active' : 'opacity-0' }}  bg-red-400bg-[#345C6D]    w-1 h-full  absolute left-0 child">
                        </h1>
                        <svg width="24" height="24" viewBox="0 0 50 50" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M16.6667 14.5833C16.6667 12.3732 17.5446 10.2536 19.1074 8.69078C20.6702 7.12797 22.7899 6.25 25 6.25C27.2101 6.25 29.3298 7.12797 30.8926 8.69078C32.4554 10.2536 33.3333 12.3732 33.3333 14.5833C33.3333 16.7935 32.4554 18.9131 30.8926 20.4759C29.3298 22.0387 27.2101 22.9167 25 22.9167C22.7899 22.9167 20.6702 22.0387 19.1074 20.4759C17.5446 18.9131 16.6667 16.7935 16.6667 14.5833ZM16.6667 27.0833C13.904 27.0833 11.2545 28.1808 9.30097 30.1343C7.34747 32.0878 6.25 34.7373 6.25 37.5C6.25 39.1576 6.90848 40.7473 8.08058 41.9194C9.25269 43.0915 10.8424 43.75 12.5 43.75H37.5C39.1576 43.75 40.7473 43.0915 41.9194 41.9194C43.0915 40.7473 43.75 39.1576 43.75 37.5C43.75 34.7373 42.6525 32.0878 40.699 30.1343C38.7455 28.1808 36.096 27.0833 33.3333 27.0833H16.6667Z"
                                fill="#000" />
                        </svg>

                        <span id="show" class="text-[12px] md:text-[18px] ml-4 ">Akun</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('simpanan/all') }}"
                        class="parent  {{ Request::path() == 'simpanan/all' ? 'bg-[#F1DEC9]' : '' }}  hover:bg-[#F1DEC9]  -ml-2 p-4 w-auto h-12 mt-2 flex items-center rounded-md duration-300 cursor-pointer   font-semibold shadow relative">
                        <h1
                            class="{{ Request::path() == 'simpanan/all' ? 'active' : 'opacity-0' }}  bg-red-400bg-[#345C6D]    w-1 h-full  absolute left-0 child">
                        </h1>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
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


                        <span id="show" class="text-[12px] md:text-[18px] ml-4 ">Simpanan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('pinjaman/all') }}"
                        class="parent  {{ Request::path() == 'pinjaman/all' ? 'bg-[#F1DEC9]' : '' }}  hover:bg-[#F1DEC9]  -ml-2 p-4 w-auto h-12 mt-2 flex items-center rounded-md duration-300 cursor-pointer   font-semibold shadow relative">
                        <h1
                            class="{{ Request::path() == 'pinjaman/all' ? 'active' : 'opacity-0' }}  bg-red-400bg-[#345C6D]    w-1 h-full  absolute left-0 child">
                        </h1>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M11.25 6H9C7.114 6 6.172 6 5.586 6.586C5 7.172 5 8.114 5 10V16.25H19V10C19 8.114 19 7.172 18.414 6.586C17.828 6 16.886 6 15 6H12.75V10.973L13.43 10.179C13.4941 10.1041 13.5723 10.0426 13.6601 9.99802C13.748 9.95339 13.8438 9.9265 13.942 9.91888C14.0403 9.91127 14.139 9.92308 14.2327 9.95364C14.3264 9.9842 14.4131 10.0329 14.488 10.097C14.5629 10.1611 14.6244 10.2393 14.669 10.3271C14.7136 10.415 14.7405 10.5108 14.7481 10.609C14.7557 10.7073 14.7439 10.806 14.7134 10.8997C14.6828 10.9934 14.6341 11.0801 14.57 11.155L12.57 13.488C12.4996 13.5703 12.4122 13.6364 12.3138 13.6818C12.2154 13.7271 12.1083 13.7506 12 13.7506C11.8917 13.7506 11.7846 13.7271 11.6862 13.6818C11.5878 13.6364 11.5004 13.5703 11.43 13.488L9.43 11.155C9.36592 11.0801 9.3172 10.9934 9.28664 10.8997C9.25608 10.806 9.24427 10.7073 9.25188 10.609C9.2595 10.5108 9.28639 10.415 9.33102 10.3271C9.37565 10.2393 9.43715 10.1611 9.512 10.097C9.58685 10.0329 9.6736 9.9842 9.76728 9.95364C9.86096 9.92308 9.95974 9.91127 10.058 9.91888C10.1562 9.9265 10.252 9.95339 10.3399 9.99802C10.4277 10.0426 10.5059 10.1041 10.57 10.179L11.25 10.973V6ZM5.03 17.75H18.97C18.918 18.54 18.781 19.047 18.414 19.414C17.828 20 16.886 20 15 20H9C7.114 20 6.172 20 5.586 19.414C5.219 19.047 5.081 18.541 5.03 17.75Z"
                                fill="black" />
                            <path
                                d="M5.88899 3H18.11C20.26 3 22 4.8 22 7.02C22 8.31 21.413 9.457 20.5 10.193V9.911C20.5 9.045 20.5 8.251 20.413 7.606C20.318 6.895 20.093 6.143 19.475 5.526C18.857 4.907 18.105 4.682 17.395 4.586C16.749 4.5 15.955 4.5 15.089 4.5H8.90999C8.04499 4.5 7.25099 4.5 6.60599 4.587C5.89499 4.682 5.14299 4.907 4.52599 5.525C3.90699 6.143 3.68199 6.895 3.58599 7.605C3.49999 8.251 3.49999 9.045 3.49999 9.911V10.193C3.0287 9.80986 2.6493 9.32593 2.38971 8.77682C2.13012 8.2277 1.99695 7.62737 1.99999 7.02C1.99999 4.8 3.74099 3 5.88899 3Z"
                                fill="black" />
                        </svg>



                        <span id="show" class="text-[12px] md:text-[18px] ml-4 ">Pinjaman</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('angsuran/all') }}"
                        class="parent  {{ Request::path() == 'angsuran/all' ? 'bg-[#F1DEC9]' : '' }}  hover:bg-[#F1DEC9]  -ml-2 p-4 w-auto h-12 mt-2 flex items-center rounded-md duration-300 cursor-pointer   font-semibold shadow relative">
                        <h1
                            class="{{ Request::path() == 'angsuran/all' ? 'active' : 'opacity-0' }}  bg-red-400bg-[#345C6D]    w-1 h-full  absolute left-0 child">
                        </h1>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5.25 4.5C4.25544 4.5 3.30161 4.89509 2.59835 5.59835C1.89509 6.30161 1.5 7.25544 1.5 8.25V9H22.5V8.25C22.5 7.25544 22.1049 6.30161 21.4016 5.59835C20.6984 4.89509 19.7446 4.5 18.75 4.5H5.25ZM22.5 10.5H1.5V15.75C1.5 16.7446 1.89509 17.6984 2.59835 18.4017C3.30161 19.1049 4.25544 19.5 5.25 19.5H18.75C19.7446 19.5 20.6984 19.1049 21.4016 18.4017C22.1049 17.6984 22.5 16.7446 22.5 15.75V10.5ZM15.75 15H18.75C18.9489 15 19.1397 15.079 19.2803 15.2197C19.421 15.3603 19.5 15.5511 19.5 15.75C19.5 15.9489 19.421 16.1397 19.2803 16.2803C19.1397 16.421 18.9489 16.5 18.75 16.5H15.75C15.5511 16.5 15.3603 16.421 15.2197 16.2803C15.079 16.1397 15 15.9489 15 15.75C15 15.5511 15.079 15.3603 15.2197 15.2197C15.3603 15.079 15.5511 15 15.75 15Z"
                                fill="black" />
                        </svg>
                        <span id="show" class="text-[12px] md:text-[18px] ml-4 ">Angsuran</span>
                    </a>
                </li>
            @endif

            @if ($user && $user->role == 'user')
                <li>
                    <a href="{{ url('users/profil') }}"
                        class="parent  {{ Request::path() == 'members/profil' ? 'bg-[#F1DEC9]' : '' }}  hover:bg-[#F1DEC9]  -ml-2 p-4 w-auto h-12 mt-2 flex items-center rounded-md duration-300 cursor-pointer   font-semibold shadow relative">
                        <h1
                            class="{{ Request::path() == 'members/profil' ? 'active' : 'opacity-0' }}  bg-red-400bg-[#345C6D]    w-1 h-full  absolute left-0 child">
                        </h1>
                        <svg width="24" height="24" viewBox="0 0 50 50" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M16.6667 14.5833C16.6667 12.3732 17.5446 10.2536 19.1074 8.69078C20.6702 7.12797 22.7899 6.25 25 6.25C27.2101 6.25 29.3298 7.12797 30.8926 8.69078C32.4554 10.2536 33.3333 12.3732 33.3333 14.5833C33.3333 16.7935 32.4554 18.9131 30.8926 20.4759C29.3298 22.0387 27.2101 22.9167 25 22.9167C22.7899 22.9167 20.6702 22.0387 19.1074 20.4759C17.5446 18.9131 16.6667 16.7935 16.6667 14.5833ZM16.6667 27.0833C13.904 27.0833 11.2545 28.1808 9.30097 30.1343C7.34747 32.0878 6.25 34.7373 6.25 37.5C6.25 39.1576 6.90848 40.7473 8.08058 41.9194C9.25269 43.0915 10.8424 43.75 12.5 43.75H37.5C39.1576 43.75 40.7473 43.0915 41.9194 41.9194C43.0915 40.7473 43.75 39.1576 43.75 37.5C43.75 34.7373 42.6525 32.0878 40.699 30.1343C38.7455 28.1808 36.096 27.0833 33.3333 27.0833H16.6667Z"
                                fill="#000" />
                        </svg>
                        <span id="show" class="text-[12px] md:text-[18px] ml-4 ">Profil</span>
                    </a>
                </li>
                @if ($user->anggota && $user->anggota->status !== 'proses')
                    <li>
                        <a href="{{ url('users/simpanan') }}"
                            class="parent  {{ Request::path() == 'users/simpanan' ? 'bg-[#F1DEC9]' : '' }}  hover:bg-[#F1DEC9]  -ml-2 p-4 w-auto h-12 mt-2 flex items-center rounded-md duration-300 cursor-pointer   font-semibold shadow relative">
                            <h1
                                class="{{ Request::path() == 'users/simpanan' ? 'active' : 'opacity-0' }}  bg-red-400bg-[#345C6D]    w-1 h-full  absolute left-0 child">
                            </h1>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
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


                            <span id="show" class="text-[12px] md:text-[18px] ml-4 ">Simpanan</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('users/pinjaman') }}"
                            class="parent  {{ Request::path() == 'users/pinjaman' ? 'bg-[#F1DEC9]' : '' }}  hover:bg-[#F1DEC9]  -ml-2 p-4 w-auto h-12 mt-2 flex items-center rounded-md duration-300 cursor-pointer   font-semibold shadow relative">
                            <h1
                                class="{{ Request::path() == 'users/pinjaman' ? 'active' : 'opacity-0' }}  bg-red-400bg-[#345C6D]    w-1 h-full  absolute left-0 child">
                            </h1>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11.25 6H9C7.114 6 6.172 6 5.586 6.586C5 7.172 5 8.114 5 10V16.25H19V10C19 8.114 19 7.172 18.414 6.586C17.828 6 16.886 6 15 6H12.75V10.973L13.43 10.179C13.4941 10.1041 13.5723 10.0426 13.6601 9.99802C13.748 9.95339 13.8438 9.9265 13.942 9.91888C14.0403 9.91127 14.139 9.92308 14.2327 9.95364C14.3264 9.9842 14.4131 10.0329 14.488 10.097C14.5629 10.1611 14.6244 10.2393 14.669 10.3271C14.7136 10.415 14.7405 10.5108 14.7481 10.609C14.7557 10.7073 14.7439 10.806 14.7134 10.8997C14.6828 10.9934 14.6341 11.0801 14.57 11.155L12.57 13.488C12.4996 13.5703 12.4122 13.6364 12.3138 13.6818C12.2154 13.7271 12.1083 13.7506 12 13.7506C11.8917 13.7506 11.7846 13.7271 11.6862 13.6818C11.5878 13.6364 11.5004 13.5703 11.43 13.488L9.43 11.155C9.36592 11.0801 9.3172 10.9934 9.28664 10.8997C9.25608 10.806 9.24427 10.7073 9.25188 10.609C9.2595 10.5108 9.28639 10.415 9.33102 10.3271C9.37565 10.2393 9.43715 10.1611 9.512 10.097C9.58685 10.0329 9.6736 9.9842 9.76728 9.95364C9.86096 9.92308 9.95974 9.91127 10.058 9.91888C10.1562 9.9265 10.252 9.95339 10.3399 9.99802C10.4277 10.0426 10.5059 10.1041 10.57 10.179L11.25 10.973V6ZM5.03 17.75H18.97C18.918 18.54 18.781 19.047 18.414 19.414C17.828 20 16.886 20 15 20H9C7.114 20 6.172 20 5.586 19.414C5.219 19.047 5.081 18.541 5.03 17.75Z"
                                    fill="black" />
                                <path
                                    d="M5.88899 3H18.11C20.26 3 22 4.8 22 7.02C22 8.31 21.413 9.457 20.5 10.193V9.911C20.5 9.045 20.5 8.251 20.413 7.606C20.318 6.895 20.093 6.143 19.475 5.526C18.857 4.907 18.105 4.682 17.395 4.586C16.749 4.5 15.955 4.5 15.089 4.5H8.90999C8.04499 4.5 7.25099 4.5 6.60599 4.587C5.89499 4.682 5.14299 4.907 4.52599 5.525C3.90699 6.143 3.68199 6.895 3.58599 7.605C3.49999 8.251 3.49999 9.045 3.49999 9.911V10.193C3.0287 9.80986 2.6493 9.32593 2.38971 8.77682C2.13012 8.2277 1.99695 7.62737 1.99999 7.02C1.99999 4.8 3.74099 3 5.88899 3Z"
                                    fill="black" />
                            </svg>
                            <span id="show" class="text-[12px] md:text-[18px] ml-4 ">Pinjaman</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('users/angsuran') }}"
                            class="parent  {{ Request::path() == 'users/angsuran' ? 'bg-[#F1DEC9]' : '' }}  hover:bg-[#F1DEC9]  -ml-2 p-4 w-auto h-12 mt-2 flex items-center rounded-md duration-300 cursor-pointer   font-semibold shadow relative">
                            <h1
                                class="{{ Request::path() == 'users/angsuran' ? 'active' : 'opacity-0' }}  bg-red-400bg-[#345C6D]    w-1 h-full  absolute left-0 child">
                            </h1>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5.25 4.5C4.25544 4.5 3.30161 4.89509 2.59835 5.59835C1.89509 6.30161 1.5 7.25544 1.5 8.25V9H22.5V8.25C22.5 7.25544 22.1049 6.30161 21.4016 5.59835C20.6984 4.89509 19.7446 4.5 18.75 4.5H5.25ZM22.5 10.5H1.5V15.75C1.5 16.7446 1.89509 17.6984 2.59835 18.4017C3.30161 19.1049 4.25544 19.5 5.25 19.5H18.75C19.7446 19.5 20.6984 19.1049 21.4016 18.4017C22.1049 17.6984 22.5 16.7446 22.5 15.75V10.5ZM15.75 15H18.75C18.9489 15 19.1397 15.079 19.2803 15.2197C19.421 15.3603 19.5 15.5511 19.5 15.75C19.5 15.9489 19.421 16.1397 19.2803 16.2803C19.1397 16.421 18.9489 16.5 18.75 16.5H15.75C15.5511 16.5 15.3603 16.421 15.2197 16.2803C15.079 16.1397 15 15.9489 15 15.75C15 15.5511 15.079 15.3603 15.2197 15.2197C15.3603 15.079 15.5511 15 15.75 15Z"
                                    fill="black" />
                            </svg>
                            <span id="show" class="text-[12px] md:text-[18px] ml-4 ">Angsuran</span>
                        </a>
                    </li>
                @endif


            @endif
            <li>
                <a href="{{ Auth::check() ? url('actionlogout') : url('login') }}"
                    class="parent {{ Request::path() == 'logout' || Request::path() == 'login' ? 'bg-[#F1DEC9]' : '' }} hover:bg-[#F1DEC9] -ml-2 p-4 w-auto h-12 mt-2 flex items-center rounded-md duration-300 cursor-pointer top-10 font-semibold shadow relative">
                    <h1
                        class="{{ Request::path() == 'logout' || Request::path() == 'login' ? 'active' : 'opacity-0' }} bg-red-400 bg-[#345C6D] w-1 h-full absolute left-0 child">
                    </h1>
                    <svg width="35" height="35" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg" stroke="#fff">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M2.00098 11.999L16.001 11.999M16.001 11.999L12.501 8.99902M16.001 11.999L12.501 14.999"
                                stroke="black" stroke-width="1.5" />
                            <path
                                d="M9.00195 7C9.01406 4.82497 9.11051 3.64706 9.87889 2.87868C10.7576 2 12.1718 2 15.0002 2L16.0002 2C18.8286 2 20.2429 2 21.1215 2.87868C22.0002 3.75736 22.0002 5.17157 22.0002 8L22.0002 16C22.0002 18.8284 22.0002 20.2426 21.1215 21.1213C20.3531 21.8897 19.1752 21.9862 17 21.9983M9.00195 17C9.01406 19.175 9.11051 20.3529 9.87889 21.1213C10.5202 21.7626 11.4467 21.9359 13 21.9827"
                                stroke="black" stroke-width="1.5" stroke-linecap="round" />
                        </g>
                    </svg>
                    <span id="show" class="text-[12px] md:text-[18px] ml-4 " data-modal-target="logoutModal"
                        data-modal-toggle="logoutModal" type="button">
                        {{ Auth::check() ? 'Logout' : 'Login' }}
                    </span>

                </a>
            </li>
            <li>
                <button class="parent -ml-2 p-4 w-auto h-12 mt-2 flex items-center rounded-md duration-300 cursor-pointer top-10 font-semibold shadow relative" id="logoutModal" data-modal-target="logoutModal" data-modal-toggle="logoutModal"
                    type="button">
                    <svg width="35" height="35" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg" stroke="#fff">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M2.00098 11.999L16.001 11.999M16.001 11.999L12.501 8.99902M16.001 11.999L12.501 14.999"
                                stroke="black" stroke-width="1.5" />
                            <path
                                d="M9.00195 7C9.01406 4.82497 9.11051 3.64706 9.87889 2.87868C10.7576 2 12.1718 2 15.0002 2L16.0002 2C18.8286 2 20.2429 2 21.1215 2.87868C22.0002 3.75736 22.0002 5.17157 22.0002 8L22.0002 16C22.0002 18.8284 22.0002 20.2426 21.1215 21.1213C20.3531 21.8897 19.1752 21.9862 17 21.9983M9.00195 17C9.01406 19.175 9.11051 20.3529 9.87889 21.1213C10.5202 21.7626 11.4467 21.9359 13 21.9827"
                                stroke="black" stroke-width="1.5" stroke-linecap="round" />
                        </g>
                    </svg>
                    <span > {{ Auth::check() ? 'Logout' : 'Login' }}
                    </span>
                </button>

                <!-- Modal for Logout -->
                <div id="logoutModal" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div
                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="font-semibold text-gray-900 dark:text-white">
                                    Konfirmasi Logout
                                </h3>
                                <button type="button"
                                    class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="logoutModal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 md:p-5">
                                <p>Apakah Anda yakin ingin logout?</p>
                                <form action="" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="w-full mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>

</div>

<script>
    function toggleDropdown(id) {
        var element = document.getElementById(id);
        if (element.classList.contains('hidden')) {
            element.classList.remove('hidden');
            element.classList.add('block');
        } else {
            element.classList.remove('block');
            element.classList.add('hidden');
        }
    }
</script>


<script>
    const sidebar = document.getElementById('sidebar');
    const toggleSidebar = document.getElementById('toggleSidebar');
    const sidebarMenu = document.getElementById('sidebarMenu');
    const sidebarText = document.querySelectorAll('#sidebarMenu > li > a > span, #greetingText');
    const sidebarlogout = document.querySelectorAll('#sidebarMenu > li > button > span, #greetingText');
    let isOpen = true;

    function updateSidebarWidth() {
        const screenWidth = window.innerWidth;
        if (!isOpen) {
            sidebar.style.width = screenWidth < 668 ? '50%' : '20%';
            sidebar.style.left = screenWidth < 668 ? '0px' : '0px';
            sidebar.style.zIndex = '10';
            sidebarMenu.classList.add('show');
            sidebarText.forEach(text => text.classList.remove('hide'));
            sidebarlogout.forEach(text => text.classList.remove('hide'));
        } else {
            sidebar.style.width = '70px';
            sidebar.style.left = screenWidth < 668 ? '0px' : '0px';
            sidebar.style.zIndex = '200';
            sidebarMenu.classList.remove('show');
            sidebarText.forEach(text => text.classList.add('hide'));
            sidebarLogout.forEach(text => text.classList.add('hide'));
        }
    }


    toggleSidebar.addEventListener('click', function() {
        isOpen = !isOpen;
        updateSidebarWidth();
    });

    updateSidebarWidth();
    window.addEventListener('resize', updateSidebarWidth);
</script>

<style>
    #sidebarMenu.show #show {
        display: block;
    }

    #sidebarMenu #show.hide {
        display: none;
    }

    #sidebarMenu.show #show,
    #greetingText.show {
        display: block;
    }

    .text-black.hide,
    #greetingText.hide {
        display: none;
    }
</style>
