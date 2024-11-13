<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Poliklinik;
use App\Models\Reservasi;
use App\Models\User;
use Illuminate\Container\Attributes\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservasiController extends Controller
{
    // Menampilkan daftar reservasi untuk pasien
    public function index()
    {
        $reservasis = Reservasi::where('pasien_id', Auth::id())->get();
        return view('reservasi.index', compact('reservasis'));
    }

    // Menampilkan form untuk membuat reservasi baru
    public function create()
    {
        $dokters = Dokter::all();
        $polikliniks = Poliklinik::all(); // Ambil data poliklinik
        $pasien = Auth::user(); // Mendapatkan pasien yang sedang login
        return view('reservasi.create', compact('dokters', 'polikliniks', 'pasien'));
    }

    // Menyimpan reservasi baru
    public function store(Request $request)
    {
        
        // dd($request->all());
        // dd(Auth::id());
        
        $request->validate([
            'dokter_id' => 'required|numeric',
            'poli_id' => 'required|numeric',
            'nama_anak' => 'required|string',
            'nik_anak' => 'required|numeric',
            'no_kk_anak' => 'required|numeric',
            'tanggal_kedatangan' => 'required|date',
            'jam_reservasi' => 'required',
        ]);
    
        
        // dd($request->all());
    
        // Simpan data ke database
        $data=Reservasi::create([
            'pasien_id' => Auth::id(),
            'dokter_id' => $request->dokter_id,
            'poli_id' => $request->poli_id,
            'nama_anak' => $request->nama_anak,
            'nik_anak' => $request->nik_anak,
            'no_kk_anak' => $request->no_kk_anak,
            'tanggal_kedatangan' => $request->tanggal_kedatangan,
            'jam_reservasi' => $request->jam_reservasi,
            'status' => 'menunggu',
        ]);
        // dd($data);
        return redirect()->route('reservasi.index');
    }

    // Menampilkan detail reservasi
    public function show($id)
    {
        $reservasi = Reservasi::findOrFail($id);
        return view('reservasi.show', compact('reservasi'));
    }

    // Menampilkan form untuk mengedit reservasi
    public function edit($id)
    {
        $reservasi = Reservasi::findOrFail($id);
        return view('reservasi.edit', compact('reservasi'));
    }

    // Mengupdate reservasi
    public function update(Request $request, $id)
    {
        $request->validate([
            'dokter_id' => 'required|exists:dokters,id',
            'poli_id' => 'required|exists:polikliniks,id',
            'nama_anak' => 'required|string',
            'nik_anak' => 'required|string|size:16',
            'no_kk_anak' => 'required|string|size:16',
            'tanggal_kedatangan' => 'required|date',
            'jam_reservasi' => 'required',
        ]);

        $reservasi = Reservasi::findOrFail($id);
        $reservasi->update($request->all());

        return redirect()->route('reservasi.index')->with('success', 'Reservasi berhasil diperbarui');
    }

    // Untuk admin dan dokter melihat semua reservasi
    public function adminIndex()
    {
        $reservasis = Reservasi::all();
        return view('reservasi.admin_index', compact('reservasis'));
    }

    // Untuk admin dan dokter melihat detail reservasi
    public function adminShow($id)
    {
        $reservasi = Reservasi::findOrFail($id);
        return view('reservasi.admin_details', compact('reservasi'));
    }

    // Update status reservasi
    public function updateStatus(Request $request, $id)
    {
        $reservasi = Reservasi::findOrFail($id);

        $request->validate([
            'status' => 'required|in:menunggu,disetujui,sudah datang',
        ]);

        $reservasi->status = $request->status;
        $reservasi->save();

        return redirect()->route('reservasi.adminIndex')->with('success', 'Status reservasi berhasil diperbarui');
    }
}
