<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Poliklinik;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DokterController extends Controller
{
    public function index()
    {
        $dokters = Dokter::all();
        $polikliniks = Poliklinik::all();
        return view('dokter.index', compact('dokters', 'polikliniks'));
    }

    public function details($id){
        $dokter = Dokter::find($id);
        $user = User::find($id);
        $polikliniks = Poliklinik::find($id);
        return view('dokter.details', compact('dokter', 'polikliniks', 'user'));
    }
    public function create()
    {
        $dokter = Dokter::all();
        $polikliniks = Poliklinik::all();
        return view('dokter.create', compact('dokter', 'polikliniks'));
    }

    public function store(Request $request)
    {
    $data = $request;
    $user =  User::create([
        'level_id' => 2,
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'nik' => $data['nik'],
        'no_kk' => $data['no_kk'],
        'no_telp' => $data['no_telp'],
        'alamat' => $data['alamat'],
    ]);
    $data['user_id'] = $user->id;

    $dokter = [
        'poli_id' => $data['poli_id'],
        'spesialis' => $data['spesialis'],      
        'user_id' => $data['user_id'],
    ];

    Dokter::create($dokter);
    return redirect('/dokter');
    }

    public function edit(User $user)
    {
        return view('dokter.edit', compact('dokter'));
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

        return redirect()->route('dokter.index')->with('success', 'User updated successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('dokter.index')->with('success', 'User deleted successfully');
    }
}
