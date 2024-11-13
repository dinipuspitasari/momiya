<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Dokter;
use App\Models\Poliklinik;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    // Method untuk menampilkan daftar jadwal
    public function index()
    {
        $jadwals = Jadwal::with(['dokter', 'poliklinik'])->get();
        $polikliniks = Poliklinik::all();
        return view('jadwal.index', compact('jadwals', 'polikliniks'));
    }

    public function getPoliklinik($dokter_id)
{
    $dokter = Dokter::with('poliklinik')->findOrFail($dokter_id);
    return response()->json($dokter->poliklinik);
}


    // Method untuk menampilkan form tambah jadwal
    public function create()
    {
        $dokters = Dokter::all();
        $polikliniks = Poliklinik::all();
        return view('jadwal.create', compact('dokters', 'polikliniks'));
    }

    // Method untuk menyimpan jadwal ke database
    public function store(Request $request)
    {
        $request->validate([
            'dokter_id' => 'required|exists:dokters,id',
            'poli_id' => 'required|exists:polikliniks,id',
            'hari' => 'required|string',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i',
        ]);

        Jadwal::create($request->all());

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan');
    }

    // Method untuk menampilkan detail jadwal
    public function show($id)
    {
        $jadwal = Jadwal::with(['dokter', 'poliklinik'])->findOrFail($id);
        return view('jadwal.show', compact('jadwal'));
    }

    // Method untuk menampilkan form edit jadwal
    public function edit($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $dokters = Dokter::all();
        $polikliniks = Poliklinik::all();
        return view('jadwal.edit', compact('jadwal', 'dokters', 'polikliniks'));
    }

    // Method untuk update jadwal
    public function update(Request $request, $id)
    {
        $request->validate([
            'dokter_id' => 'required|exists:dokters,id',
            'poli_id' => 'required|exists:polikliniks,id',
            'hari' => 'required|string',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i',
        ]);

        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update($request->all());

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diperbarui');
    }

    // Method untuk menghapus jadwal
    public function destroy($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus');
    }
}
