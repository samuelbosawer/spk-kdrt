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
        'bukti',
        'keterangan',
    ];

    public function petugasPendamping()
    {
        return $this->belongsTo(PentugasPendamping::class, 'petugas_pendamping_id');
    }

    public function pengaduanMasyarakat()
    {
        return $this->belongsTo(PengaduanMasyarakat::class, 'pengaduan_masyarakat_id');
    }

   

    public function rekomendasis()
    {
        return $this->hasMany(Rekomendasi::class, 'pendampingan_kasus_id');
    }
}
