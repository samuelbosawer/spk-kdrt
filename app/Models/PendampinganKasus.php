<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendampinganKasus extends Model
{
    public $timestamps = false;

    protected $table = 'pendampingan_kasuses';
    
    protected $fillable = [
        'tanggal_pendampingan',
        'petugas_pendamping_id',
        'pengaduan_masyarakat_id',
        'alternatif_id',
        'kriteria_id',
        'penilaian_kasus',
    ];

    public function petugasPendamping()
    {
        return $this->belongsTo(PentugasPendamping::class, 'petugas_pendamping_id');
    }

    public function pengaduanMasyarakat()
    {
        return $this->belongsTo(PengaduanMasyarakat::class, 'pengaduan_masyarakat_id');
    }

    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class, 'alternatif_id');
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_id');
    }

    public function rekomendasis()
    {
        return $this->hasMany(Rekomendasi::class, 'pendampingan_kasus_id');
    }
}
