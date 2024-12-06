@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="my-4">Detail Tim</h2>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Nama Tim: {{ $tim->nama_tim }}</h5>
                <p><strong>Liga:</strong> {{ $tim->liga->nama_liga ?? 'Tidak Diketahui' }}</p>
                <p><strong>Kota:</strong> {{ $tim->kota }}</p>
                <p><strong>Tahun Berdiri:</strong> {{ $tim->tahun_berdiri }}</p>
            </div>

            <div class="card-footer">
                <a href="{{ route('tim.index') }}" class="btn btn-secondary">Kembali ke Daftar Tim</a>
                <a href="{{ route('tim.edit', $tim->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('tim.destroy', $tim->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Hapus</button>
                </form>
            </div>
        </div>
    </div>
@endsection
