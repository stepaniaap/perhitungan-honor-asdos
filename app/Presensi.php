<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    protected $fillable = [
        'kode_mk',
        'nama_mk',
        'bobot_sks',
        'grup',
        'ruang',
        'waktu',
        'dosen_pengampu',
    ];
}
