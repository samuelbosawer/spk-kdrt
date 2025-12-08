<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Konversi extends Model
{
protected $fillable = [
        'nilai_gap',
        'bobot_w',
    ];

    public $timestamps = false;
}
