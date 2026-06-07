@extends('layouts.app')

@section('content')
    <h2>Edit Jadwal</h2>

    <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label>Lapangan</label>

            <select name="lapangan_id" class="form-control">

                @foreach ($lapangans as $lapangan)
                    <option value="{{ $lapangan->id }}" {{ $lapangan->id == $jadwal->lapangan_id ? 'selected' : '' }}>

                        {{ $lapangan->nama_lapangan }}

                    </option>
                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label>Tanggal</label>

            <input type="date" name="tanggal" value="{{ $jadwal->tanggal }}" class="form-control">

        </div>

        <div class="mb-3">

            <label>Jam Mulai</label>

            <input type="time" name="jam_mulai" value="{{ $jadwal->jam_mulai }}" class="form-control">

        </div>

        <div class="mb-3">

            <label>Jam Selesai</label>

            <input type="time" name="jam_selesai" value="{{ $jadwal->jam_selesai }}" class="form-control">

        </div>

        <div class="mb-3">

            <label>Status</label>

            <select name="status" class="form-control">

                <option {{ $jadwal->status == 'Tersedia' ? 'selected' : '' }}>

                    Tersedia

                </option>

                <option {{ $jadwal->status == 'Dipesan' ? 'selected' : '' }}>

                    Dipesan

                </option>

            </select>

        </div>

        <button class="btn btn-primary">
            Update
        </button>

    </form>
@endsection
