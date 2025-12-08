<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cabut extends Model
{
     public $timestamps = false;

    protected $fillable = [
        'pengaduan_masyarakat_id',
        'rekomendasi_id',
        'pilih_kasus',
        'alasan',
    ];

    public function pengaduanMasyarakat()
    {
        return $this->belongsTo(PengaduanMasyarakat::class, 'pengaduan_masyarakat_id');
    }

    public function rekomendasi()
    {
        return $this->belongsTo(Rekomendasi::class, 'rekomendasi_id');
    }
}
