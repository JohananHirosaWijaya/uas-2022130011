@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="my-4">Edit Liga</h2>

        <form action="{{ route('liga.update', $liga->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama_liga" class="form-label">Nama Liga</label>
                <input type="text" class="form-control" id="nama_liga" name="nama_liga"
                    value="{{ old('nama_liga', $liga->nama_liga) }}" required>
            </div>

            <div class="mb-3">
                <label for="negara" class="form-label">Negara</label>
                <input type="text" class="form-control" id="negara" name="negara"
                    value="{{ old('negara', $liga->negara) }}" required>
            </div>

            <div class="mb-3">
                <label for="jumlah_tim" class="form-label">Jumlah Tim</label>
                <input type="number" class="form-control" id="jumlah_tim" name="jumlah_tim"
                    value="{{ old('jumlah_tim', $liga->jumlah_tim) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('liga.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
