@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4">Edit Pemain</h2>

    <form action="{{ route('pemain.update', $pemain->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_pemain" class="form-label">Nama Pemain</label>
            <input type="text" class="form-control" id="nama_pemain" name="nama_pemain" value="{{ old('nama_pemain', $pemain->nama_pemain) }}" required>
        </div>

        <div class="mb-3">
            <label for="id_tim" class="form-label">Tim</label>
            <select class="form-select" id="id_tim" name="id_tim" required>
                @foreach($tims as $tim)
                <option value="{{ $tim->id }}" {{ $pemain->id_tim == $tim->id ? 'selected' : '' }}>{{ $tim->nama_tim }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="posisi" class="form-label">Posisi</label>
            <input type="text" class="form-control" id="posisi" name="posisi" value="{{ old('posisi', $pemain->posisi) }}" required>
        </div>

        <div class="mb-3">
            <label for="umur" class="form-label">Umur</label>
            <input type="number" class="form-control" id="umur" name="umur" value="{{ old('umur', $pemain->umur) }}" required>
        </div>

        <div class="mb-3">
            <label for="kebangsaan" class="form-label">Kebangsaan</label>
            <input type="text" class="form-control" id="kebangsaan" name="kebangsaan" value="{{ old('kebangsaan', $pemain->kebangsaan) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('pemain.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
