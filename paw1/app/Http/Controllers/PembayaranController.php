<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function create($id)
    {
        $booking = Booking::findOrFail($id);

        return view(
            'pelanggan.pembayaran.create',
            compact('booking')
        );
    }

    public function store(
        Request $request,
        $id
    )
    {
        $request->validate([
            'bukti_pembayaran' =>
                'required|image'
        ]);

        $file = time().
            '.'.
            $request
            ->bukti_pembayaran
            ->extension();

        $request
            ->bukti_pembayaran
            ->move(
                public_path('pembayaran'),
                $file
            );

        Pembayaran::create([
            'booking_id' => $id,
            'bukti_pembayaran' => $file,
            'status_verifikasi' => 'Menunggu'
        ]);

        return redirect()
            ->route(
                'booking.riwayat'
            )
            ->with(
                'success',
                'Bukti pembayaran berhasil dikirim'
            );
    }
}