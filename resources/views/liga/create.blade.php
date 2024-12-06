@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Liga</h2>

        <!-- Tampilkan pesan sukses -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tampilkan pesan error -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('liga.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_liga">Nama Liga</label>
                <input type="text" class="form-control @error('nama_liga') is-invalid @enderror" id="nama_liga"
                    name="nama_liga" value="{{ old('nama_liga') }}" required>
                @error('nama_liga')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="negara">Negara</label>
                <input type="text" class="form-control @error('negara') is-invalid @enderror" id="negara"
                    name="negara" value="{{ old('negara') }}" required>
                @error('negara')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="jumlah_tim">Jumlah Tim</label>
                <input type="number" class="form-control @error('jumlah_tim') is-invalid @enderror" id="jumlah_tim"
                    name="jumlah_tim" min="1" value="{{ old('jumlah_tim') }}" required>
                @error('jumlah_tim')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
