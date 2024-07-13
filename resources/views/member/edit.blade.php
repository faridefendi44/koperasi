@extends('layouts.master')
@section('content')
    <div class="w-4/5  mx-auto space-y-10">
        <div class="mx-auto  bg-white shadow-lg rounded-lg  p-10   my-auto justify-center w-full">
            <h1 class="text-3xl font-semibold">Edit Anggota Koperasi</h1>
            <div class="mt-5">
                <a href="all"
                    class="bg-[#A94438] flex space-x-3 text-md font-semibold w-fit text-center   py-3 px-5 rounded-lg">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 4C7.26522 4 7.51957 4.10536 7.70711 4.29289C7.89464 4.48043 8 4.73478 8 5V11.333L18.223 4.518C18.2983 4.4679 18.3858 4.43915 18.4761 4.43483C18.5664 4.43051 18.6563 4.45077 18.736 4.49346C18.8157 4.53615 18.8824 4.59966 18.9289 4.67724C18.9754 4.75482 19 4.84356 19 4.934V19.066C19 19.1564 18.9754 19.2452 18.9289 19.3228C18.8824 19.4003 18.8157 19.4639 18.736 19.5065C18.6563 19.5492 18.5664 19.5695 18.4761 19.5652C18.3858 19.5608 18.2983 19.5321 18.223 19.482L8 12.667V19C8 19.2652 7.89464 19.5196 7.70711 19.7071C7.51957 19.8946 7.26522 20 7 20C6.73478 20 6.48043 19.8946 6.29289 19.7071C6.10536 19.5196 6 19.2652 6 19V5C6 4.73478 6.10536 4.48043 6.29289 4.29289C6.48043 4.10536 6.73478 4 7 4ZM17 7.737L10.606 12L17 16.263V7.737Z" fill="white"/>
                        </svg>

                        <span class="text-white">
                            Kembali
                        </span>
                    </a>
            </div>
            <form class="lg:w-4/5 justify-center mx-auto space-y-6 mt-10" action="{{ route('member.update', $member->id) }}"
                method="POST">
                @csrf
                @method('PUT')

                <div class="flex justify-around space-x-10">
                    <label for="countries" class="w-36 block mb-2 text-sm font-semibold mt-3 text-gray-900">Nama Anggota</label>
                    <select name="id_user" class="bg-gray-50 h-12 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option disabled>Pilih nama anggota koperasi</option>
                        @foreach ($users as $item)
                            <option value="{{ $item->id }}" {{ $item->id == $member->user->id ? 'selected' : '' }}>
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex justify-around space-x-10">
                    <label for="first_name" class="w-36 font-semibold block mt-3 text-sm text-gray-900 ">NIP</label>
                    <input name="nip" type="text" id="nip" value="{{$member->nip}}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 h-12"
                        placeholder="Ketik nip anggota" required />
                </div>
                <div class="flex justify-around space-x-10">
                    <label for="first_name" class="w-36 font-semibold block mt-3 text-sm text-gray-900 ">Golongan</label>
                    <input name="golongan" type="text" id="golongan" value="{{$member->golongan}}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 h-12"
                        placeholder="Ketik golongan anggota" required />
                </div>
                <div class="flex justify-around space-x-10">
                    <label for="first_name" class="w-36 font-semibold block mt-3 text-sm text-gray-900 ">Pangkat</label>
                    <input name="pangkat" type="text" id="golongan" value="{{$member->pangkat}}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 h-12"
                        placeholder="Ketik pangkat anggota" required />
                </div>
                <div class="flex justify-around space-x-10">
                    <label for="first_name" class="w-36 font-semibold block mt-3 text-sm text-gray-900 ">Jabatan</label>
                    <input name="jabatan" type="text" id="golongan" value="{{$member->jabatan}}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 h-12"
                        placeholder="Ketik jabatan anggota" required />
                </div>
                <div class="flex justify-around space-x-10">
                    <label for="first_name" class="w-36 font-semibold block mt-3 text-sm text-gray-900 ">Bidang</label>
                    <input name="bidang" type="text" id="bidang" value="{{$member->bidang}}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 h-12"
                        placeholder="Ketik bidang anggota" required />
                </div>
                <div class="flex justify-around space-x-10">
                    <label for="first_name" class="w-36 font-semibold block mt-3 text-sm text-gray-900 ">Jumlah Gaji</label>
                    <input name="gaji" type="number" id="gaji" value="{{$member->gaji}}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 h-12"
                        placeholder="Ketik gaji anggota" required />
                </div>

                <div class="flex justify-around space-x-10">
                    <label for="first_name" class="w-36 font-semibold block mt-3 text-sm text-gray-900 ">Alamat</label>
                    <input name="alamat" type="text" id="alamat" value="{{$member->alamat}}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 h-12"
                        placeholder="Ketik alamat anggota" required />
                </div>

                </h1>

                <div>
                    <button
                        class="bg-[#A98F03] flex space-x-3 text-md font-semibold w-fit text-center   py-3 px-5 rounded-lg">

                        <span class="text-white">
                            Submit
                        </span>
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection
