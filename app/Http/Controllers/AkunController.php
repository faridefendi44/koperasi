<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AkunController extends Controller
{
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
            'role' => '',
            'password' => 'required',
        ]);
        $hashedPassword = bcrypt($request->password);
        $user = new User([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'role' => $request->role,
            'password' => $hashedPassword,
        ]);
        $user->save();
        if (!auth()->user()) {
            return redirect()->route('login')->with('message', 'Berhasil menambahkan akun!');

        }else{
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
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required',
        ]);
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->role = $request->role;
        if ($request->has('password')) {
            $user->password = bcrypt($request->password);
        }
        $user->save();
        return redirect()->route('akun.index')->with('message', 'Berhasil memperbarui akun');
    }

    public function updatePassword(Request $request, $id){
        $user = User::findOrFail($id);
        if ($request->has('password')) {
            $user->password = bcrypt($request->password);
        }
        $user->save();
        return redirect()->back()->with('message', 'Password Anda Berhasil diubah!');
    }

    public function show($id){
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
