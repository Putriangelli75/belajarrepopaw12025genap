<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Lapangan;
use App\Models\Pembayaran;

class BookingController extends Controller
{
    //
    public function store(Request $request)
    {
        $lapangan = Lapangan::findOrFail(
            $request->lapangan_id
        );

        $jam = (
            strtotime($request->jam_selesai)
            -
            strtotime($request->jam_mulai)
        ) / 3600;

        $total = $jam * $lapangan->harga_per_jam;

        $booking = Booking::create([
            'user_id' => auth()->id(),
            'lapangan_id' => $request->lapangan_id,
            'tanggal' => $request->tanggal,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'total_harga' => $total
        ]);

        return response()->json($booking);
    }
    public function riwayat()
    {
        return Booking::with('lapangan')
            ->where('user_id', auth()->id())
            ->get();
    }
    public function upload(Request $request, $bookingId)
    {
        $file = $request->file('bukti_bayar');

        $namaFile = time() . '.' . $file->extension();

        $file->move(
            public_path('bukti'),
            $namaFile
        );

        Pembayaran::create([
            'booking_id' => $bookingId,
            'bukti_bayar' => $namaFile,
            'tanggal_bayar' => now()
        ]);

        Booking::find($bookingId)
            ->update([
                'status' => 'menunggu_verifikasi'
            ]);

        return response()->json([
            'message' => 'Bukti pembayaran berhasil diupload'
        ]);
    }
}
