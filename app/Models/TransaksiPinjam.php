<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPinjam extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_transaksi_pinjam',
        'kd_anggota',
        'tg_pinjam',
        'tg_bts_kembali',
        'kd_koleksi',
        'judul',
        'jns_bhn_pustaka',
        'jns_koleksi',
        'jns_media',
        'id_pengguna',
    ];

    public function koleksi()
    {
        return $this->belongsTo(Koleksi::class, "kd_koleksi", "kd_koleksi");
    }

    public function pengguna()
    {
        return $this->belongsTo(User::class, "id_pengguna");
    }

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, "kd_anggota", "kd_anggota");
    }


}
