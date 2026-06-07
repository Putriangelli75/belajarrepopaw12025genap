<?php

namespace App\Http\Controllers\Api;

use App\Models\Lapangan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LapanganController extends Controller
{
    public function index()
    {
        return response()->json(
            Lapangan::latest()->get()
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lapangan' => 'required',
            'jenis_olahraga' => 'required',
            'lokasi' => 'required',
            'harga_per_jam' => 'required|numeric'
        ]);

        $lapangan = Lapangan::create([
            'nama_lapangan' => $request->nama_lapangan,
            'jenis_olahraga' => $request->jenis_olahraga,
            'lokasi' => $request->lokasi,
            'harga_per_jam' => $request->harga_per_jam,
            'status' => 'Aktif'
        ]);

        return response()->json([
            'message' => 'Lapangan berhasil ditambahkan',
            'data' => $lapangan
        ]);
    }

    public function show(string $id)
    {
        return response()->json(
            Lapangan::findOrFail($id)
        );
    }

    public function update(
        Request $request,
        string $id
    )
    {
        $lapangan = Lapangan::findOrFail($id);

        $lapangan->update([
            'nama_lapangan' => $request->nama_lapangan,
            'jenis_olahraga' => $request->jenis_olahraga,
            'lokasi' => $request->lokasi,
            'harga_per_jam' => $request->harga_per_jam,
            'status' => $request->status
        ]);

        return response()->json([
            'message' => 'Lapangan berhasil diupdate'
        ]);
    }

    public function destroy(string $id)
    {
        Lapangan::findOrFail($id)->delete();

        return response()->json([
            'message' => 'Lapangan berhasil dihapus'
        ]);
    }
}