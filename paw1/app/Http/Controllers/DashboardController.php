<?php

namespace App\Http\Controllers;

use App\Models\Lapangan;
use App\Models\Booking;
use App\Models\Pembayaran;
use App\Models\Jadwal;

class DashboardController extends Controller
{
    public function admin()
    {
        return view(
            'admin.dashboard',
            [
                'totalLapangan' =>
                    Lapangan::count(),

                'totalJadwal' =>
                    Jadwal::count(),

                'totalBooking' =>
                    Booking::count(),

                'totalPembayaran' =>
                    Pembayaran::count()
            ]
        );
    }

    public function pelanggan()
    {
        $bookingSaya =
            Booking::where(
                'user_id',
                auth()->id()
            )->count();

        return view(
            'pelanggan.dashboard',
            compact('bookingSaya')
        );
    }
}