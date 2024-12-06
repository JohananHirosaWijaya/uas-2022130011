@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="my-4">Detail Pinjaman</h2>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Nama Pemain: {{ $pinjam->pemain->nama_pemain }}</h5>
                <p><strong>Tim Asal:</strong> {{ $pinjam->timAsal->nama_tim ?? 'Tidak Diketahui' }}</p>
                <p><strong>Tim Tujuan:</strong> {{ $pinjam->timTujuan->nama_tim ?? 'Tidak Diketahui' }}</p>
                <p><strong>Tanggal Pinjam:</strong> {{ $pinjam->tanggal_pinjam }}</p>
                <p><strong>Durasi Pinjam:</strong> {{ $pinjam->durasi_pinjam }} bulan</p>
                <p><strong>Biaya Pinjam:</strong> Rp {{ number_format($pinjam->biaya_pinjam, 0, ',', '.') }}</p>
            </div>

            <div class="card-footer">
                <a href="{{ route('pinjam.index') }}" class="btn btn-secondary">Kembali ke Daftar Pinjaman</a>
                <a href="{{ route('pinjam.edit', $pinjam->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('pinjam.destroy', $pinjam->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Hapus</button>
                </form>
            </div>
        </div>
    </div>
@endsection
