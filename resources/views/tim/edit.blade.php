@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="my-4">Edit Tim</h2>

        <form action="{{ route('tim.update', $tim->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama_tim" class="form-label">Nama Tim</label>
                <input type="text" class="form-control" id="nama_tim" name="nama_tim"
                    value="{{ old('nama_tim', $tim->nama_tim) }}" required>
            </div>

            <div class="mb-3">
                <label for="id_liga" class="form-label">Liga</label>
                <select class="form-select" id="id_liga" name="id_liga" required>
                    @foreach ($ligas as $liga)
                        <option value="{{ $liga->id }}" {{ $tim->id_liga == $liga->id ? 'selected' : '' }}>
                            {{ $liga->nama_liga }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="kota" class="form-label">Kota</label>
                <input type="text" class="form-control" id="kota" name="kota"
                    value="{{ old('kota', $tim->kota) }}" required>
            </div>

            <div class="mb-3">
                <label for="tahun_berdiri" class="form-label">Tahun Berdiri</label>
                <input type="number" class="form-control" id="tahun_berdiri" name="tahun_berdiri"
                    value="{{ old('tahun_berdiri', $tim->tahun_berdiri) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('tim.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
