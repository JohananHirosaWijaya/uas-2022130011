@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="my-4">Detail Pemain</h2>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Nama Pemain: {{ $pemain->nama_pemain }}</h5>
                <p><strong>Tim:</strong> {{ $pemain->tim->nama_tim ?? 'Tidak Diketahui' }}</p>
                <p><strong>Posisi:</strong> {{ $pemain->posisi }}</p>
                <p><strong>Umur:</strong> {{ $pemain->umur }} tahun</p>
                <p><strong>Kebangsaan:</strong> {{ $pemain->kebangsaan }}</p>
            </div>

            <div class="card-footer">
                <a href="{{ route('pemain.index') }}" class="btn btn-secondary">Kembali ke Daftar Pemain</a>
                <a href="{{ route('pemain.edit', $pemain->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('pemain.destroy', $pemain->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Hapus</button>
                </form>
            </div>
        </div>
    </div>
@endsection
