@extends('layouts.app')

@section('content')
    <h2 class="mb-4">
        Booking Lapangan
    </h2>

    <div class="row">

        @foreach ($jadwals as $jadwal)
            <div class="col-md-4 mb-3">

                <div class="card shadow">

                    <div class="card-body">

                        <h5>
                            {{ $jadwal->lapangan->nama_lapangan }}
                        </h5>

                        <p>

                            Tanggal :
                            {{ $jadwal->tanggal }}

                            <br>

                            Jam :
                            {{ $jadwal->jam_mulai }}
                            -
                            {{ $jadwal->jam_selesai }}

                        </p>

                        <p>

                            Harga/Jam :

                            Rp
                            {{ number_format($jadwal->lapangan->harga_per_jam) }}

                        </p>

                        <form action="{{ route('booking.store') }}" method="POST">

                            @csrf

                            <input type="hidden" name="jadwal_id" value="{{ $jadwal->id }}">

                            <button class="btn btn-success w-100">

                                Booking Sekarang

                            </button>

                        </form>

                    </div>

                </div>

            </div>
        @endforeach

    </div>
@endsection
