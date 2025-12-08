<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rekomendasi extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'tanggal_spk',
        'pendampingan_kasus_id',
        'konversi_id',
        'nilai_tertinggi',
        'rekomendasi'
    ];

    public function pendampinganKasus()
    {
        return $this->belongsTo(PendampinganKasus::class);
    }

    public function konversi()
    {
        return $this->belongsTo(Konversi::class);
    }

    public function cabuts()
    {
        return $this->hasMany(Cabut::class, 'rekomendasi_id');
    }
}
