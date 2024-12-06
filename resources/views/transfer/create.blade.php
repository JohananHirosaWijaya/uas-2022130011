@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Data Transfer Pemain</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('transfer.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="id_pemain">Nama Pemain</label>
                <select name="id_pemain" id="id_pemain" class="form-control" required>
                    <option value="">Pilih Pemain</option>
                    @foreach ($pemains as $pemain)
                        <option value="{{ $pemain->id }}">{{ $pemain->nama_pemain }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="id_tim_asal">Tim Asal</label>
                <select name="id_tim_asal" id="id_tim_asal" class="form-control" required>
                    <option value="">Pilih Tim Asal</option>
                    @foreach ($tims as $tim)
                        <option value="{{ $tim->id }}">{{ $tim->nama_tim }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="id_tim_tujuan">Tim Tujuan</label>
                <select name="id_tim_tujuan" id="id_tim_tujuan" class="form-control" required>
                    <option value="">Pilih Tim Tujuan</option>
                    @foreach ($tims as $tim)
                        <option value="{{ $tim->id }}">{{ $tim->nama_tim }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tanggal_transfer">Tanggal Transfer</label>
                <input type="date" name="tanggal_transfer" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="biaya_transfer">Biaya Transfer</label>
                <input type="number" name="biaya_transfer" class="form-control" step="0.01" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
