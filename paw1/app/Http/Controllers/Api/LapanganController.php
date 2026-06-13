<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lapangan;

class LapanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Lapangan::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return Lapangan::create($request->all());
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Lapangan::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    Lapangan::destroy($id);

    return response()->json([
        'message' => 'Data berhasil dihapus'
    ]);
}
    public function update(Request $request, string $id)
{
    $lapangan = Lapangan::findOrFail($id);

    $lapangan->update($request->all());

    return response()->json($lapangan);
}
}
