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

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 5px;
            text-align: center;
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
    <p><strong>Nama:</strong> {{ $pinjamans->anggota->user->name }}</p>
    <p><strong>Jumlah Pinjaman:</strong>{{ 'Rp ' . number_format($pinjamans->jumlah_pinjaman, 0, ',', '.') }}
    </p>
    <p><strong>Jangka Waktu:</strong>{{ $pinjamans->jangka_waktu }}</p>
    <p><strong>Angsuran Pokok:</strong>{{ 'Rp ' . number_format($angsuranPokok, 0, ',', '.') }}</p>
    <p><strong>Bulan
            Pinjaman:</strong>{{ \Carbon\Carbon::parse($pinjamans->created_at)->setTimezone('Asia/Jakarta')->locale('id')->isoFormat(' MMMM YYYY') }}
    </p>
    <p><strong>Cicilan Pertama:</strong>
        {{ \Carbon\Carbon::parse($cicilanPertama)->setTimezone('Asia/Jakarta')->locale('id')->isoFormat(' MMMM YYYY') }}
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Jumlah Sisa</th>
                <th>Jumlah Cicilan</th>
                <th>Bunga</th>
                <th>Jumlah</th>
                <th>Kett</th>
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
                    <th scope="row" class="">
                        {{ $loop->iteration }}
                    </th>

                    <td class="">
                        {{ 'Rp ' . number_format($angsuran->jumlah_sisa, 0, ',', '.') }}
                    </td>
                    <td class="">
                        {{ 'Rp ' . number_format($angsuran->angsuran_pokok, 0, ',', '.') }}
                    </td>
                    <td class="">
                        {{ 'Rp ' . number_format($angsuran->bunga, 0, ',', '.') }}
                    </td>
                    <td class="">
                        {{ 'Rp ' . number_format($angsuran->total_angsuran, 0, ',', '.') }}
                    </td>
                    <td class="px-6 py-4">
                        {{ \Carbon\Carbon::parse($angsuran->tanggal_angsuran)->format('m/Y') }}
                    </td>

                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr class="">
                <th scope="row" class="">
                    Total
                </th>
                <td class="">
                    {{-- {{ 'Rp ' . number_format($totalJumlahSisa, 0, ',', '.') }} --}}
                </td>
                <td class="">
                    {{ 'Rp ' . number_format($totalAngsuranPokok, 0, ',', '.') }}
                </td>
                <td class="">
                    {{ 'Rp ' . number_format($totalBunga, 0, ',', '.') }}
                </td>
                <td class="">
                    {{ 'Rp ' . number_format($totalAngsuran, 0, ',', '.') }}
                </td>
                <td class="">
                    <!-- Kosong atau teks yang diinginkan -->
                </td>
            </tr>
        </tfoot>
        <tfoot>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                {{ 'Rp ' . number_format($totalAngsuran - 200000, 0, ',', '.') }}
            </td>
                        <td></td>
        </tfoot>

    </table>

    <div class="">
        <table>
            <tr>
                <td class="signature">
                    <p>Peminjam</p>
                    <div class="" style="margin-top: 60px;">
                        <p class="font-bold">{{$pinjamans->anggota->user->name}}</p>
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
