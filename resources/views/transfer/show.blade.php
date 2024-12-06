@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="my-4">Detail Transfer</h2>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Nama Pemain: {{ $transfer->pemain->nama_pemain }}</h5>
                <p><strong>Tim Asal:</strong> {{ $transfer->timAsal->nama_tim ?? 'Tidak Diketahui' }}</p>
                <p><strong>Tim Tujuan:</strong> {{ $transfer->timTujuan->nama_tim ?? 'Tidak Diketahui' }}</p>
                <p><strong>Tanggal Transfer:</strong> {{ $transfer->tanggal_transfer }}</p>
                <p><strong>Biaya Transfer:</strong> Rp {{ number_format($transfer->biaya_transfer, 0, ',', '.') }}</p>
            </div>

            <div class="card-footer">
                <a href="{{ route('transfer.index') }}" class="btn btn-secondary">Kembali ke Daftar Transfer</a>
                <a href="{{ route('transfer.edit', $transfer->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('transfer.destroy', $transfer->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Hapus</button>
                </form>
            </div>
        </div>
    </div>
@endsection
