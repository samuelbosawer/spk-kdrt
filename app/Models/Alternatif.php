<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    protected $fillable = [
        'alternatif',
        'nilai_ideal_alternatif',
    ];

    public $timestamps = false;

    public function nilaiKasus()
    {
        return $this->hasMany(NilaiKasus::class, 'alternatif_id');
    }
}
