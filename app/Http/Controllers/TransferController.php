<?php

namespace App\Http\Controllers;

use App\Models\Transfer; // Model Transfer
use App\Models\Pemain; // Model Pemain (jika diperlukan)
use App\Models\Tim; // Model Tim (jika diperlukan)
use Illuminate\Http\Request;

class TransferController extends Controller
{
    public function index()
    {
        $transfers = Transfer::with(['pemain', 'timAsal', 'timTujuan'])->get(); // Eager loading
        return view('transfer.index', compact('transfers'));
    }

    public function create()
    {
        $pemains = Pemain::all(); // Ambil data pemain untuk dropdown
        $tims = Tim::all(); // Ambil data tim untuk dropdown
        return view('transfer.create', compact('pemains', 'tims'));
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'id_pemain' => 'required|exists:pemains,id',
                'id_tim_asal' => 'required|exists:tims,id',
                'id_tim_tujuan' => 'required|exists:tims,id',
                'tanggal_transfer' => 'required|date',
                'biaya_transfer' => 'required|numeric',
            ]);

            $transfer = Transfer::create($validatedData);

            return redirect()->route('transfer.create')
                ->with('success', 'Transfer berhasil ditambahkan');
        } catch (\Exception $e) {

            return back()
                ->withErrors(['msg' => $e->getMessage()])
                ->withInput();
        }
    }

    public function show($id)
    {
        $transfer = Transfer::findOrFail($id);
        return view('transfer.show', compact('transfer'));
    }

    public function edit($id)
    {
        $transfer = Transfer::findOrFail($id);
        $pemains = Pemain::all();
        $tims = Tim::all();
        return view('transfer.edit', compact('transfer', 'pemains', 'tims'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_pemain' => 'required',
            'id_tim_asal' => 'required',
            'id_tim_tujuan' => 'required',
            'tanggal_transfer' => 'required|date',
            'biaya_transfer' => 'required|numeric',
        ]);

        $transfer = Transfer::findOrFail($id);
        $transfer->update($request->all());

        return redirect()->route('transfer.index')->with('success', 'Transfer berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $transfer = Transfer::findOrFail($id);
        $transfer->delete();

        return redirect()->route('transfer.index')->with('success', 'Transfer berhasil dihapus.');
    }
}
