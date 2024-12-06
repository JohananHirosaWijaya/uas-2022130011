@extends('layouts.app')

@section('content')

    <div class="container">
        <h2 class="my-4">Daftar Pemain</h2>
        <a class="btn btn-primary mb-3" href="{{ route('pemain.create') }}">Tambah Pemain Baru</a>

        @if ($pemains->isEmpty())
            <p>Tidak ada data pemain yang tersedia.</p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Pemain</th>
                        <th>Tim</th>
                        <th>Posisi</th>
                        <th>Umur</th>
                        <th>Kebangsaan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pemains as $index => $pemain)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $pemain->nama_pemain }}</td>
                            <td>{{ $pemain->tim->nama_tim ?? 'Tidak Diketahui' }}</td>
                            <td>{{ $pemain->posisi }}</td>
                            <td>{{ $pemain->umur }}</td>
                            <td>{{ $pemain->kebangsaan }}</td>
                            <td>
                                <a href="{{ route('pemain.show', $pemain->id) }}" class="btn btn-info">Lihat</a>
                                <a href="{{ route('pemain.edit', $pemain->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('pemain.destroy', $pemain->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
