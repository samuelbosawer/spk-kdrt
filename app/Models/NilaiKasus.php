<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NilaiKasus extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'pengaduan_masyarakat_id',
        'kriteria_id',
        'nilai_kasus',
    ];



    // Relasi ke PengaduanMasyarakat
    public function pengaduanMasyarakat()
    {
        return $this->belongsTo(PengaduanMasyarakat::class, 'pengaduan_masyarakat_id');
    }

    // Relasi ke kriteria
    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_id');
    }
}
