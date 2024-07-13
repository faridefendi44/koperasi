<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Angsuran Pinjaman Koperasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

       

        th,
        td {
            padding: 5px;
        }

        th {
            background-color: #f2f2f2;
        }

        .header {
            text-align: center;

        }

        .signature {
            height: 100px;
            vertical-align: bottom;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="header">
        <h5>DAFTAR ANGSURAN PINJAMAN KOPERASI</h5>
        <p>KEJAKSAAN NEGERI PAYAKUMBUH</p>
    </div>
    <table style="width: 50%; border: none;">
        <tr>
            <td style="width: 150px;"><strong>Nama</strong></td>
            <td>: {{ $pinjamans->anggota->user->name }}</td>
        </tr>
        <tr>
            <td><strong>Jumlah Pinjaman</strong></td>
            <td>: {{ 'Rp ' . number_format($pinjamans->jumlah_pinjaman, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td><strong>Jangka Waktu</strong></td>
            <td>: {{ $pinjamans->jangka_waktu }}</td>
        </tr>
        <tr>
            <td><strong>Angsuran Pokok</strong></td>
            <td>: {{ 'Rp ' . number_format($angsuranPokok, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td><strong>Bulan Pinjaman</strong></td>
            <td>: {{ \Carbon\Carbon::parse($pinjamans->created_at)->setTimezone('Asia/Jakarta')->locale('id')->isoFormat('MMMM YYYY') }}
            </td>
        </tr>
        <tr>
            <td><strong>Cicilan Pertama</strong></td>
            <td>: {{ \Carbon\Carbon::parse($cicilanPertama)->setTimezone('Asia/Jakarta')->locale('id')->isoFormat('MMMM YYYY') }}
            </td>
        </tr>
    </table>

    <table style="border: 1px solid black;">
        style="border: 1px solid black;"ead>
        <tr>
            <th style="text-align: center; border: 1px solid black;">No</th>
            <th style="text-align: center; border: 1px solid black;">Jumlah Sisa</th>
            <th style="text-align: center; border: 1px solid black;">Jumlah Cicilan</th>
            <th style="text-align: center; border: 1px solid black;">Bunga</th>
            <th style="text-align: center; border: 1px solid black;">Jumlah</th>
            <th style="text-align: center; border: 1px solid black;">Kett</th>
        </tr>
        </thead>

        <tbody>
            @php
                $totalJumlahSisa = 0;
                $totalAngsuranPokok = 0;
                $totalBunga = 0;
                $totalAngsuran = 0;
            @endphp

            @foreach ($pinjamans->angsuran as $angsuran)
                @php
                    $totalJumlahSisa += $angsuran->jumlah_sisa;
                    $totalAngsuranPokok += $angsuran->angsuran_pokok;
                    $totalBunga += $angsuran->bunga;
                    $totalAngsuran += $angsuran->total_angsuran;
                @endphp

                <tr class="bg-[#D9D9D9] border-b">
                    <th style='text-align: center; style="border: 1px solid black;"' scope="row"
                        class="">
                        {{ $loop->iteration }}
                    </th>

                    <td style="text-align: center; border: 1px solid black;" class="">
                        {{ 'Rp ' . number_format($angsuran->jumlah_sisa, 0, ',', '.') }}
                    </td>
                    <td style="text-align: center; border: 1px solid black;" class="">
                        {{ 'Rp ' . number_format($angsuran->angsuran_pokok, 0, ',', '.') }}
                    </td>
                    <td style="text-align: center; border: 1px solid black;" class="">
                        {{ 'Rp ' . number_format($angsuran->bunga, 0, ',', '.') }}
                    </td>
                    <td style="text-align: center; border: 1px solid black;" class="">
                        {{ 'Rp ' . number_format($angsuran->total_angsuran, 0, ',', '.') }}
                    </td>
                    <td style="text-align: center; border: 1px solid black;" class="px-6 py-4">
                        {{ \Carbon\Carbon::parse($angsuran->tanggal_angsuran)->format('m/Y') }}
                    </td>

                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr class="">
                <th style="text-align: center; border: 1px solid black;" scope="row" class="">
                    Total
                </th>
                <td style="text-align: center; border: 1px solid black;" class="">
                    {{-- {{ 'Rp ' . number_format($totalJumlahSisa, 0, ',', '.') }} --}}
                </td>
                <td style="text-align: center; border: 1px solid black;" class="">
                    {{ 'Rp ' . number_format($totalAngsuranPokok, 0, ',', '.') }}
                </td>
                <td style="text-align: center; border: 1px solid black;" class="">
                    {{ 'Rp ' . number_format($totalBunga, 0, ',', '.') }}
                </td>
                <td style="text-align: center; border: 1px solid black;" class="">
                    {{ 'Rp ' . number_format($totalAngsuran, 0, ',', '.') }}
                </td>
                <td style="text-align: center; border: 1px solid black;" class="">
                    <!-- Kosong atau teks yang diinginkan -->
                </td>
            </tr>
        </tfoot>
        <tfoot>
            <td style="text-align: center; border: 1px solid black;"></td>
            <td style="text-align: center; border: 1px solid black;"></td>
            <td style="text-align: center; border: 1px solid black;"></td>
            <td style="text-align: center; border: 1px solid black;"></td>
            <td style="text-align: center; border: 1px solid black;">
                {{ 'Rp ' . number_format($pinjamans->jumlah_pinjaman - 200000, 0, ',', '.') }}
            </td>
            <td style="text-align: center; border: 1px solid black;"></td>
        </tfoot>

    </table>

    <div class="">
        <table>
            <tr>
                <td class="signature">
                    <p>Peminjam</p>
                    <div class="" style="margin-top: 60px;">
                        <p class="font-bold">{{ $pinjamans->anggota->user->name }}</p>
                    </div>
                </td>
                <td class="signature">
                    <p>Payakumbuh,{{ \Carbon\Carbon::parse($pinjamans->created_at)->setTimezone('Asia/Jakarta')->locale('id')->isoFormat('D MMMM YYYY') }}
                    </p>
                    <p>Bendahara,</p>
                    <div class="" style="margin-top: 60px;">
                        <p class="font-bold">Ninit Sriaprila</p>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
