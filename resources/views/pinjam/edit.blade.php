@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Pinjaman</h1>
        <form action="{{ route('pinjam.update', $pinjam->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="id_pemain">Pemain</label>
                <select name="id_pemain" class="form-control" required>
                    @foreach ($pemains as $pemain)
                        <option value="{{ $pemain->id }}" {{ $pinjam->id_pemain == $pemain->id ? 'selected' : '' }}>
                            {{ $pemain->nama_pemain }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="id_tim_asal">Tim Asal</label>
                <select name="id_tim_asal" class="form-control" required>
                    @foreach ($tims as $tim)
                        <option value="{{ $tim->id }}" {{ $pinjam->id_tim_asal == $tim->id ? 'selected' : '' }}>
                            {{ $tim->nama_tim }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="id_tim_tujuan">Tim Tujuan</label>
                <select name="id_tim_tujuan" class="form-control" required>
                    @foreach ($tims as $tim)
                        <option value="{{ $tim->id }}" {{ $pinjam->id_tim_tujuan == $tim->id ? 'selected' : '' }}>
                            {{ $tim->nama_tim }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tanggal_pinjam">Tanggal Pinjam</label>
                <input type="date" name="tanggal_pinjam" class="form-control" value="{{ $pinjam->tanggal_pinjam }}"
                    required>
            </div>

            <div class="form-group">
                <label for="durasi_pinjam">Durasi Pinjam (bulan)</label>
                <input type="number" name="durasi_pinjam" class="form-control" value="{{ $pinjam->durasi_pinjam }}"
                    required>
            </div>

            <div class="form-group">
                <label for="biaya_pinjam">Biaya Pinjam</label>
                <input type="number" name="biaya_pinjam" class="form-control" value="{{ $pinjam->biaya_pinjam }}"
                    required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
