<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lapangan;

class LapanganSeeder extends Seeder
{
    public function run(): void
    {
        Lapangan::create([
            'nama_lapangan' => 'Futsal A',
            'jenis_olahraga' => 'Futsal',
            'harga_per_jam' => 100000,
            'status' => 'tersedia'
        ]);

        Lapangan::create([
            'nama_lapangan' => 'Badminton 1',
            'jenis_olahraga' => 'Badminton',
            'harga_per_jam' => 50000,
            'status' => 'tersedia'
        ]);

        Lapangan::create([
            'nama_lapangan' => 'Basket Indoor',
            'jenis_olahraga' => 'Basket',
            'harga_per_jam' => 150000,
            'status' => 'tersedia'
        ]);
    }
}