<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Download Data Pinjaman PDF</title>
    <link rel="stylesheet" href="assets/library/tailwind.css">

    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            width: 50%;
        }

        th,
        td {
            padding: 8px;
            text-align: center;
            width: 50%;
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

        .header-table p {
            font-size: 13px;
        }

        .header-table h3 {
            font-size: 20px;
        }

        .header-table h2 {
            font-size: 26px;
        }

        .signature {
            width: 100%;
            text-align: center;
            page-break-inside: avoid;

        }

        .signature p {
            margin: 0;
            line-height: 1.5;
        }

        .signature .name {
            margin-top: 80px;
        }



        .signature .date {
            margin-right: 25px;
            text-align: right;
        }

        @media print {
            body {
                width: 100%;
                height: 100%;
            }

            .page-break {
                page-break-before: always;
            }

            .header {
                page-break-after: avoid;
            }

            table {
                page-break-inside: auto;
                width: 100%;
                margin: auto;
            }

            tr {
                page-break-inside: avoid;
                page-break-after: auto;
            }

            td,
            th {
                page-break-inside: avoid;
            }

            .signature {
                page-break-inside: avoid;
                page-break-after: always;
            }
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
                    <p>Telp. (0752) 92019 Fax (0752) 92019 email: <a href="mailto:kejari.payakumbuh@kejaksaan.go.id">kejari.payakumbuh@kejaksaan.go.id</a></p>
                </td>
            </tr>
        </table>
        <hr>
        <br>

        <div style="text-align: center;">
            <h3><strong>Laporan Pinjaman</strong></h3>
            <h3><strong>Koperasi Simpan Pinjam Kejaksaan Negeri Payakumbuh</strong></h3>
            <h3><strong>Bulan: {{ $namaBulan }}</strong></h3>
            <br>
        </div>

    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 bg-[#D9D9D9]">
            <thead class="text-xs text-gray-700 uppercase bg-[#D9D9D9] ">
                <tr class="text-center">
                    <th scope="col" class="px-3 py-3">
                        No
                    </th>
                    <th scope="col" class="px-3 py-3">
                        Data Anggota
                    </th>
                    <th scope="col" class="px-3 py-3">
                        Tanggal Pinjaman
                    </th>
                    <th scope="col" class="px-3 py-3">
                        Jangka
                    </th>
                    <th scope="col" class="px-3 py-3">
                        Besar Pinjaman
                    </th>
                    <th scope="col" class="px-3 py-3">
                        Status
                    </th>
                </tr>
            </thead>

            <tbody>
                @if ($pinjamans->isEmpty())
                <tr>
                    <td colspan="7" class="text-center py-4">Tidak ada data pinjaman yang tersedia.</td>
                </tr>
                @else
                @foreach ($pinjamans as $item)
                <tr class="bg-[#D9D9D9] border-b text-center">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $loop->iteration + ($pinjamans->currentPage() - 1) * $pinjamans->perPage() }} </th>

                    </th>
                    <td class="">
                        <div class="">
                            <table class="data-table">
                                <tr>
                                    <td class="label">Nama</td>
                                    <td class="value">: {{ $item->anggota->user->name }}</td>
                                </tr>
                                <tr>
                                    <td class="label">NIP</td>
                                    <td class="value">: {{ $item->anggota->nip }}</td>
                                </tr>
                                <tr>
                                    <td class="label">Pangkat</td>
                                    <td class="value">: {{ $item->anggota->pangkat }}</td>
                                </tr>
                                <tr>
                                    <td class="label">Jabatan</td>
                                    <td class="value">: {{ $item->anggota->jabatan }}</td>
                                </tr>
                                <tr>
                                    <td class="label">Bidang</td>
                                    <td class="value">: {{ $item->anggota->bidang }}</td>
                                </tr>
                                <tr>
                                    <td class="label">Gaji</td>
                                    <td class="value">: {{ 'Rp ' . number_format($item->anggota->gaji, 0, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <td class="label">Alamat</td>
                                    <td class="value">: {{ $item->anggota->alamat }}</td>
                                </tr>
                            </table>
                        </div>
                    </td>

                    <td class="px-6 py-4">
                        {{ $item->tanggal_pinjaman }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->jangka_waktu }} bulan
                    </td>
                    <td class="px-6 py-4">
                        {{ 'Rp ' . number_format($item->jumlah_pinjaman, 0, ',', '.') }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->status }}
                    </td>
                    @endforeach
                    <tr class="bg-[#D9D9D9] border-t font-bold">
                        <td  class="px-6 py-4 text-right"></td>
                        <td  class="px-6 py-4 ">Total Kas Saldo</td>
                        <td  class="px-6 py-4 text-right"></td>
                        <td  class="px-6 py-4 text-right"></td>
                        <td  class="px-6 py-4 text-right"></td>
                        <td class="px-6 py-4">{{ 'Rp ' . number_format($totalSimpanan - $totalPinjaman, 0, ',', '.') }}</td>
                    </tr>
                    @endif

            </tbody>
        </table>
    </div>

    <table style="margin-top: 40px; border-collapse: collapse; border: none;" class="signature">
        <tr>
            <td style="border: none;">
                <p >Mengetahui,</p>
                <p>Ketua Koperasi KPN Kejari Payakumbuh</p>
                <p class="name"><strong><u>(Yeni Firma Sutyani, S. H)</u></strong></p>
                <p><strong>NIP. 19750601 200012 2002</strong></p>
            </td>
            <td style="border: none;">
                <p class="date">Payakumbuh,
                    {{ \Carbon\Carbon::now()->setTimezone('Asia/Jakarta')->locale('id')->isoFormat('D MMMM YYYY') }}</p>
                <p>BENDAHARA</p>
                <p class="name"><strong><u>Ninit Sriaprila</u></strong></p>
            </td>
        </tr>
    </table>

</body>

</html>
