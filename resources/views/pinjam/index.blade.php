@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Daftar Pinjaman</h2>
        <a class="btn btn-primary mb-3" href="{{ route('pinjam.create') }}">Tambah Data Pinjam</a>

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
                    <th>Tanggal Pinjam</th>
                    <th>Durasi (bulan)</th>
                    <th>Biaya Pinjam</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pinjams as $index => $pinjam)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $pinjam->pemain->nama_pemain ?? 'Tidak Diketahui' }}</td>
                        <td>{{ $pinjam->timAsal->nama_tim ?? 'Tidak Diketahui' }}</td>
                        <td>{{ $pinjam->timTujuan->nama_tim ?? 'Tidak Diketahui' }}</td>
                        <td>{{ $pinjam->tanggal_pinjam }}</td>
                        <td>{{ $pinjam->durasi_pinjam }}</td>
                        <td>Rp {{ number_format($pinjam->biaya_pinjam, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('pinjam.edit', $pinjam->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('pinjam.destroy', $pinjam->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit"
                                    onclick="return confirm('Yakin ingin menghapus data pinjam ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">Tidak ada data pinjaman</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
