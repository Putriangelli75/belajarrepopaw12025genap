<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Jadwal;
use App\Models\Lapangan;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $jadwals = Jadwal::with('lapangan')
            ->where('status','Tersedia')
            ->get();

        return view(
            'pelanggan.booking.index',
            compact('jadwals')
        );
    }

    public function store(Request $request)
    {
        $jadwal = Jadwal::with('lapangan')
            ->findOrFail(
                $request->jadwal_id
            );

        $mulai =
            strtotime(
                $jadwal->jam_mulai
            );

        $selesai =
            strtotime(
                $jadwal->jam_selesai
            );

        $durasi =
            ($selesai - $mulai)
            / 3600;

        $total =
            $durasi *
            $jadwal->lapangan
                ->harga_per_jam;

        Booking::create([

            'user_id' =>
                auth()->id(),

            'lapangan_id' =>
                $jadwal->lapangan_id,

            'tanggal_booking' =>
                $jadwal->tanggal,

            'jam_mulai' =>
                $jadwal->jam_mulai,

            'jam_selesai' =>
                $jadwal->jam_selesai,

            'durasi' =>
                $durasi,

            'total_harga' =>
                $total,

            'status' =>
                'Pending'

        ]);

        $jadwal->update([
            'status' => 'Dipesan'
        ]);

        return redirect()
            ->route(
                'booking.riwayat'
            )
            ->with(
                'success',
                'Booking berhasil'
            );
    }

    public function riwayat()
    {
        $bookings =
            Booking::with('lapangan')
            ->where(
                'user_id',
                auth()->id()
            )
            ->latest()
            ->get();

        return view(
            'pelanggan.booking.riwayat',
            compact('bookings')
        );
    }
}