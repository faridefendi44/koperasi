<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Anggota;
use App\Models\Pinjaman;
use App\Models\Simpanan;

class DashboardController extends Controller
{
    //
    public function DashboardUser(){
        return view('dashboard.user');
    }
    public function DashboardAdmin(){
        $pengguna = User::where('role', 'user')->count();
        $anggota = Anggota::count();
        $peminjam = Pinjaman::count();
        $lunas = Pinjaman::where('status_pelunasan', 'lunas')->count();
        $belumLunas = Pinjaman::where('status_pelunasan', 'belum')->count();
        return view('dashboard.admin', compact('peminjam', 'lunas', 'belumLunas', 'pengguna', 'anggota'));
    }
    public function VerifikasiUser(){
        $anggota = auth()->user()->anggota;
        return view('dashboard.verifikasi', compact('anggota'));
    }
}
