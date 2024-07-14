<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pinjaman;
use App\Models\Anggota;
use App\Models\Angsuran;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;



class PinjamanController extends Controller
{

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $validatedData = $request->validate([
            'keyword' => 'required|string|max:255',
        ]);

        $pinjamans = Pinjaman::where(function ($query) use ($keyword) {
            $query->where('id', 'LIKE', '%' . $keyword . '%')
                ->orWhere('jumlah_pinjaman', 'LIKE', '%' . $keyword . '%')
                ->orWhere('tanggal_pinjaman', 'LIKE', '%' . $keyword . '%')
                ->orWhere('jangka_waktu', 'LIKE', '%' . $keyword . '%');
        })
            ->orWhereHas('anggota', function ($query) use ($keyword) {
                $query->where('nip', 'LIKE', '%' . $keyword . '%');
            })
            ->orWhereHas('anggota.user', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', '%' . $keyword . '%');
            })
            ->with(['anggota', 'anggota.user']) // Load relasi anggota dan user
            ->paginate(10);
        return view('pinjaman.index', compact('pinjamans'));
    }

    public function printPinjamanPdf(Request $request, $id)
    {

        $pinjaman = Pinjaman::findOrFail($id);


        $pdf = PDF::loadView('pinjaman.print', compact('pinjaman'));
        $pdf->setPaper('A4', 'Portrait');
        return $pdf->stream('Permohonan Pinjaman.pdf');
    }

    public function index()
    {
        $pinjamans = Pinjaman::paginate(10);
        return view('pinjaman.index', compact('pinjamans'));
    }

    public function indexUser()
    {
        $user = Auth::user();

        $idAnggota = $user->anggota->id;

        $pinjamans = Pinjaman::where('id_anggota', $idAnggota)->paginate(10);

        return view('pinjaman.indexUser', compact('pinjamans'));
    }

    public function create()
    {
        $anggotas = Anggota::get();
        $anggota = auth()->user()->anggota;
        return view('pinjaman.create', compact('anggotas', 'anggota'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_anggota' => 'nullable|string|max:255',
            'jangka_waktu' => 'numeric',
            'jumlah_pinjaman' => 'numeric',
            'tanggal_pinjaman' => '',
        ]);

        if (auth()->user()->role != 'admin') {
            $validatedData['id_anggota'] = auth()->user()->anggota->id;
        }
        $pinjaman = Pinjaman::create($validatedData);


        $angsuranPokok = ceil($pinjaman->jumlah_pinjaman / $pinjaman->jangka_waktu / 1000) * 1000;
        $bungaPinjaman = $pinjaman->jumlah_pinjaman * 0.01;
        $pinjaman->update([
            'angsuran_pokok' => $angsuranPokok,
            'bunga_pinjaman' => $bungaPinjaman,
        ]);

        $angsuranData = [];
        $tanggalAngsuran = $pinjaman->tanggal_pinjaman;

        $jumlahSisa = $pinjaman->jumlah_pinjaman;

        for ($i = 0; $i < $pinjaman->jangka_waktu; $i++) {
            $tanggalAngsuran = date('Y-m-d', strtotime($tanggalAngsuran . ' +1 month'));

            $bunga = $jumlahSisa * 0.01;
            $totalAngsuran = $angsuranPokok + $bunga;
            $angsuranData[] = [
                'id_pinjaman' => $pinjaman->id,
                'id_anggota' => $pinjaman->id_anggota,
                'tanggal_angsuran' => $tanggalAngsuran,
                'angsuran_pokok' => $angsuranPokok,
                'bunga' => $bunga,
                'total_angsuran' => $totalAngsuran,
                'jumlah_sisa' => $jumlahSisa,
            ];

            $jumlahSisa -= $angsuranPokok;
        }

        Angsuran::insert($angsuranData);

        if (auth()->user()->role == 'admin') {
            return redirect()->route('pinjaman.index');
        } else {
            return redirect()->route('pinjaman.indexUser');
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([

            'id_anggota' => 'required|string|max:255',
            'jangka_waktu' => 'numeric',
            'jumlah_pinjaman' => 'numeric',
            'tanggal_pinjaman' => '',
        ]);

        $pinjaman = Pinjaman::findOrFail($id);

        $pinjaman->update($validatedData);

        $angsuranPokok = ceil($pinjaman->jumlah_pinjaman / $pinjaman->jangka_waktu / 1000) * 1000;
        $bungaPinjaman = $pinjaman->jumlah_pinjaman * 0.01;

        $pinjaman->update([
            'angsuran_pokok' => $angsuranPokok,
            'bunga_pinjaman' => $bungaPinjaman,
        ]);

        Angsuran::where('id_pinjaman', $pinjaman->id)->delete();

        $angsuranData = [];
        $tanggalAngsuran = $pinjaman->tanggal_pinjaman;
        $jumlahSisa = $pinjaman->jumlah_pinjaman;

        for ($i = 0; $i < $pinjaman->jangka_waktu; $i++) {
            $tanggalAngsuran = date('Y-m-d', strtotime($tanggalAngsuran . ' +1 month'));

            $bunga = $jumlahSisa * 0.01;
            $totalAngsuran = $angsuranPokok + $bunga;
            $angsuranData[] = [
                'id_pinjaman' => $pinjaman->id,
                'id_anggota' => $pinjaman->id_anggota,
                'tanggal_angsuran' => $tanggalAngsuran,
                'angsuran_pokok' => $angsuranPokok,
                'bunga' => $bunga,
                'total_angsuran' => $totalAngsuran,
                'jumlah_sisa' => $jumlahSisa,
            ];

            $jumlahSisa -= $angsuranPokok;
        }

        Angsuran::insert($angsuranData);

        return redirect()->route('pinjaman.index')->with('success', 'Data pinjaman berhasil diperbarui.');
    }


    public function edit($id)
    {
        $pinjaman = Pinjaman::findOrFail($id);
        $anggotas = Anggota::get();
        return view('pinjaman.edit', compact('pinjaman', 'anggotas'));
    }

    public function show($id)
    {
        $pinjaman = Pinjaman::findOrFail($id);
        $angsuranPokok = $pinjaman->jumlah_pinjaman / $pinjaman->jangka_waktu;
        $bungaPinjaman = $pinjaman->jumlah_pinjaman * 0.01;
        $tanggalPinjaman = $pinjaman->tanggal_pinjaman;
        $cicilanPertama = Carbon::parse($tanggalPinjaman)->addMonths(1)->formatLocalized('%B %Y');
        return view('pinjaman.show', compact('pinjaman', 'angsuranPokok', 'cicilanPertama', 'bungaPinjaman'));
    }
    public function approve($id)
    {
        $pinjaman = Pinjaman::findOrFail($id);
        $pinjaman->status = 'approved';
        $pinjaman->save();
        return redirect()->back();
    }
    public function reject($id)
    {
        $pinjaman = Pinjaman::findOrFail($id);
        $pinjaman->status = 'rejected';
        $pinjaman->save();
        return redirect()->back();
    }
    public function delete($id)
    {
        $pinjaman = Pinjaman::findOrFail($id);
        $pinjaman->delete();
        return redirect()->route('pinjaman.index');
    }
}
