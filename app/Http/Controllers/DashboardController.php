<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Anggota;
use App\Models\Pinjaman;
use App\Models\Simpanan;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    //
    public function DashboardUser()
    {
        return view('dashboard.user');
    }
    public function DashboardAdmin()
    {
        $pengguna = User::where('role', 'user')->count();
        $simpananWajib = Simpanan::count();
        $anggota = Anggota::count();
        $peminjam = Pinjaman::count();
        $lunas = Pinjaman::where('status_pelunasan', 'lunas')->count();
        $belumLunas = Pinjaman::where('status_pelunasan', 'belum')->count();

        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        // $simpananBulanIni = Simpanan::select(
        //     DB::raw('SUM(simpanan_wajib) as total_simpanan_wajib'),
        //     // DB::raw('SUM(simpanan_pokok) as total_simpanan_pokok')
        // )
        //     ->whereYear('tanggal_simpanan', $currentYear)
        //     ->whereMonth('tanggal_simpanan', $currentMonth)
        //     ->first();

        // $data = [
        //     'bulan' => Carbon::now()->format('F Y'), // Format: Nama Bulan Tahun
        //     'total_simpanan_wajib' => $simpananBulanIni->total_simpanan_wajib,
        //     // 'total_simpanan_pokok' => $simpananBulanIni->total_simpanan_pokok,
        // ];


        $simpananBulanIni = Simpanan::select(
            DB::raw('SUM(simpanan_wajib) as total_simpanan_wajib')
        )
        ->whereYear('tanggal_simpanan', $currentYear)
        ->whereMonth('tanggal_simpanan', $currentMonth)
        ->first();

        // Menghitung total simpanan_pokok dari tabel Anggota
        $totalSimpananPokok = Anggota::sum('simpanan');

        // Menyiapkan data untuk ditampilkan di view
        $data = [
            'bulan' => Carbon::now()->format('F Y'), // Format: Nama Bulan Tahun
            'total_simpanan_wajib' => $simpananBulanIni->total_simpanan_wajib,
            'total_simpanan_pokok' => $totalSimpananPokok,
        ];




        return view('dashboard.admin', compact('peminjam', 'lunas', 'belumLunas', 'pengguna', 'anggota', 'data'));
    }
    public function VerifikasiUser()
    {
        $anggota = auth()->user()->anggota;
        return view('dashboard.verifikasi', compact('anggota'));
    }
}
