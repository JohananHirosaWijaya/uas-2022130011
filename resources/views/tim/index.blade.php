@extends('layouts.app')

@section('content')

    <div class="container">
        <h2 class="my-4">Daftar Tim</h2>
        <a class="btn btn-primary mb-3" href="{{ route('tim.create') }}">Tambah Tim Baru</a>

        @if ($tims->isEmpty())
            <p>Tidak ada data tim yang tersedia.</p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Tim</th>
                        <th>Liga</th>
                        <th>Kota</th>
                        <th>Tahun Berdiri</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tims as $index => $tim)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $tim->nama_tim }}</td>
                            <td>{{ $tim->liga->nama_liga ?? 'Tidak Diketahui' }}</td>
                            <td>{{ $tim->kota }}</td>
                            <td>{{ $tim->tahun_berdiri }}</td>
                            <td>
                                <a href="{{ route('tim.show', $tim->id) }}" class="btn btn-info">Lihat</a>
                                <a href="{{ route('tim.edit', $tim->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('tim.destroy', $tim->id) }}" method="POST" style="display:inline;">
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
