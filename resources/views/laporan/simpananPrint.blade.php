<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Download Data Simpanan PDF</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            text-align: center;
        }

        .header-table {
            width: 100%;
            margin-bottom: 20px;
            text-align: center;
            border: none;
        }

        .header-table img {
            width: 100px;
        }

        .header-table h1,
        .header-table h2,
        .header-table h3,
        .header-table p {
            margin: 0;
        }

        .header-table td {
            border: none;
        }
    </style>
</head>

<body>

    <div class="header">
        <div style="text-align: center;">

            <h3>Laporan Simpanan </h3>
            <h3>Koperasi Simpan Pinjam Kejaksaan Negeri Payakumbuh</h3>
            <h3>Bulan: {{ $namaBulan }}</h3>
        </div>

    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 bg-[#D9D9D9]">
            <thead class="text-xs text-gray-700 uppercase bg-[#D9D9D9]">
                <tr>
                    <th scope="col" class="px-6 py-3">No</th>
                    <th scope="col" class="px-6 py-3">Data Anggota</th>
                    <th scope="col" class="px-6 py-3">Tanggal Simpanan</th>
                    <th scope="col" class="px-6 py-3">Simpanan Pokok</th>
                    <th scope="col" class="px-6 py-3">Simpanan Wajib</th>
                    <th scope="col" class="px-6 py-3">Total</th>
                </tr>
            </thead>
            <tbody>
                @if ($simpanans->isEmpty())
                    <tr>
                        <td colspan="7" class="text-center py-4">Tidak ada data simpanan yang tersedia.</td>
                    </tr>
                @else
                    @php
                        $totalWajib = 0;
                        $totalPokok = 0;
                        $totalSemua = 0;
                    @endphp
                    @foreach ($simpanans->unique('id_anggota') as $item)
                        @php
                            $anggota = $item->anggota;
                            if (!$anggota) {
                                continue;
                            }
                            $totalSimpananWajib = $simpanans->where('id_anggota', $item->id_anggota)->sum('simpanan_wajib');
                            $simpananPokok = $anggota->simpanan;
                            $totalSimpanan = $anggota->simpanan + $totalSimpananWajib;

                            $totalWajib += $totalSimpananWajib;
                            $totalPokok += $simpananPokok;
                            $totalSemua += $totalSimpanan;
                        @endphp
                        <tr class="bg-[#D9D9D9] border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $loop->iteration }}
                            </th>
                            <td class="px-6 py-4">{{ $anggota->nip }} - {{ $anggota->user->name }}</td>
                            <td class="px-6 py-4">
                                @foreach ($simpanans->where('id_anggota', $item->id_anggota) as $simpanan)
                                    {{ $simpanan->tanggal_simpanan }}<br>
                                @endforeach
                            </td>
                            <td class="px-6 py-4">
                                {{ 'Rp ' . number_format($simpananPokok, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4">
                                {{ 'Rp ' . number_format($totalSimpananWajib, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4">
                                {{ 'Rp ' . number_format($totalSimpanan, 0, ',', '.') }}
                            </td>
                        </tr>
                    @endforeach
                    <tr class="bg-[#D9D9D9] border-t font-bold">
                        <td colspan="3" class="px-6 py-4 text-right">Total</td>
                        <td class="px-6 py-4">{{ 'Rp ' . number_format($totalPokok, 0, ',', '.') }}</td>
                        <td class="px-6 py-4">{{ 'Rp ' . number_format($totalWajib, 0, ',', '.') }}</td>
                        <td class="px-6 py-4">{{ 'Rp ' . number_format($totalSemua, 0, ',', '.') }}</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

</body>

</html>
