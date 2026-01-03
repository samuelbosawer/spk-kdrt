<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $table = 'pengajuans';

    public $timestamps = false;

    protected $fillable = [
        'pengaduan_id',
        'rekomendasi',
        'status',
        'keterangan',
    ];


    // // Relasi ke Alternatif
    // public function alternatif()
    // {
    //     return $this->belongsTo(Alternatif::class, 'alternatif_id');
    // }

    // Relasi ke Pengaduan
    public function pengaduan()
    {
        return $this->belongsTo(PengaduanMasyarakat::class, 'pengaduan_id');
    }
    
}
