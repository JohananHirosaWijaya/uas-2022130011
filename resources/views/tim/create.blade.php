@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Tim</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tim.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_tim">Nama Tim</label>
                <input type="text" class="form-control" id="nama_tim" name="nama_tim" value="{{ old('nama_tim') }}"
                    required>
            </div>

            <div class="form-group">
                <label for="id_liga">Liga</label>
                <select class="form-control" id="id_liga" name="id_liga" required>
                    <option value="" disabled selected>Pilih Liga</option>
                    @foreach ($ligas as $liga)
                        <option value="{{ $liga->id }}" {{ old('id_liga') == $liga->id ? 'selected' : '' }}>
                            {{ $liga->nama_liga }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="kota">Kota</label>
                <input type="text" class="form-control" id="kota" name="kota" value="{{ old('kota') }}"
                    required>
            </div>

            <div class="form-group">
                <label for="tahun_berdiri">Tahun Berdiri</label>
                <input type="number" class="form-control" id="tahun_berdiri" name="tahun_berdiri"
                    value="{{ old('tahun_berdiri') }}" min="1800" max="{{ date('Y') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
