<?php

namespace App\Http\Controllers\Api;

use App\Models\Jadwal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JadwalController extends Controller
{
    public function index()
    {
        return response()->json(
            Jadwal::with('lapangan')->get()
        );
    }

    public function store(Request $request)
    {
        return response()->json(
            Jadwal::create($request->all())
        );
    }

    public function show(string $id)
    {
        return response()->json(
            Jadwal::findOrFail($id)
        );
    }

    public function update(
        Request $request,
        string $id
    )
    {
        $jadwal = Jadwal::findOrFail($id);

        $jadwal->update($request->all());

        return response()->json($jadwal);
    }

    public function destroy(string $id)
    {
        Jadwal::findOrFail($id)->delete();

        return response()->json([
            'message'=>'Berhasil dihapus'
        ]);
    }
}