<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Angsuran;
use App\Models\Pinjaman;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;



class AngsuranController extends Controller
{

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $validatedData = $request->validate([
            'keyword' => 'required|string|max:255',
        ]);

        $angsurans = Angsuran::where(function ($query) use ($keyword) {
            $query->where('id', 'LIKE', '%' . $keyword . '%');
        })
            ->orWhereHas('anggota', function ($query) use ($keyword) {
                $query->where('nip', 'LIKE', '%' . $keyword . '%');
            })
            ->orWhereHas('pinjaman', function ($query) use ($keyword) {
                $query->where('id_pinjaman', 'LIKE', '%' . $keyword . '%');
                $query->where('jumlah_pinjaman', 'LIKE', '%' . $keyword . '%');
            })
            ->orWhereHas('anggota.user', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', '%' . $keyword . '%');
            })
            ->with(['anggota', 'anggota.user', 'pinjaman']) // Load relasi anggota dan user
            ->paginate(10);
        return view('angsuran.index', compact('angsurans'));
    }

    public function printAngsuranPdf($id)
    {


        $pinjamans = Pinjaman::with('angsuran')->findOrFail($id);
        $angsuranPokok = ceil($pinjamans->jumlah_pinjaman / $pinjamans->jangka_waktu / 1000) * 1000;
        $tanggalPinjaman = $pinjamans->created_at;
        $cicilanPertama = Carbon::parse($tanggalPinjaman)->addMonths(1)->formatLocalized('%B %Y');
        $pdf = PDF::loadView('angsuran.print', compact('pinjamans', 'angsuranPokok', 'cicilanPertama'));
        $pdf->setPaper('A4', 'Portrait');
        return $pdf->stream('Detail Angsuran.pdf');
    }
    public function index(){
        $angsurans = Angsuran::with('pinjaman', 'anggota.user')->get();
        return view('angsuran.index', compact('angsurans'));
    }
    public function indexUser()
    {
        $user = Auth::user();

        $idAnggota = $user->anggota->id;
        $angsurans = Angsuran::with('pinjaman', 'anggota.user')->where('id_anggota', $idAnggota)->get();
        // $angsurans = Angsuran::where('id_anggota', $idAnggota)->paginate(10);

        return view('angsuran.indexUser', compact('angsurans'));
    }
    public function create(){
        return view('angsuran.create');
    }
    public function show($id){
        $pinjamans = Pinjaman::with('angsuran')->findOrFail($id);
        return view('angsuran.show', compact('pinjamans'));
    }
}
