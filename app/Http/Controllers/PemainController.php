<?php

namespace App\Http\Controllers;

use App\Models\Pemain;
use App\Models\Tim; // Tim model untuk dropdown
use Illuminate\Http\Request;

class PemainController extends Controller
{
    public function index()
    {
        $pemains = Pemain::all();
        return view('pemain.index', compact('pemains'));
    }

    public function show($id)
    {
        $pemain = Pemain::findOrFail($id);
        return view('pemain.show', compact('pemain'));
    }

    public function create()
    {
        $tims = Tim::all(); // Ambil data tim untuk dropdown
        return view('pemain.create', compact('tims'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pemain' => 'required|string|max:255',
            'id_tim' => 'required|exists:tims,id',
            'posisi' => 'required|string|max:255',
            'umur' => 'required|integer|min:16',
            'kebangsaan' => 'required|string|max:255',
        ]);

        $pemain = new Pemain();
        $pemain->nama_pemain = $request->nama_pemain;
        $pemain->id_tim = $request->id_tim;
        $pemain->posisi = $request->posisi;
        $pemain->umur = $request->umur;
        $pemain->kebangsaan = $request->kebangsaan;

        $pemain->save();

        return redirect()->route('pemain.create')->with('success', 'Pemain berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pemain = Pemain::findOrFail($id);
        $tims = Tim::all();
        return view('pemain.edit', compact('pemain', 'tims'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pemain' => 'required|string|max:255',
            'id_tim' => 'required|exists:tims,id',
            'posisi' => 'required|string|max:255',
            'umur' => 'required|integer|min:16',
            'kebangsaan' => 'required|string|max:255',
        ]);

        $pemain = Pemain::findOrFail($id);
        $pemain->nama_pemain = $request->nama_pemain;
        $pemain->id_tim = $request->id_tim;
        $pemain->posisi = $request->posisi;
        $pemain->umur = $request->umur;
        $pemain->kebangsaan = $request->kebangsaan;

        $pemain->save();

        return redirect()->route('pemain.index')->with('success', 'Pemain berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pemain = Pemain::findOrFail($id);
        $pemain->delete();

        return redirect()->route('pemain.index')->with('success', 'Pemain berhasil dihapus.');
    }
}
