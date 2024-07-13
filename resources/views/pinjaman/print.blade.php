<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permohonan Pinjaman</title>
    <link rel="stylesheet" href="assets/library/tailwind.css">

</head>
    <style>
        table {
            width: 100%;
        }
        .signature {
            height: 100px;
            vertical-align: bottom;
            text-align: center;
        }
    </style>
<body class="">
    <div class="l mx-auto">
        <div class="text-center">
            <h4 class=" font-bold">KOPERASI PEGAWAI NEGERI</h4>
            <h4 class=" font-bold">KEJAKSAAN NEGERI PAYAKUMBUH</h4>
            <h3 class=" mt-6">PERMOHONAN PINJAMAN</h3>
        </div>
        <div class="mt-8">
            <p class="mb-2">Saya yang bertanda tangan dibawah ini:</p>
            <div class="pl-6">
                <p>Nama: <span class="font-semibold">{{$pinjaman->anggota->user->name}}</span></p>
                <p>Bidang: <span class="font-semibold">{{$pinjaman->anggota->bidang}}</span></p>
                <p>NIP/NRP: <span class="font-semibold">{{$pinjaman->anggota->nip}}</span></p>
                <p>Golongan: <span class="font-semibold">{{$pinjaman->anggota->golongan}}</span></p>
            </div>
        </div>
        <div class="mt-8">
            <p class="mb-2">Dengan ini mengajukan permohonan pinjaman kepada Koperasi Pegawai Negeri Kejaksaan Negeri Payakumbuh sebesar Rp. <span class="font-semibold">{{ 'Rp ' . number_format($pinjaman->jumlah_pinjaman, 0, ',', '.') }}
            </span></p>
        </div>
        <div class="mt-8">
            <h4 class="font-bold mb-2">Dengan Ketentuan:</h4>
            <ol class="list-decimal pl-8">
                <li>Bunga 1% setiap bulan dari jumlah sisa hutang.</li>
                <li>Administrasi 1% dari jumlah pinjaman.</li>
                <li>Dana Resiko 1% dari jumlah pinjaman.</li>
                <li>
                    Apabila terjadi resiko (meninggal dunia) atas nama peminjam, akan dibayarkan dana resiko sebesar 20% (dua puluh persen) dari jumlah sisa hutang dan apabila tidak mencukupi akan di potong dari jumlah simpanannya, dan seandainya belum juga mencukupi akan dibayar oleh ahli waris.
                </li>
                <li>
                    Pembayaran diangsur selama <span class="font-bold">{{$pinjaman->jangka_waktu}} bulan</span>  dengan potongan gaji, jika gaji tidak mencukupi akan dipotong uang remunerasi dan uang makan.
                </li>
            </ol>
        </div>
        <div class="mt-8">
            <table>
                <tr>
                    <td class="signature">
                        <p>Rekomendasi</p>
                        <p>Bendaharawan gaji</p>
                        <div class="mt-20">
                            <p class="font-bold">(ABDUL AZIZ)</p>
                            <p>NIP. 19900321 201902 1 004</p>
                        </div>
                    </td>
                    <td class="signature">
                        <p>Payakumbuh,{{ \Carbon\Carbon::parse($pinjaman->created_at)->setTimezone('Asia/Jakarta')->locale('id')->isoFormat('D MMMM YYYY') }}
                        </p>
                        <p>Pemohon,</p>
                        <div class="mt-16">
                            <p class="font-bold">{{$pinjaman->anggota->user->name}}</p>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="mt-8 text-center">
            <p>Persetujuan Pinjaman</p>
            <p class="font-bold">Ketua Koperasi KPN Kejari Payakumbuh</p>
            <div class="mt-12">
                <p class="font-bold">(YENI FIRMA SURYANI, SH)</p>
                <p>NIP. 19750601 200012 2 002</p>
            </div>
        </div>
    </div>
</body>
</html>
