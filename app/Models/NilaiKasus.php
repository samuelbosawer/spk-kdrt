<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NilaiKasus extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'pengaduan_masyarakat_id',
        'alternatif_id',
        'nilai_kasus',
    ];



    // Relasi ke PengaduanMasyarakat
    public function pengaduanMasyarakat()
    {
        return $this->belongsTo(PengaduanMasyarakat::class, 'pengaduan_masyarakat_id');
    }

    // Relasi ke Alternatif
    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class, 'alternatif_id');
    }
}
