<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Download Data Simpanan PDF</title>
    {{-- <link rel="stylesheet" href="assets/library/tailwind.css"> --}}

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

        .pl-6 {
            padding-left: 1rem;
        }

        .data-table {
            width: 50%;
            border: none;
        }
        .data-table .label {
            width: 50px;
            font-weight: bold;
            vertical-align: top;
            text-align: left;
            border: none;

        }
        .data-table .value {
            width: 100px;
            vertical-align: top;
            text-align: left;
            border: none;

        }
    </style>
</head>

<body>

    <div class="header">
        <div style="text-align: center;">

            <h3>Laporan S</h3>
            <h3>Koperasi Simpan Pinjam Kejaksaan Negeri Payakumbuh</h3>
            <h3>Bulan: {{ $tahun }}</h3>
        </div>

    </div>

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

</body>

</html>
