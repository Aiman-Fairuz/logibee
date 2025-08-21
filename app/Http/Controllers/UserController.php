<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // ✅ tampilkan semua user
    public function index()
    {
        $users = User::with('role')->get();
        return view('users.index', compact('users'));
    }

    // ✅ form tambah user
    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    // ✅ simpan user baru
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'usr_role_id' => 'required|integer',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'usr_role_id' => $request->usr_role_id,
        ]);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan');
    }

    // ✅ form edit user
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    // ✅ simpan update user
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'usr_role_id' => 'required|integer',
            'password' => 'nullable|min:6',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->usr_role_id = $request->usr_role_id;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User berhasil diperbarui');
    }

    // ✅ hapus user (soft delete, aman untuk relasi produk)
    public function destroy($id)
    {
        if ($id == 1) {
            return redirect()->route('users.index')->with('error', 'User Admin utama tidak boleh dihapus');
        }

        $user = User::findOrFail($id);
        $user->delete(); // soft delete

        return redirect()->route('users.index')->with('success', 'User berhasil dihapus');
    }
}
