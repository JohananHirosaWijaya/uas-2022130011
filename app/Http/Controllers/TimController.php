<?php

namespace App\Http\Controllers;

use App\Models\Tim;
use App\Models\Liga; // Liga model untuk dropdown
use Illuminate\Http\Request;

class TimController extends Controller
{
    public function index()
    {
        $tims = Tim::all();
        return view('tim.index', compact('tims'));
    }

    public function show($id)
    {
        $tim = Tim::findOrFail($id);
        return view('tim.show', compact('tim'));
    }

    public function create()
    {
        $ligas = Liga::all(); // Ambil data liga untuk dropdown
        return view('tim.create', compact('ligas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_tim' => 'required|string|max:255',
            'id_liga' => 'required|exists:ligas,id',
            'kota' => 'required|string|max:255',
            'tahun_berdiri' => 'required|integer|min:1800',
        ]);

        $tim = new Tim();
        $tim->nama_tim = $request->nama_tim;
        $tim->id_liga = $request->id_liga;
        $tim->kota = $request->kota;
        $tim->tahun_berdiri = $request->tahun_berdiri;

        $tim->save();

        return redirect()->route('tim.create')->with('success', 'Tim berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $tim = Tim::findOrFail($id);
        $ligas = Liga::all();
        return view('tim.edit', compact('tim', 'ligas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_tim' => 'required|string|max:255',
            'id_liga' => 'required|exists:ligas,id',
            'kota' => 'required|string|max:255',
            'tahun_berdiri' => 'required|integer|min:1800',
        ]);

        $tim = Tim::findOrFail($id);
        $tim->nama_tim = $request->nama_tim;
        $tim->id_liga = $request->id_liga;
        $tim->kota = $request->kota;
        $tim->tahun_berdiri = $request->tahun_berdiri;

        $tim->save();

        return redirect()->route('tim.index')->with('success', 'Tim berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $tim = Tim::findOrFail($id);
        $tim->delete();

        return redirect()->route('tim.index')->with('success', 'Tim berhasil dihapus.');
    }
}
