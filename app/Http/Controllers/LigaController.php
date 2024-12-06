<?php

namespace App\Http\Controllers;

use App\Models\Liga;
use Illuminate\Http\Request;

class LigaController extends Controller
{
    public function index()
    {
        $ligas = Liga::all();
        return view('liga.index', compact('ligas'));
    }

    public function show($id)
    {
        $liga = Liga::findOrFail($id);
        return view('liga.show', compact('liga'));
    }

    public function create()
    {
        $ligas = Liga::all(); // Ambil data liga
        return view('liga.create', compact('ligas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_liga' => 'required|string|max:255',
            'negara' => 'required|string|max:255',
            'jumlah_tim' => 'required|integer|min:1',
        ]);

        $liga = new Liga();
        $liga->nama_liga = $request->nama_liga;
        $liga->negara = $request->negara;
        $liga->jumlah_tim = $request->jumlah_tim;

        $liga->save();

        return redirect()->route('liga.create')->with('success', 'Liga berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $liga = Liga::findOrFail($id);
        return view('liga.edit', compact('liga'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_liga' => 'required|string|max:255',
            'negara' => 'required|string|max:255',
            'jumlah_tim' => 'required|integer|min:2',
        ]);

        $liga = Liga::findOrFail($id);
        $liga->nama_liga = $request->nama_liga;
        $liga->negara = $request->negara;
        $liga->jumlah_tim = $request->jumlah_tim;

        $liga->save();

        return redirect()->route('liga.index')->with('success', 'Liga berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $liga = Liga::findOrFail($id);
        $liga->delete();

        return redirect()->route('liga.index')->with('success', 'Liga berhasil dihapus.');
    }
}
