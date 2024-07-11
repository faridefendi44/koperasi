<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class MemberController extends Controller
{
    //
    public function index(){
        $members = Anggota::paginate(10);
        return view('member.index', compact('members'));
    }
    public function create(){
        $users = User::get();
        return view('member.create', compact('users'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nip' => 'required|string|max:255',
            'golongan' => 'required|string|max:255',
            'gaji' => 'required|numeric',
            'id_user' => 'numeric',
            'bidang' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_wa' => 'required|string|max:255',
            'simpanan' => 'nullable|numeric',
            'tanggal_masuk' => 'nullable|date',
        ]);
        $anggotaCount = Anggota::count();
        $newIdAnggota = 'A' . str_pad($anggotaCount + 1, 2, '0', STR_PAD_LEFT);
        if (Auth::user()->role != 'admin') {
            $validatedData['id_user'] = Auth::id();
        }
        $validatedData['id_anggota'] = $newIdAnggota;
        $validatedData['simpanan'] = $validatedData['simpanan'] ?? 50000;
        $validatedData['tanggal_masuk'] = $validatedData['tanggal_masuk'] ?? Carbon::today()->toDateString();
        Anggota::create($validatedData);
        return redirect()->route('user.verifikasi')->with('success', 'Data anggota berhasil disimpan.');
    }
    public function profil(){
        $user = auth()->user();
        return view('member.profil', compact('user'));
    }
    public function show($id){
        $user = Anggota::findOrFail($id);
        return view('member.show', compact('user'));
    }
    public function approve($id){
        $anggota = Anggota::findOrFail($id);
        $anggota->status = 'approved';
        $anggota->save();
        return redirect()->back();
    }
    public function reject($id){
        $anggota = Anggota::findOrFail($id);
        $anggota->status = 'rejected';
        $anggota->save();
        return redirect()->back();
    }
    public function delete($id)
    {
        $member = Anggota::findOrFail($id);
        $member->delete();
        return redirect()->route('member.index');
    }
}
