<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Download Data Tahunan SHU (Sisa Hasil Usaha) PDF</title>

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

        .header-table p{
            font-size: 13px;
        }

        .signature {
            width: 95%;
            margin-top: 50px;
            text-align: right;
            position: relative;
        }

        .signature p {
            margin: 0;
            line-height: 1.5;
        }

        .signature .date {
            text-align: right;
        }

        .signature .name {
            margin-top: 80px;
            text-align: right;
        }
    </style>
</head>

<body>

    <div class="header">
        <table class="header-table">
            <tr>
                <td style="width: 20%;">
                    <img src="img/Kejaksaan_Agung_Republik_Indonesia_new_logo 1.png" alt="Logo">
                </td>
                <td style="width: 80%;">
                    <h3><strong>KEJAKSAAN REPUBLIK INDONESIA</strong></h3>
                    <h3><strong>KEJAKSAAN TINGGI SUMATERA BARAT</strong></h3>
                    <h2><strong>KEJAKSAAN NEGERI PAYAKUMBUH</strong></h2>
                    <p>JL. Soekarno Hatta No. 215 Kec. Payakumbuh Barat Kota Payakumbuh</p>
                    <p>Telp. (0752) 92019 Fax (0752) 92019 email: <a
                            href="mailto:kejari.payakumbuh@kejaksaan.go.id">kejari.payakumbuh@kejaksaan.go.id</a></p>
                </td>
            </tr>
        </table>
        <hr>

        <h3>Laporan SHU (Sisa Hasil Usaha)</h3>
        <h3>Koperasi Simpan Pinjam Kejaksaan Negeri Payakumbuh</h3>
        <h3>Tahun: {{ $tahun }}</h3>
    </div>

    <br>
    <table>
        <tbody>
            <tr>
                <td><strong>Tahun</strong></td>
                <td>{{ $tahun }}</td>
            </tr>
            <tr>
                <td><strong>Jumlah Anggota</strong></td>
                <td>{{ $jumlahAnggota }}</td>
            </tr>
            <tr>
                <td><strong>Total Bunga Pinjaman</strong></td>
                <td>{{ 'Rp ' . number_format($totalBunga, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td><strong>10% Total Bunga Pinjaman</strong></td>
                <td>{{ 'Rp ' . number_format($persenBunga, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td><strong>Total SHU</strong></td>
                <td>{{ 'Rp ' . number_format($shu, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>

    <div class="signature">
        <p class="date">Payakumbuh, {{ \Carbon\Carbon::now()->setTimezone('Asia/Jakarta')->locale('id')->isoFormat('D MMMM YYYY') }}</p>
        <p>BENDAHARA</p>
        <p class="name"><strong><u>Ninit Sriaprila</u></strong></p>
    </div>

</body>

</html>
