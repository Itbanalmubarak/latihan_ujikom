<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiKembali extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_transaksi_pinjam',
        'no_transaksi_kembali',
        'kd_anggota',
        'tg_pinjam',
        'tg_kembali',
        'kd_koleksi',
        'judul',
        'jns_bhn_pustaka',
        'jns_koleksi',
        'jns_media',
        'denda',
        'ket',
        'id_pengguna',
    ];

    public function pinjam()
    {
        return $this->belongsTo(TransaksiPinjam::class, "no_transaksi_pinjam", "no_transaksi_pinjam");
    }

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
