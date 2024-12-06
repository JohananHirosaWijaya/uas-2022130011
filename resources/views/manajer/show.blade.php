@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="my-4">Detail Manajer</h2>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Nama: {{ $manajer->nama }}</h5>
                <p><strong>Tim:</strong> {{ $manajer->tim->nama_tim ?? 'Tidak Diketahui' }}</p>
                <p><strong>Umur:</strong> {{ $manajer->umur }} tahun</p>
                <p><strong>Pengalaman:</strong> {{ $manajer->pengalaman }} tahun</p>
            </div>

            <div class="card-footer">
                <a href="{{ route('manajer.index') }}" class="btn btn-secondary">Kembali ke Daftar Manajer</a>
                <a href="{{ route('manajer.edit', $manajer->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('manajer.destroy', $manajer->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Hapus</button>
                </form>
            </div>
        </div>
    </div>
@endsection
