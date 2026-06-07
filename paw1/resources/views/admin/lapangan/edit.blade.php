@extends('layouts.app')

@section('content')
    <h2>Edit Lapangan</h2>

    <form action="{{ route('lapangan.update', $lapangan->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label>Nama Lapangan</label>

            <input type="text" name="nama_lapangan" value="{{ $lapangan->nama_lapangan }}" class="form-control">

        </div>

        <div class="mb-3">

            <label>Jenis Olahraga</label>

            <input type="text" name="jenis_olahraga" value="{{ $lapangan->jenis_olahraga }}" class="form-control">

        </div>

        <div class="mb-3">

            <label>Lokasi</label>

            <input type="text" name="lokasi" value="{{ $lapangan->lokasi }}" class="form-control">

        </div>

        <div class="mb-3">

            <label>Harga Per Jam</label>

            <input type="number" name="harga_per_jam" value="{{ $lapangan->harga_per_jam }}" class="form-control">

        </div>

        <div class="mb-3">

            <label>Status</label>

            <select name="status" class="form-control">

                <option {{ $lapangan->status == 'Aktif' ? 'selected' : '' }}>

                    Aktif

                </option>

                <option {{ $lapangan->status == 'Nonaktif' ? 'selected' : '' }}>

                    Nonaktif

                </option>

            </select>

        </div>

        <button class="btn btn-primary">

            Update

        </button>

    </form>
@endsection
