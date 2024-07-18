@extends('layouts.master')
@section('content')
    <div class="lg:w-[90%] px-10 mt-10 mx-auto space-y-10">
        <form id="filterForm" class="flex space-x-10 items-center" method="GET" action="{{ route('laporanSHU.index') }}">
            <div class="">
                <label for="tahun" class="w-36 block mb-2 text-sm font-semibold mt-3 text-gray-900">Pilih Tahun:</label>
                <select name="tahun" id="tahun"
                    class="bg-gray-50 h-12 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="" disabled selected>Pilih Tahun</option>
                    @foreach (range(date('Y'), date('Y') + 10) as $year)
                        <option value="{{ $year }}" {{ request('tahun') == $year ? 'selected' : '' }}>
                            {{ $year }}
                        </option>
                    @endforeach
                </select>
            </div>
            <input type="hidden" id="isPrint" name="isPrint" value="0">
            <div class="flex items-center space-x-5 mt-10">
                <button type="button" id="printButton" class="flex border-2 border-[#A4907C] rounded-lg py-3 px-5">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M18 17.25H19.125C19.6218 17.2485 20.0979 17.0505 20.4492 16.6992C20.8005 16.3479 20.9985 15.8718 21 15.375V7.875C20.9985 7.37818 20.8005 6.90212 20.4492 6.55081C20.0979 6.1995 19.6218 6.00148 19.125 6H4.875C4.37818 6.00148 3.90212 6.1995 3.55081 6.55081C3.1995 6.90212 3.00148 7.37818 3 7.875V15.375C3.00148 15.8718 3.1995 16.3479 3.55081 16.6992C3.90212 17.0505 4.37818 17.2485 4.875 17.25H6"
                            stroke="#7D0A0A" stroke-width="1.5" stroke-linejoin="round" />
                        <path
                            d="M16.86 11.25H7.14C6.5104 11.25 6 11.7604 6 12.39V19.86C6 20.4896 6.5104 21 7.14 21H16.86C17.4896 21 18 20.4896 18 19.86V12.39C18 11.7604 17.4896 11.25 16.86 11.25Z"
                            stroke="#7D0A0A" stroke-width="1.5" stroke-linejoin="round" />
                        <path
                            d="M18 6V4.875C17.9985 4.37818 17.8005 3.90212 17.4492 3.55081C17.0979 3.1995 16.6218 3.00148 16.125 3H7.875C7.37818 3.00148 6.90212 3.1995 6.55081 3.55081C6.1995 3.90212 6.00148 4.37818 6 4.875V6"
                            stroke="#7D0A0A" stroke-width="1.5" stroke-linejoin="round" />
                        <path
                            d="M18.375 9.75C18.9963 9.75 19.5 9.24632 19.5 8.625C19.5 8.00368 18.9963 7.5 18.375 7.5C17.7537 7.5 17.25 8.00368 17.25 8.625C17.25 9.24632 17.7537 9.75 18.375 9.75Z"
                            fill="#7D0A0A" />
                    </svg>
                    <span>Print</span>
                </button>
            </div>
        </form>

        <script>
            document.getElementById('tahun').addEventListener('change', function() {
                document.getElementById('filterForm').submit();
            });

            document.getElementById('printButton').addEventListener('click', function() {
                const form = document.getElementById('filterForm');
                document.getElementById('isPrint').value = 1;
                form.action = '{{route('printSHU.index')}}';
                form.submit();
            });
        </script>

        <div class="flex justify-center py-8 relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="min-w-full border-collapse border">
                <tbody>
                    <tr>
                        <td class="px-4 w-1/2 py-2 border">Tahun</td>
                        <td class="px-4 py-2 border">{{$tahun}}</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 border">Jumlah Anggota</td>
                        <td class="px-4 py-2 border">{{$jumlahAnggota}}</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 border">Total Bunga Pinjaman</td>
                        <td class="px-4 py-2 border"> {{ 'Rp ' . number_format($totalBunga, 0, ',', '.') }}
                        </td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 border">10% Total Bunga Pinjaman</td>
                        <td class="px-4 py-2 border">{{ 'Rp ' . number_format($persenBunga, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 border">Total SHU</td>
                        <td class="px-4 py-2 border">{{ 'Rp ' . number_format($shu, 0, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
