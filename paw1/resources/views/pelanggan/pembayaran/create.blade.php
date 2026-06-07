@extends('layouts.app')

@section('content')
    <h2>Upload Bukti Pembayaran</h2>

    <div class="card">

        <div class="card-body">

            <p>

                Total Pembayaran :

                <b>

                    Rp
                    {{ number_format($booking->total_harga) }}

                </b>

            </p>

            <form action="{{ route('pembayaran.store', $booking->id) }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="mb-3">

                    <label>Bukti Pembayaran</label>

                    <input type="file" name="bukti_pembayaran" class="form-control">

                </div>

                <button class="btn btn-success">

                    Upload

                </button>

            </form>

        </div>

    </div>
@endsection
