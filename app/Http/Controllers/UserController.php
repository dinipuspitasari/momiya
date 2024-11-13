<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('level_id', '=', 1)->get();
        return view('user.index', compact('users'));
    }


    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        // Validasi input termasuk nik, no_kk, no_telp, dan alamat
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'nik' => 'required|string|max:16|unique:users',
            'no_kk' => 'required|string|max:16',
            'no_telp' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
        ]);

        // Simpan data user baru
        $users = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'nik' => $request->nik,
            'no_kk' => $request->no_kk,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'password' => Hash::make('admin123'),
            'level_id' => 1, // asumsikan ini untuk level admin
        ]);

        return redirect('/user')->with('success', 'User created successfully');
    }

    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // Validasi input untuk update data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'nik' => 'required|string|max:16|unique:users,nik,' . $user->id,
            'no_kk' => 'required|string|max:16',
            'no_telp' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
        ]);

        // Update data user
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'nik' => $request->nik,
            'no_kk' => $request->no_kk,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('user.index')->with('success', 'User updated successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User deleted successfully');
    }
}
