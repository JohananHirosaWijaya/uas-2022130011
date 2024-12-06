@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Manajer</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('manajer.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama">Nama Manajer</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
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
                <label for="umur">Umur</label>
                <input type="number" class="form-control" id="umur" name="umur" min="25" required>
            </div>

            <div class="form-group">
                <label for="pengalaman">Pengalaman (Tahun)</label>
                <input type="number" class="form-control" id="pengalaman" name="pengalaman" min="0" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
