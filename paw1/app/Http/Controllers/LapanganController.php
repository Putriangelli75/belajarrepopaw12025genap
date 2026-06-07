<?php

namespace App\Http\Controllers;

use App\Models\Lapangan;
use Illuminate\Http\Request;

class LapanganController extends Controller
{
    public function index()
    {
        $lapangans = Lapangan::latest()->get();

        return view(
            'admin.lapangan.index',
            compact('lapangans')
        );
    }

    public function create()
    {
        return view('admin.lapangan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lapangan' => 'required',
            'jenis_olahraga' => 'required',
            'lokasi' => 'required',
            'harga_per_jam' => 'required|numeric'
        ]);

        $gambar = null;

        if ($request->hasFile('gambar')) {

            $gambar = time().
                '.'.
                $request->gambar
                ->extension();

            $request->gambar
                ->move(
                    public_path('lapangan'),
                    $gambar
                );
        }

        Lapangan::create([
            'nama_lapangan' => $request->nama_lapangan,
            'jenis_olahraga' => $request->jenis_olahraga,
            'lokasi' => $request->lokasi,
            'harga_per_jam' => $request->harga_per_jam,
            'gambar' => $gambar,
            'status' => 'Aktif'
        ]);

        return redirect()
            ->route('lapangan.index')
            ->with(
                'success',
                'Data berhasil ditambahkan'
            );
    }

    public function edit($id)
    {
        $lapangan = Lapangan::findOrFail($id);

        return view(
            'admin.lapangan.edit',
            compact('lapangan')
        );
    }

    public function update(
        Request $request,
        $id
    )
    {
        $lapangan =
            Lapangan::findOrFail($id);

        $lapangan->update([
            'nama_lapangan' => $request->nama_lapangan,
            'jenis_olahraga' => $request->jenis_olahraga,
            'lokasi' => $request->lokasi,
            'harga_per_jam' => $request->harga_per_jam,
            'status' => $request->status
        ]);

        return redirect()
            ->route('lapangan.index')
            ->with(
                'success',
                'Data berhasil diubah'
            );
    }

    public function destroy($id)
    {
        Lapangan::findOrFail($id)
            ->delete();

        return redirect()
            ->back()
            ->with(
                'success',
                'Data berhasil dihapus'
            );
    }
}