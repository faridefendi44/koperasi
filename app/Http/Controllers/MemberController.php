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

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $validatedData = $request->validate([
            'keyword' => 'required|string|max:255',
        ]);

        $members = Anggota::where(function ($query) use ($keyword) {
            $query->where('nip', 'LIKE', '%' . $keyword . '%')
                ->orWhere('golongan', 'LIKE', '%' . $keyword . '%')
                ->orWhere('gaji', 'LIKE', '%' . $keyword . '%')
                ->orWhere('bidang', 'LIKE', '%' . $keyword . '%')
                ->orWhere('alamat', 'LIKE', '%' . $keyword . '%')
                ->orWhere('no_wa', 'LIKE', '%' . $keyword . '%')
                ->orWhere('simpanan', 'LIKE', '%' . $keyword . '%')
                ->orWhere('tanggal_masuk', 'LIKE', '%' . $keyword . '%')
                ->orWhere('jabatan', 'LIKE', '%' . $keyword . '%')
                ->orWhere('pangkat', 'LIKE', '%' . $keyword . '%');
        })
            ->orWhereHas('user', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', '%' . $keyword . '%');
            })
            ->with('user')
            ->paginate(10);
        return view('member.index', compact('members'));
    }

    public function index()
    {
        $members = Anggota::paginate(10);
        return view('member.index', compact('members'));
    }
    public function create()
    {
        $users = User::where('role', 'user')->get();
        return view('member.create', compact('users'));
    }
    public function edit($id)
    {
        $users = User::get();
        $member = Anggota::findOrFail($id);
        return view('member.edit', compact('users', 'member'));
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
            'pangkat' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'simpanan' => 'nullable|numeric',
            'tanggal_masuk' => 'nullable|date',
        ]);

        if (Auth::user()->role != 'admin') {
            $validatedData['id_user'] = Auth::id();
        }
        $validatedData['simpanan'] = $validatedData['simpanan'] ?? 50000;
        $validatedData['tanggal_masuk'] = $validatedData['tanggal_masuk'] ?? Carbon::today()->toDateString();
        Anggota::create($validatedData);

        if (Auth::user()->role == 'admin') {
            return redirect()->route('member.index')->with('success', 'Data anggota berhasil disimpan.');
        } else {
            return redirect()->route('user.verifikasi')->with('success', 'Data anggota berhasil disimpan.');
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nip' => 'required|string|max:255',
            'golongan' => 'required|string|max:255',
            'gaji' => 'required|numeric',
            'id_user' => 'numeric',
            'bidang' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'pangkat' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'simpanan' => 'nullable|numeric',
            'tanggal_masuk' => 'nullable|date',
        ]);

        $anggota = Anggota::findOrFail($id);

        if (Auth::user()->role != 'admin') {
            $validatedData['id_user'] = Auth::id();
        }

        $validatedData['simpanan'] = $validatedData['simpanan'] ?? 50000;
        $validatedData['tanggal_masuk'] = $validatedData['tanggal_masuk'] ?? Carbon::today()->toDateString();

        $anggota->update($validatedData);

        if (Auth::user()->role == 'admin') {
            return redirect()->route('member.index')->with('success', 'Data anggota berhasil diperbarui.');
        } else {
            return redirect()->route('user.verifikasi')->with('success', 'Data anggota berhasil diperbarui.');
        }
    }


    public function profil()
    {
        $user = auth()->user();
        return view('member.profil', compact('user'));
    }
    public function show($id)
    {
        $user = Anggota::findOrFail($id);
        return view('member.show', compact('user'));
    }
    public function approve($id)
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->status = 'approved';
        $anggota->save();
        return redirect()->back();
    }
    public function reject($id)
    {
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
