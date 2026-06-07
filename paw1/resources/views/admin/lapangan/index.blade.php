@extends('layouts.app')

@section('content')
    <div class="d-flex
justify-content-between
mb-3">

        <h2>Data Lapangan</h2>

        <a href="{{ route('lapangan.create') }}" class="btn btn-success">

            Tambah Lapangan

        </a>

    </div>

    @if (session('success'))
        <div class="alert alert-success">

            {{ session('success') }}

        </div>
    @endif

    <table class="table table-bordered">

        <thead>

            <tr>

                <th>No</th>
                <th>Nama</th>
                <th>Jenis</th>
                <th>Lokasi</th>
                <th>Harga/Jam</th>
                <th>Status</th>
                <th>Aksi</th>

            </tr>

        </thead>

        <tbody>

            @foreach ($lapangans as $lapangan)
                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $lapangan->nama_lapangan }}</td>

                    <td>{{ $lapangan->jenis_olahraga }}</td>

                    <td>{{ $lapangan->lokasi }}</td>

                    <td>
                        Rp {{ number_format($lapangan->harga_per_jam) }}
                    </td>

                    <td>{{ $lapangan->status }}</td>

                    <td>

                        <a href="{{ route('lapangan.edit', $lapangan->id) }}" class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <form action="{{ route('lapangan.destroy', $lapangan->id) }}" method="POST" class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button onclick="return confirm('Hapus data?')" class="btn btn-danger btn-sm">

                                Hapus

                            </button>

                        </form>

                    </td>

                </tr>
            @endforeach

        </tbody>

    </table>
@endsection
