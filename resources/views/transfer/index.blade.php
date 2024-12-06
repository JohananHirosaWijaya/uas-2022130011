@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Daftar Transfer</h2>
        <a class="btn btn-primary mb-3" href="{{ route('transfer.create') }}">Tambah Data Transfer</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pemain</th>
                    <th>Tim Asal</th>
                    <th>Tim Tujuan</th>
                    <th>Tanggal Transfer</th>
                    <th>Biaya Transfer</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($transfers as $index => $transfer)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $transfer->pemain->nama_pemain ?? 'Tidak Diketahui' }}</td>
                        <td>{{ $transfer->timAsal->nama_tim ?? 'Tidak Diketahui' }}</td>
                        <td>{{ $transfer->timTujuan->nama_tim ?? 'Tidak Diketahui' }}</td>
                        <td>{{ $transfer->tanggal_transfer }}</td>
                        <td>Rp {{ number_format($transfer->biaya_transfer, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('transfer.edit', $transfer->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('transfer.destroy', $transfer->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit"
                                    onclick="return confirm('Yakin ingin menghapus transfer ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data transfer</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
