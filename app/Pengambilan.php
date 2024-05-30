<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengambilan extends Model
{
    protected $table = 'pengambilan';
    protected $primaryKey = 'id_pengambilan';

    protected $fillable = [
        'id_makul',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'id_makul');
    }

    public function presensi()
    {
        return $this->belongsTo(Matakuliah::class, 'id_presensi');
    }

}

