<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Download Data Simpanan PDF</title>

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
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
            width: 100%;
            border: none;
            margin-top: 20px;
        }

        .data-table .label {
            font-weight: bold;
            vertical-align: top;
            text-align: left;
            border: none;
        }

        .data-table .value {
            vertical-align: top;
            text-align: left;
            border: none;
        }
    </style>
</head>

<body>

    <div class="header">
        <h3>Laporan SHU (Sisa Hasil Usaha)</h3>
        <h3>Koperasi Simpan Pinjam Kejaksaan Negeri Payakumbuh</h3>
        <h3>Tahun: {{ $tahun }}</h3>
    </div>

    <table>
        <tbody>
            <tr>
                <td>Tahun</td>
                <td>{{ $tahun }}</td>
            </tr>
            <tr>
                <td>Jumlah Anggota</td>
                <td>{{ $jumlahAnggota }}</td>
            </tr>
            <tr>
                <td>Total Bunga Pinjaman</td>
                <td>{{ 'Rp ' . number_format($totalBunga, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td>10% Total Bunga Pinjaman</td>
                <td>{{ 'Rp ' . number_format($persenBunga, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Total SHU</td>
                <td>{{ 'Rp ' . number_format($shu, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>

</body>

</html>
