@extends('layouts.master')
@section('content')
    <div class="w-4/5  mx-auto space-y-10">
        <div class="mx-auto  bg-white shadow-lg rounded-lg  p-10   my-auto justify-center w-full">
            <h1 class="text-3xl font-semibold">Edit Akun</h1>
            <div class="mt-5">
                <a href="all"
                    class="bg-[#A94438] flex space-x-3 text-md font-semibold w-fit text-center   py-3 px-5 rounded-lg">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7 4C7.26522 4 7.51957 4.10536 7.70711 4.29289C7.89464 4.48043 8 4.73478 8 5V11.333L18.223 4.518C18.2983 4.4679 18.3858 4.43915 18.4761 4.43483C18.5664 4.43051 18.6563 4.45077 18.736 4.49346C18.8157 4.53615 18.8824 4.59966 18.9289 4.67724C18.9754 4.75482 19 4.84356 19 4.934V19.066C19 19.1564 18.9754 19.2452 18.9289 19.3228C18.8824 19.4003 18.8157 19.4639 18.736 19.5065C18.6563 19.5492 18.5664 19.5695 18.4761 19.5652C18.3858 19.5608 18.2983 19.5321 18.223 19.482L8 12.667V19C8 19.2652 7.89464 19.5196 7.70711 19.7071C7.51957 19.8946 7.26522 20 7 20C6.73478 20 6.48043 19.8946 6.29289 19.7071C6.10536 19.5196 6 19.2652 6 19V5C6 4.73478 6.10536 4.48043 6.29289 4.29289C6.48043 4.10536 6.73478 4 7 4ZM17 7.737L10.606 12L17 16.263V7.737Z"
                            fill="white" />
                    </svg>

                    <span class="text-white">
                        Kembali
                    </span>
                </a>
            </div>
            <form class="py-10 space-y-5" action="{{route('akun.update',$user->id)}}" method="POST">
                @csrf
                @method("PUT")
                <div class="flex justify-around space-x-10">
                    <label for="first_name" class="w-36 font-semibold block mt-3 text-sm text-gray-900 ">Nama
                        Anggota</label>
                    <input value="{{$user->name}}" type="text" name="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 h-12"
                        placeholder="Ketik nama " required />
                </div>
                <div class="flex justify-around space-x-10">
                    <label for="first_name" class="w-36 font-semibold block mt-3 text-sm text-gray-900 ">Username</label>
                    <input value="{{$user->username}}" type="text" name="username"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 h-12"
                        placeholder="Ketik username" required />
                </div>
                <div class="flex justify-around space-x-10">
                    <label for="first_name" class="w-36 font-semibold block mt-3 text-sm text-gray-900 ">Email</label>
                    <input value="{{$user->email}}" type="text" name="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 h-12"
                        placeholder="Ketik email" required />
                </div>
                <div class="flex justify-around space-x-10">
                    <label for="first_name" class="w-36 font-semibold block mt-3 text-sm text-gray-900 ">No Whatsapp</label>
                    <input type="number" name="no_wa" value="{{$user->no_wa}}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 h-12"
                        placeholder="628123456789" />
                </div>
                <div class="flex justify-around space-x-10">
                    <label for="countries" class="w-36 block mb-2 text-sm font-semibold mt-3 text-gray-900 ">Role</label>
                    <select name="role"
                        class="bg-gray-50 h-12 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option disabled>Pilih role pengguna</option>
                        <option selected value="{{$user->role}}">{{$user->name}}"</option>
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <div class="flex justify-around space-x-10">
                    <label for="first_name" class="w-36 font-semibold block mt-3 text-sm text-gray-900 ">Password</label>
                    <input  type="password" name="password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 h-12"
                        placeholder="Kosongkan password jika tidak ingin diubah" />
                </div>
                <div>
                    <button
                        class="bg-[#56ED31] flex space-x-3 text-md font-semibold w-fit text-center   py-3 px-5 rounded-lg">
                        <svg class="text-white mt-[1px]" width="20" height="20" viewBox="0 0 24 24" fill="#fff"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_79_186)">
                                <path
                                    d="M12.75 2.25C12.75 1.65326 12.9871 1.08097 13.409 0.65901C13.831 0.237053 14.4033 0 15 0L21 0C21.7956 0 22.5587 0.316071 23.1213 0.87868C23.6839 1.44129 24 2.20435 24 3V21C24 21.7956 23.6839 22.5587 23.1213 23.1213C22.5587 23.6839 21.7956 24 21 24H3C2.20435 24 1.44129 23.6839 0.87868 23.1213C0.316071 22.5587 0 21.7956 0 21V3C0 2.20435 0.316071 1.44129 0.87868 0.87868C1.44129 0.316071 2.20435 0 3 0L12 0C11.529 0.627 11.25 1.4055 11.25 2.25V13.9395L7.281 9.969C7.21127 9.89927 7.12848 9.84395 7.03738 9.80622C6.94627 9.76848 6.84862 9.74905 6.75 9.74905C6.65138 9.74905 6.55373 9.76848 6.46262 9.80622C6.37152 9.84395 6.28873 9.89927 6.219 9.969C6.14927 10.0387 6.09395 10.1215 6.05621 10.2126C6.01848 10.3037 5.99905 10.4014 5.99905 10.5C5.99905 10.5986 6.01848 10.6963 6.05621 10.7874C6.09395 10.8785 6.14927 10.9613 6.219 11.031L11.469 16.281C11.5387 16.3508 11.6214 16.4063 11.7125 16.4441C11.8037 16.4819 11.9013 16.5013 12 16.5013C12.0987 16.5013 12.1963 16.4819 12.2874 16.4441C12.3786 16.4063 12.4613 16.3508 12.531 16.281L17.781 11.031C17.9218 10.8902 18.0009 10.6992 18.0009 10.5C18.0009 10.3008 17.9218 10.1098 17.781 9.969C17.6402 9.82817 17.4492 9.74905 17.25 9.74905C17.0508 9.74905 16.8598 9.82817 16.719 9.969L12.75 13.9395V2.25Z"
                                    fill="black" />
                            </g>
                            <defs>
                                <clipPath id="clip0_79_186">
                                    <rect width="20" height="20" fill="#fff" />
                                </clipPath>
                            </defs>
                        </svg>
                        <span class="text-black">
                            Simpan
                        </span>
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection
