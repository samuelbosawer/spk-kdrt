<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PentugasPendamping extends Model
{
    protected $table = 'petugas_pendampings';

    // Field yang boleh diisi
    protected $fillable = [
        'nip',
        'nama_petugas',
        'jk',
        'alamat',
        'no_hp',
        'user_id',
    ];

    public $timestamps = false;

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
