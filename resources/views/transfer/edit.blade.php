@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Transfer</h1>
        <form action="{{ route('transfer.update', $transfer->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="id_pemain">Pemain</label>
                <select name="id_pemain" class="form-control" required>
                    @foreach ($pemains as $pemain)
                        <option value="{{ $pemain->id }}" {{ $transfer->id_pemain == $pemain->id ? 'selected' : '' }}>
                            {{ $pemain->nama_pemain }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="id_tim_asal">Tim Asal</label>
                <select name="id_tim_asal" class="form-control" required>
                    @foreach ($tims as $tim)
                        <option value="{{ $tim->id }}" {{ $transfer->id_tim_asal == $tim->id ? 'selected' : '' }}>
                            {{ $tim->nama_tim }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="id_tim_tujuan">Tim Tujuan</label>
                <select name="id_tim_tujuan" class="form-control" required>
                    @foreach ($tims as $tim)
                        <option value="{{ $tim->id }}" {{ $transfer->id_tim_tujuan == $tim->id ? 'selected' : '' }}>
                            {{ $tim->nama_tim }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tanggal_transfer">Tanggal Transfer</label>
                <input type="date" name="tanggal_transfer" class="form-control"
                    value="{{ $transfer->tanggal_transfer }}" required>
            </div>

            <div class="form-group">
                <label for="biaya_transfer">Biaya Transfer</label>
                <input type="number" name="biaya_transfer" class="form-control" value="{{ $transfer->biaya_transfer }}"
                    required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
