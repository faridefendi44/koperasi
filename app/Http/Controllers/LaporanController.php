<?php

namespace App\Http\Controllers;

use App\Models\Angsuran;
use Illuminate\Http\Request;
use App\Models\Simpanan;
use App\Models\Pinjaman;
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

        $simpanans = $query->paginate(10);
        return view('laporan.simpanan', compact('simpanans'));
    }

    public function downloadSimpananPdf(Request $request)
    {
        $bulan = $request->input('bulan');
        $query = Simpanan::query();

        if ($bulan) {
            $query->whereMonth('tanggal_simpanan', $bulan);
        }
        $namaBulan = $bulan ? Carbon::create()->month($bulan)->locale('id')->monthName : null;

        $simpanans = $query->paginate(10);

        $pdf = PDF::loadView('laporan.simpananPrint', compact('simpanans', 'namaBulan'));
        $pdf->setPaper('A4', 'Portrait');
        return $pdf->stream('Data Simpanan.pdf');
    }
    public function indexPinjaman(Request $request){
        {
            $bulan = $request->input('bulan');
            $query = Pinjaman::query();

            if ($bulan) {
                $query->whereMonth('tanggal_pinjaman', $bulan);
            }

            $pinjamans = $query->paginate(10);
            return view('laporan.pinjaman', compact('pinjamans'));
        }
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

        $pdf = PDF::loadView('laporan.pinjamanPrint', compact('pinjamans', 'namaBulan'));
        $pdf->setPaper('A4', 'Portrait');
        return $pdf->stream('Data Pinjaman.pdf');
    }
    public function indexSHU(Request $request){
        {
            $bulan = $request->input('bulan');
            $query1 = Anggota::query();
            $query2 = Angsuran::query()->sum('bunga');



            if ($bulan) {
                $query1->whereMonth('tanggal_pinjaman', $bulan);
                $query2->whereMonth('tanggal_pinjaman', $bulan);
            }

            $pinjamans = $query->paginate(10);
            return view('laporan.pinjaman', compact('query1', 'query2'));
        }
    }
}
