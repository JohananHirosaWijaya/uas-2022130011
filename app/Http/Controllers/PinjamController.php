<?php

namespace App\Http\Controllers;

use App\Models\Pinjam; // Model Pinjam
use App\Models\Pemain; // Model Pemain (jika diperlukan)
use App\Models\Tim; // Model Tim (jika diperlukan)
use Illuminate\Http\Request;

class PinjamController extends Controller
{
    public function index()
    {
        $pinjams = Pinjam::with(['pemain', 'timAsal', 'timTujuan'])->get(); // Eager loading
        return view('pinjam.index', compact('pinjams'));
    }

    public function create()
    {
        $pemains = Pemain::all(); // Ambil data pemain untuk dropdown
        $tims = Tim::all(); // Ambil data tim untuk dropdown
        return view('pinjam.create', compact('pemains', 'tims'));
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'id_pemain' => 'required|exists:pemains,id',
                'id_tim_asal' => 'required|exists:tims,id',
                'id_tim_tujuan' => 'required|exists:tims,id',
                'tanggal_pinjam' => 'required|date',
                'durasi_pinjam' => 'required|numeric',
                'biaya_pinjam' => 'required|numeric',
            ]);

            $pinjam = Pinjam::create($validatedData);

            return redirect()->route('pinjam.create')
                ->with('success', 'Pinjam berhasil ditambahkan');
        } catch (\Exception $e) {

            return back()
                ->withErrors(['msg' => $e->getMessage()])
                ->withInput();
        }
    }

    public function show($id)
    {
        $pinjam = Pinjam::findOrFail($id);
        return view('pinjam.show', compact('pinjam'));
    }

    public function edit($id)
    {
        $pinjam = Pinjam::findOrFail($id);
        $pemains = Pemain::all();
        $tims = Tim::all();
        return view('pinjam.edit', compact('pinjam', 'pemains', 'tims'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_pemain' => 'required',
            'id_tim_asal' => 'required',
            'id_tim_tujuan' => 'required',
            'tanggal_pinjam' => 'required|date',
            'durasi_pinjam' => 'required|numeric',
            'biaya_pinjam' => 'required|numeric',
        ]);

        $pinjam = Pinjam::findOrFail($id);
        $pinjam->update($request->all());

        return redirect()->route('pinjam.index')->with('success', 'Pinjam berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pinjam = Pinjam::findOrFail($id);
        $pinjam->delete();

        return redirect()->route('pinjam.index')->with('success', 'Pinjam berhasil dihapus.');
    }
}
