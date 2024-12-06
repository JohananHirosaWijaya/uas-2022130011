<?php

namespace App\Http\Controllers;

use App\Models\Manajer;
use App\Models\Tim; // Tim model untuk dropdown
use Illuminate\Http\Request;

class ManajerController extends Controller
{
    public function index()
    {
        $manajers = Manajer::all();
        return view('manajer.index', compact('manajers'));
    }

    public function show($id)
    {
        $manajer = Manajer::findOrFail($id);
        return view('manajer.show', compact('manajer'));
    }

    public function create()
    {
        $tims = Tim::all(); // Ambil data tim untuk dropdown
        return view('manajer.create', compact('tims'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'id_tim' => 'required|exists:tims,id',
            'umur' => 'required|integer|min:20',
            'pengalaman' => 'required|integer|min:1',
        ]);

        $manajer = new Manajer();
        $manajer->nama = $request->nama;
        $manajer->id_tim = $request->id_tim;
        $manajer->umur = $request->umur;
        $manajer->pengalaman = $request->pengalaman;

        $manajer->save();

        return redirect()->route('manajer.create')->with('success', 'Manajer berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $manajer = Manajer::findOrFail($id);
        $tims = Tim::all();
        return view('manajer.edit', compact('manajer', 'tims'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'id_tim' => 'required|exists:tims,id',
            'umur' => 'required|integer|min:20',
            'pengalaman' => 'required|integer|min:1',
        ]);

        $manajer = Manajer::findOrFail($id);
        $manajer->nama = $request->nama;
        $manajer->id_tim = $request->id_tim;
        $manajer->umur = $request->umur;
        $manajer->pengalaman = $request->pengalaman;

        $manajer->save();

        return redirect()->route('manajer.index')->with('success', 'Manajer berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $manajer = Manajer::findOrFail($id);
        $manajer->delete();

        return redirect()->route('manajer.index')->with('success', 'Manajer berhasil dihapus.');
    }
}
