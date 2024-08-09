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
                    <h3>KEJAKSAAN REPUBLIK INDONESIA</h3>
                    <h3>KEJAKSAAN TINGGI SUMATERA BARAT</h3>
                    <h2>KEJAKSAAN NEGERI PAYAKUMBUH</h2>
                    <p>JL. Soekarno Hatta No. 215 Kec. Payakumbuh Barat Kota Payakumbuh</p>
                    <p>Telp. (0752) 92019 Fax (0752) 92019 email: <a
                            href="mailto:kejari.payakumbuh@kejaksaan.go.id">kejari.payakumbuh@kejaksaan.go.id</a></p>
                </td>
            </tr>
        </table>
        <hr>

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
                    <th scope="col" class="px-3 py-3">Simpanan Wajib</th>
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

                            $simpananPertama = $anggota->simpanans()->orderBy('tanggal_simpanan')->first();
                            $simpananPokok = 0;

                            if ($simpananPertama) {
                                $bulanSimpananPertama = \Carbon\Carbon::parse(
                                    $simpananPertama->tanggal_simpanan,
                                )->format('m');
                                $bulanDipilih = str_pad((int) request('bulan'), 2, '0', STR_PAD_LEFT);

                                if ($bulanSimpananPertama === $bulanDipilih) {
                                    $simpananPokok = $anggota->simpanan;
                                }
                            }

                            $totalSimpananWajib = $simpanans
                                ->where('id_anggota', $item->id_anggota)
                                ->sum('simpanan_wajib');
                            $totalSimpanan = $simpananPokok + $totalSimpananWajib;

                            $totalWajib += $totalSimpananWajib;
                            $totalPokok += $simpananPokok;
                            $totalSemua += $totalSimpanan;
                        @endphp
                        <tr class="bg-[#D9D9D9] border-b">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
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
                    <tr class="bg-[#D9D9D9] border-t font-bold">
                        <td colspan="5" class="px-6 py-4">Total Kas Saldo</td>
                        <td class="px-6 py-4">{{ 'Rp ' . number_format($totalSemua - $totalPinjaman, 0, ',', '.') }}
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>



    <table style="margin-top: 40px; border-collapse: collapse; border: none;" class="signature">
        <tr>
            <td style="border: none;">
                <p>Mengetahui,</p>
                <p>Ketua Koperasi KPN Kejari Payakumbuh</p>
                <p class="name"><strong><u>(Yeni Firma Sutyani, S. H)</u></strong></p>
                <p><strong>NIP. 19750601 200012 2002</strong></p>
            </td>
            <td style="border: none;">
                <p class="date">Payakumbuh,
                    {{ \Carbon\Carbon::now()->setTimezone('Asia/Jakarta')->locale('id')->isoFormat('D MMMM YYYY') }}
                </p>
                <p>BENDAHARA</p>
                <p class="name"><strong><u>Ninit Sriaprila</u></strong></p>
            </td>
        </tr>
    </table>



</body>

</html>
