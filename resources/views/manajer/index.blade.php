@extends('layouts.app')

@section('content')

    <div class="container">
        <h2 class="my-4">Daftar Manajer</h2>
        <a class="btn btn-primary mb-3" href="{{ route('manajer.create') }}">Tambah Manajer Baru</a>

        @if ($manajers->isEmpty())
            <p>Tidak ada data manajer yang tersedia.</p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Tim</th>
                        <th>Umur</th>
                        <th>Pengalaman (tahun)</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($manajers as $index => $manajer)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $manajer->nama }}</td>
                            <td>{{ $manajer->tim->nama_tim ?? 'Tidak Diketahui' }}</td>
                            <td>{{ $manajer->umur }}</td>
                            <td>{{ $manajer->pengalaman }}</td>
                            <td>
                                <a href="{{ route('manajer.show', $manajer->id) }}" class="btn btn-info">Lihat</a>
                                <a href="{{ route('manajer.edit', $manajer->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('manajer.destroy', $manajer->id) }}" method="POST"
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
