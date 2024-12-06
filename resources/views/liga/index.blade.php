@extends('layouts.app')

@section('content')

    <div class="container">
        <h2 class="my-4">Daftar Liga</h2>
        <a class="btn btn-primary mb-3" href="{{ route('liga.create') }}">Tambah Liga Baru</a>

        @if ($ligas->isEmpty())
            <p>Tidak ada data liga yang tersedia.</p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Liga</th>
                        <th>Negara</th>
                        <th>Jumlah Tim</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ligas as $index => $liga)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $liga->nama_liga }}</td>
                            <td>{{ $liga->negara }}</td>
                            <td>{{ $liga->jumlah_tim }}</td>
                            <td>
                                <a href="{{ route('liga.show', $liga->id) }}" class="btn btn-info">Lihat</a>
                                <a href="{{ route('liga.edit', $liga->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('liga.destroy', $liga->id) }}" method="POST" style="display:inline;">
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
