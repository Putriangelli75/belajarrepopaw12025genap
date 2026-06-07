@extends('layouts.app')

@section('content')
    <h2>
        Riwayat Booking
    </h2>

    @if (session('success'))
        <div class="alert alert-success">

            {{ session('success') }}

        </div>
    @endif

    <table class="table table-bordered">

        <thead>

            <tr>

                <th>Lapangan</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Durasi</th>
                <th>Total</th>
                <th>Status</th>
                <th>Aksi</th>

            </tr>

        </thead>

        <tbody>

            @foreach ($bookings as $booking)
                <tr>

                    <td>

                        {{ $booking->lapangan->nama_lapangan }}

                    </td>

                    <td>

                        {{ $booking->tanggal_booking }}

                    </td>

                    <td>

                        {{ $booking->jam_mulai }}
                        -
                        {{ $booking->jam_selesai }}

                    </td>

                    <td>

                        {{ $booking->durasi }} Jam

                    </td>

                    <td>

                        Rp
                        {{ number_format($booking->total_harga) }}

                    </td>

                    <td>

                        @if (!$booking->pembayaran)
                            <a href="{{ route('pembayaran.create', $booking->id) }}" class="btn btn-primary btn-sm">

                                Bayar

                            </a>
                        @else
                            <span class="badge bg-info">

                                Sudah Upload

                            </span>
                        @endif

                    </td>

                    @if ($booking->status == 'Pending')
                        <span class="badge bg-warning">

                            Pending

                        </span>
                    @elseif($booking->status == 'Lunas')
                        <span class="badge bg-success">

                            Lunas

                        </span>
                    @else
                        <span class="badge bg-danger">

                            Ditolak

                        </span>
                    @endif

                    </td>

                </tr>
            @endforeach

        </tbody>

    </table>
@endsection
