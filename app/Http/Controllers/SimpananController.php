<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Simpanan;
use App\Models\Anggota;
use Illuminate\Support\Facades\Auth;

class SimpananController extends Controller
{
    //
    public function index(){
        $simpanans = Simpanan::paginate(10);
        return view('simpanan.index', compact('simpanans'));
    }
    public function indexUser()
    {
        $user = Auth::user();

        $idAnggota = $user->anggota->id_anggota;

        $simpanans = Simpanan::where('id_anggota', $idAnggota)->paginate(10);

        return view('simpanan.indexUser', compact('simpanans'));
    }
    public function create(){
        $anggotas = Anggota::get();
        $anggota = auth()->user()->anggota;
        return view('simpanan.create', compact('anggotas', 'anggota'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_simpanan' => 'required|string|max:255',
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
        return redirect()->route('simpanan.index');
    }
}
