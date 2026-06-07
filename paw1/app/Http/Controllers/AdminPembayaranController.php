<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;


class AdminPembayaranController extends Controller
{
    public function index()
    {
        $pembayarans =
            Pembayaran::with(
                'booking.user',
                'booking.lapangan'
            )->get();

        return view(
            'admin.pembayaran.index',
            compact('pembayarans')
        );
    }

    public function verifikasi($id)
    {
        $pembayaran =
            Pembayaran::findOrFail($id);

        $pembayaran->update([
            'status_verifikasi' =>
                'Lunas'
        ]);

        $pembayaran->booking
            ->update([
                'status' => 'Lunas'
            ]);

        return back();
    }

    public function tolak($id)
    {
        $pembayaran =
            Pembayaran::findOrFail($id);

        $pembayaran->update([
            'status_verifikasi' =>
                'Ditolak'
        ]);

        $pembayaran->booking
            ->update([
                'status' => 'Ditolak'
            ]);

        return back();
    }
}