@extends('layouts.app')

@section('content')

<h2 class="mb-4">
    Dashboard Admin
</h2>

<div class="row">

    <div class="col-md-3">

        <div class="card bg-success text-white">

            <div class="card-body">

                <h5>Total Lapangan</h5>

                <h2>{{ $totalLapangan }}</h2>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card bg-primary text-white">

            <div class="card-body">

                <h5>Total Jadwal</h5>

                <h2>{{ $totalJadwal }}</h2>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card bg-warning text-white">

            <div class="card-body">

                <h5>Total Booking</h5>

                <h2>{{ $totalBooking }}</h2>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card bg-danger text-white">

            <div class="card-body">

                <h5>Total Pembayaran</h5>

                <h2>{{ $totalPembayaran }}</h2>

            </div>

        </div>

    </div>

</div>

@endsection