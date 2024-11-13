<?php

namespace App\Http\Controllers;

use App\Models\Poliklinik;
use Illuminate\Http\Request;

class PoliklinikController extends Controller
{
    public function index()
    {
        $polikliniks = Poliklinik::all();
        return view('poliklinik.index', compact('polikliniks'));
    }

    public function create()
    {
        return view('poliklinik.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_poli' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
        ]);

        Poliklinik::create($request->all());
        return redirect()->route('poliklinik.index')->with('success', 'Poliklinik created successfully.');
    }

    public function edit(Poliklinik $poliklinik)
    {
        return view('poliklinik.edit', compact('poliklinik'));
    }

    public function update(Request $request, Poliklinik $poliklinik)
    {
        $request->validate([
            'nama_poli' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
        ]);

        $poliklinik->update($request->all());
        return redirect()->route('poliklinik.index')->with('success', 'Poliklinik updated successfully.');
    }

    public function destroy(Poliklinik $poliklinik)
    {
        $poliklinik->delete();
        return redirect()->route('poliklinik.index')->with('success', 'Poliklinik deleted successfully.');
    }
}
