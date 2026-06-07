@extends('layouts.app')

@section('content')
    <h2>Tambah Jadwal</h2>

    <form action="{{ route('jadwal.store') }}" method="POST">

        @csrf

        <div class="mb-3">

            <label>Lapangan</label>

            <select name="lapangan_id" class="form-control">

                @foreach ($lapangans as $lapangan)
                    <option value="{{ $lapangan->id }}">
                        {{ $lapangan->nama_lapangan }}
                    </option>
                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label>Tanggal</label>

            <input type="date" name="tanggal" class="form-control">

        </div>

        <div class="mb-3">

            <label>Jam Mulai</label>

            <input type="time" name="jam_mulai" class="form-control">

        </div>

        <div class="mb-3">

            <label>Jam Selesai</label>

            <input type="time" name="jam_selesai" class="form-control">

        </div>

        <button class="btn btn-success">

            Simpan

        </button>

    </form>
@endsection
