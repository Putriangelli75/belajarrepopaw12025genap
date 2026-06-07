<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $fillable = [
        'lapangan_id',
        'tanggal',
        'jam_mulai',
        'jam_selesai',
        'status'
    ];

    public function lapangan()
    {
        return $this->belongsTo(Lapangan::class);
    }

    public function booking()
    {
        return $this->hasOne(Booking::class);
    }
}
