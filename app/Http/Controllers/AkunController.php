<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AkunController extends Controller
{

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $validatedData = $request->validate([
            'keyword' => 'required|string|max:255',
        ]);

        $users = User::where(function ($query) use ($keyword) {
            $query->where('name', 'LIKE', '%' . $keyword . '%')
                ->orWhere('email', 'LIKE', '%' . $keyword . '%')
                ->orWhere('role', 'LIKE', '%' . $keyword . '%')
                ->orWhere('username', 'LIKE', '%' . $keyword . '%')
                ->orWhere('role', 'LIKE', '%' . $keyword . '%');
        })->paginate(10);
        return view('akun.index', compact('users'));
    }

    public function index()
    {
        $users = User::all();
        return view('akun.index', compact('users'));
    }
    public function create()
    {
        return view('akun.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'no_wa' => 'string|max:255',
            'role' => '',
            'password' => 'required',
        ]);
        $hashedPassword = bcrypt($request->password);
        $user = new User([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'no_wa' => $request->no_wa,
            'role' => $request->role,
            'password' => $hashedPassword,
        ]);
        $user->save();
        if (!auth()->user()) {
            return redirect()->route('login')->with('message', 'Berhasil menambahkan akun!');
        } else {
            return redirect()->route('akun.index')->with('message', 'Berhasil menambahkan akun!');
        }
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('akun.edit', compact('user'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'username' => 'required|unique:users,username,' . $id,
        'no_wa' => 'nullable|string|max:255',
        'email' => 'required|email|unique:users,email,' . $id,
        'role' => 'required',
    ]);

    $user = User::findOrFail($id);
    $user->name = $request->name;
    $user->username = $request->username;
    $user->no_wa = $request->no_wa;
    $user->email = $request->email;
    $user->role = $request->role;

    if ($request->filled('password')) {
        $user->password = bcrypt($request->password);
    }

    $user->save();

    return redirect()->route('akun.index')->with('message', 'Berhasil memperbarui akun');
}



    public function updatePassword(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if ($request->has('password')) {
            $user->password = bcrypt($request->password);
        }
        $user->save();
        return redirect()->back()->with('message', 'Password Anda Berhasil diubah!');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('akun.show', compact('user'));
    }


    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('akun.index');
    }
}
