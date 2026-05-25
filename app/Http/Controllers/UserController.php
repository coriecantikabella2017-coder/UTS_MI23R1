<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // TAMPIL DATA
    public function index()
    {
        return view('admin.users', [
            'users' => User::all()
        ]);
    }

    // FORM TAMBAH
    public function create()
    {
        return view('admin.create');
    }

    // SIMPAN DATA
    public function store(Request $request)
    {

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('users.index')
            ->with('success', 'User berhasil ditambahkan');
    }

    // 🔥 TAMBAHKAN INI

    // FORM EDIT
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit', compact('user'));
    }

    // UPDATE DATA
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $user->update([
            'name'  => $request->name,
            'email' => $request->email
        ]);

        return redirect()->route('users.index')
            ->with('success', 'User berhasil diupdate');
    }

    // HAPUS DATA
    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully.');
    }
}