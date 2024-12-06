@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="my-4">Edit Manajer</h2>

        <form action="{{ route('manajer.update', $manajer->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Manajer</label>
                <input type="text" class="form-control" id="nama" name="nama"
                    value="{{ old('nama', $manajer->nama) }}" required>
            </div>

            <div class="mb-3">
                <label for="id_tim" class="form-label">Tim</label>
                <select class="form-select" id="id_tim" name="id_tim" required>
                    @foreach ($tims as $tim)
                        <option value="{{ $tim->id }}" {{ $manajer->id_tim == $tim->id ? 'selected' : '' }}>
                            {{ $tim->nama_tim }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="umur" class="form-label">Umur</label>
                <input type="number" class="form-control" id="umur" name="umur"
                    value="{{ old('umur', $manajer->umur) }}" required>
            </div>

            <div class="mb-3">
                <label for="pengalaman" class="form-label">Pengalaman (tahun)</label>
                <input type="number" class="form-control" id="pengalaman" name="pengalaman"
                    value="{{ old('pengalaman', $manajer->pengalaman) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('manajer.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
