@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Pemain</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('pemain.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_pemain">Nama Pemain</label>
                <input type="text" class="form-control" id="nama_pemain" name="nama_pemain" required>
            </div>

            <div class="form-group">
                <label for="id_tim">Tim</label>
                <select class="form-control" id="id_tim" name="id_tim" required>
                    @foreach ($tims as $tim)
                        <option value="{{ $tim->id }}">{{ $tim->nama_tim }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="posisi">Posisi</label>
                <input type="text" class="form-control" id="posisi" name="posisi" required>
            </div>

            <div class="form-group">
                <label for="umur">Umur</label>
                <input type="number" class="form-control" id="umur" name="umur" min="16" required>
            </div>

            <div class="form-group">
                <label for="kebangsaan">Kebangsaan</label>
                <input type="text" class="form-control" id="kebangsaan" name="kebangsaan" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
