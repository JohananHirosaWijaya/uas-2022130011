@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="my-4">Detail Liga</h2>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Nama Liga: {{ $liga->nama_liga }}</h5>
                <p><strong>Negara:</strong> {{ $liga->negara }}</p>
                <p><strong>Jumlah Tim:</strong> {{ $liga->jumlah_tim }}</p>
            </div>

            <div class="card-footer">
                <a href="{{ route('liga.index') }}" class="btn btn-secondary">Kembali ke Daftar Liga</a>
                <a href="{{ route('liga.edit', $liga->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('liga.destroy', $liga->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Hapus</button>
                </form>
            </div>
        </div>
    </div>
@endsection
