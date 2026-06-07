@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">

        <h2>Data Jadwal</h2>

        <a href="{{ route('jadwal.create') }}" class="btn btn-success">

            Tambah Jadwal

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
                <th>Lapangan</th>
                <th>Tanggal</th>
                <th>Jam Mulai</th>
                <th>Jam Selesai</th>
                <th>Status</th>
                <th>Aksi</th>

            </tr>

        </thead>

        <tbody>

            @foreach ($jadwals as $jadwal)
                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>
                        {{ $jadwal->lapangan->nama_lapangan }}
                    </td>

                    <td>{{ $jadwal->tanggal }}</td>

                    <td>{{ $jadwal->jam_mulai }}</td>

                    <td>{{ $jadwal->jam_selesai }}</td>

                    <td>{{ $jadwal->status }}</td>

                    <td>

                        <a href="{{ route('jadwal.edit', $jadwal->id) }}" class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <form action="{{ route('jadwal.destroy', $jadwal->id) }}" method="POST" class="d-inline">

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
