<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Lapangan;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwals = Jadwal::with('lapangan')->get();

        return view(
            'admin.jadwal.index',
            compact('jadwals')
        );
    }

    public function create()
    {
        $lapangans = Lapangan::all();

        return view(
            'admin.jadwal.create',
            compact('lapangans')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'lapangan_id' => 'required',
            'tanggal' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required'
        ]);

        Jadwal::create([
            'lapangan_id' => $request->lapangan_id,
            'tanggal' => $request->tanggal,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'status' => 'Tersedia'
        ]);

        return redirect()
            ->route('jadwal.index')
            ->with('success', 'Jadwal berhasil ditambahkan');
    }

    public function edit($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $lapangans = Lapangan::all();

        return view(
            'admin.jadwal.edit',
            compact('jadwal', 'lapangans')
        );
    }

    public function update(Request $request, $id)
    {
        $jadwal = Jadwal::findOrFail($id);

        $jadwal->update([
            'lapangan_id' => $request->lapangan_id,
            'tanggal' => $request->tanggal,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'status' => $request->status
        ]);

        return redirect()
            ->route('jadwal.index')
            ->with('success', 'Jadwal berhasil diupdate');
    }

    public function destroy($id)
    {
        Jadwal::findOrFail($id)->delete();

        return redirect()
            ->route('jadwal.index')
            ->with('success', 'Jadwal berhasil dihapus');
    }
}