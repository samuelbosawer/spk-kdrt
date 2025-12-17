<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengaduanMasyarakat extends Model
{
    protected $table = 'pengaduan_masyarakats';

    public $timestamps = false;

    protected $fillable = [
        'id_pengadu',
        'nama_pengadu',
        'nama_korban',
        'judul_pengaduan',
        'nama_pelaku',
        'jk_korban',
        'lokasi_kejadian',
        'deskripsi_singkat',
        'bukti_gambar',
        'tanggal_kejadian',
        'no_hp',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cabuts()
    {
        return $this->hasMany(Cabut::class, 'pengaduan_masyarakat_id');
    }


    public function nilaiKasus()
    {
        return $this->hasMany(NilaiKasus::class, 'pengaduan_masyarakat_id');
    }
}
