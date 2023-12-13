<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{

    protected $table = 'matakuliah';

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
