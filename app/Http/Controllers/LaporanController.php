<?php

namespace App\Http\Controllers;

use App\Models\Angsuran;
use Illuminate\Http\Request;
use App\Models\Simpanan;
use App\Models\Pinjaman;
use App\Models\Anggota;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;


class LaporanController extends Controller
{
    public function indexSimpanan(Request $request)
    {
        $bulan = $request->input('bulan');
        $query = Simpanan::query();

        if ($bulan) {
            $query->whereMonth('tanggal_simpanan', $bulan);
        }

        $simpanans = $query->with('anggota')
            ->paginate(10);

        $totalPinjaman = $bulan
            ? Pinjaman::whereMonth('tanggal_pinjaman', $bulan)->sum('jumlah_pinjaman')
            : Pinjaman::sum('jumlah_pinjaman');

        return view('laporan.simpanan', compact('simpanans', 'totalPinjaman'));
    }


    public function downloadSimpananPdf(Request $request)
    {
        $bulan = $request->input('bulan');
        $query = Simpanan::query();

        if ($bulan) {
            $query->whereMonth('tanggal_simpanan', $bulan);
        }
        $simpanans = $query->with('anggota')->get();
        $totalPinjaman = $bulan
            ? Pinjaman::whereMonth('tanggal_pinjaman', $bulan)->sum('jumlah_pinjaman')
            : Pinjaman::sum('jumlah_pinjaman');
        $namaBulan = $bulan ? Carbon::create()->month($bulan)->locale('id')->monthName : 'Semua Bulan';
        $pdf = PDF::loadView('laporan.simpananPrint', compact('simpanans', 'namaBulan', 'totalPinjaman'));
        $pdf->setPaper('A4', 'Portrait');
        return $pdf->stream('Data_Simpanan.pdf');
    }



    public function indexPinjaman(Request $request)
    {
        $bulan = $request->input('bulan');
        $query = Pinjaman::query();

        if ($bulan) {
            $query->whereMonth('tanggal_pinjaman', $bulan);
        }

        $pinjamans = $query->paginate(10);

        // Total pinjaman berdasarkan bulan
        $totalPinjaman = $bulan
            ? Pinjaman::whereMonth('tanggal_pinjaman', $bulan)->sum('jumlah_pinjaman')
            : Pinjaman::sum('jumlah_pinjaman');

        // Total simpanan wajib
        $totalSimpananWajib = $bulan
            ? Simpanan::whereMonth('tanggal_simpanan', $bulan)->sum('simpanan_wajib')
            : Simpanan::sum('simpanan_wajib');

        // Mengambil simpanan pokok pertama untuk setiap anggota
        $anggotaIds = Anggota::pluck('id'); // Ambil semua ID anggota
        $simpananPertama = Simpanan::whereIn('id_anggota', $anggotaIds)
            ->orderBy('tanggal_simpanan', 'asc')
            ->get()
            ->groupBy('id_anggota')
            ->map(function ($group) {
                return $group->first();
            });

        // Menghitung total simpanan pokok berdasarkan bulan yang dipilih
        $totalSimpananPokok = 0;
        foreach ($simpananPertama as $simpanan) {
            $bulanSimpanan = \Carbon\Carbon::parse($simpanan->tanggal_simpanan)->month;
            if (!$bulan || $bulanSimpanan == $bulan) {
                $anggota = $simpanan->anggota;
                $totalSimpananPokok += $anggota->simpanan;
            }
        }

        $totalSimpanan = $totalSimpananWajib + $totalSimpananPokok;

        return view('laporan.pinjaman', compact('pinjamans', 'totalPinjaman', 'totalSimpanan'));
    }
    public function downloadPinjamanPdf(Request $request)
{
    $bulan = $request->input('bulan');
    $query = Pinjaman::query();

    if ($bulan) {
        $query->whereMonth('tanggal_pinjaman', $bulan);
    }

    $namaBulan = $bulan ? Carbon::create()->month($bulan)->locale('id')->monthName : null;

    $pinjamans = $query->paginate(10);

    $totalPinjaman = $bulan
        ? Pinjaman::whereMonth('tanggal_pinjaman', $bulan)->sum('jumlah_pinjaman')
        : Pinjaman::sum('jumlah_pinjaman');

    $totalSimpananWajib = $bulan
        ? Simpanan::whereMonth('tanggal_simpanan', $bulan)->sum('simpanan_wajib')
        : Simpanan::sum('simpanan_wajib');
    $anggotaIds = Anggota::pluck('id'); 
    $simpananPertama = Simpanan::whereIn('id_anggota', $anggotaIds)
        ->orderBy('tanggal_simpanan', 'asc')
        ->get()
        ->groupBy('id_anggota')
        ->map(function ($group) {
            return $group->first();
        });
    $totalSimpananPokok = 0;
    foreach ($simpananPertama as $simpanan) {
        $bulanSimpanan = \Carbon\Carbon::parse($simpanan->tanggal_simpanan)->month;
        if (!$bulan || $bulanSimpanan == $bulan) {
            $anggota = $simpanan->anggota;
            $totalSimpananPokok += $anggota->simpanan;
        }
    }

    $totalSimpanan = $totalSimpananWajib + $totalSimpananPokok;

    $pdf = PDF::loadView('laporan.pinjamanPrint', compact('pinjamans', 'namaBulan', 'totalSimpanan', 'totalPinjaman'));
    $pdf->setPaper('A4', 'Portrait');
    return $pdf->stream('Data Pinjaman.pdf');
}

    public function indexSHU(Request $request)
    {
        $tahun = $request->input('tahun');
        $jumlahAnggota = Anggota::whereYear('created_at', $tahun)->count();
        if ($tahun) {
            $pinjaman = Pinjaman::with('angsuran')->whereYear('created_at', $tahun)->get();
            $jumlahAnggota = Anggota::whereYear('created_at', $tahun)->count();
        } else {
            $pinjaman = Pinjaman::with('angsuran')->get();
            $jumlahAnggota = Anggota::count();
        }
        $totalBunga = $pinjaman->flatMap(function ($pinjaman) {
            return $pinjaman->angsuran;
        })->sum('bunga');

        $persenBunga = $totalBunga * 0.10;
        $shu = ($totalBunga - $persenBunga) / ($jumlahAnggota > 0 ? $jumlahAnggota : 1);

        return view('laporan.shu', compact('jumlahAnggota', 'totalBunga', 'persenBunga', 'shu', 'tahun'));
    }
    public function downloadSHUPdf(Request $request)
    {
        $tahun = $request->input('tahun');
        $jumlahAnggota = Anggota::whereYear('created_at', $tahun)->count();
        if ($tahun) {
            $jumlahAnggota = Anggota::whereYear('created_at', $tahun)->count();
            $pinjaman = Pinjaman::with('angsuran')->whereYear('created_at', $tahun)->get();
        } else {
            $jumlahAnggota = Anggota::count();
            $pinjaman = Pinjaman::with('angsuran')->get();
        }
        $totalBunga = $pinjaman->flatMap(function ($pinjaman) {
            return $pinjaman->angsuran;
        })->sum('bunga');

        $persenBunga = $totalBunga * 0.10;
        $shu = ($totalBunga - $persenBunga) / ($jumlahAnggota > 0 ? $jumlahAnggota : 1);
        $pdf = PDF::loadView('laporan.shuPrint', compact('jumlahAnggota', 'totalBunga', 'persenBunga', 'shu', 'tahun'));
        $pdf->setPaper('A4', 'Portrait');
        return $pdf->stream('Data Pinjaman.pdf');
    }
}
