<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Simpanan;
use App\Models\Anggota;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;

class SimpananController extends Controller
{
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $validatedData = $request->validate([
            'keyword' => 'required|string|max:255',
        ]);

        $simpanans = Simpanan::where(function ($query) use ($keyword) {
            $query->where('id', 'LIKE', '%' . $keyword . '%')
                ->orWhere('simpanan_wajib', 'LIKE', '%' . $keyword . '%')
                ->orWhere('tanggal_simpanan', 'LIKE', '%' . $keyword . '%');
        })
            ->orWhereHas('anggota', function ($query) use ($keyword) {
                $query->where('nip', 'LIKE', '%' . $keyword . '%');
            })
            ->orWhereHas('anggota.user', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', '%' . $keyword . '%');
            })
            ->with(['anggota', 'anggota.user'])
            ->paginate(5);
        return view('simpanan.index', compact('simpanans'));
    }

    public function index()
    {
        $anggotaIds = Simpanan::select('id_anggota')->distinct()->pluck('id_anggota');
        $perPage = 5;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = $anggotaIds->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $simpanans = Simpanan::whereIn('id_anggota', $currentItems)
        ->orderBy('tanggal_simpanan', 'desc')
        ->get();
        $simpanansPaginated = new LengthAwarePaginator($simpanans, $anggotaIds->count(), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
        ]);

        return view('simpanan.index', compact('simpanansPaginated'));
    }

    public function indexUser()
    {
        $user = Auth::user();

        $idAnggota = $user->anggota->id;

        $simpanans = Simpanan::where('id_anggota', $idAnggota)
        ->orderBy('tanggal_simpanan', 'desc') 
        ->paginate(10);

        return view('simpanan.indexUser', compact('simpanans'));
    }

    public function show($id)
    {
        $anggota = Anggota::with('simpanans')->find($id);
        return view('simpanan.show', compact('anggota'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'simpanan_wajib' => 'required|string|max:255',
            'tanggal_simpanan' => 'required|date',
        ]);
        $simpanan = Simpanan::findOrFail($id);
        $simpanan->update($validatedData);
        return redirect()->back()->with('success', 'Data simpanan berhasil diperbarui');
    }

    public function status(Request $request, $id){
        $validatedData = $request->validate([
            'status' => 'required|string|max:255',
        ]);
        $simpanan = Simpanan::findOrFail($id);
        $simpanan->update($validatedData);
        return redirect()->back()->with('success', 'Data simpanan berhasil diperbarui');
    }

    public function create()
    {
        $anggotas = Anggota::get();
        $anggota = auth()->user()->anggota;
        return view('simpanan.create', compact('anggotas', 'anggota'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_anggota' => 'required|string|max:255',
            'tanggal_simpanan' => '',
        ]);

        $simpanan = Simpanan::create($validatedData);

        return redirect()->route('simpanan.index');
    }
    public function delete($id)
    {
        $simpanan = Simpanan::findOrFail($id);
        $simpanan->delete();
        return redirect()->back();
    }
}
