@extends('layouts.app')

@section('content')
    <h2>Tambah Lapangan</h2>

    <form action="{{ route('lapangan.store') }}" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="mb-3">

            <label>Nama Lapangan</label>

            <input type="text" name="nama_lapangan" class="form-control">

        </div>

        <div class="mb-3">

            <label>Jenis Olahraga</label>

            <select name="jenis_olahraga" class="form-control">

                <option>Futsal</option>
                <option>Basket</option>
                <option>Tenis</option>
                <option>Badminton</option>

            </select>

        </div>

        <div class="mb-3">

            <label>Lokasi</label>

            <input type="text" name="lokasi" class="form-control">

        </div>

        <div class="mb-3">

            <label>Harga Per Jam</label>

            <input type="number" name="harga_per_jam" class="form-control">

        </div>

        <div class="mb-3">

            <label>Gambar</label>

            <input type="file" name="gambar" class="form-control">

        </div>

        <button class="btn btn-success">

            Simpan

        </button>

        <a href="{{ route('lapangan.index') }}" class="btn btn-secondary">

            Kembali

        </a>

    </form>
@endsection
