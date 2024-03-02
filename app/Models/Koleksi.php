<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koleksi extends Model
{
    use HasFactory;

    protected $fillable = [

    'kd_koleksi',
    'judul',
    'jns_bhn_pustaka',
    'jns_koleksi',
    'jns_media',
    'pengarang',
    'penerbit',
    'tahun',
    'cetakan',
    'edisi',
    'status',
    ];
}
