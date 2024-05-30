<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presensi extends Model


{
    protected $primaryKey = 'id_presensi';
    protected $table = 'presensi';
    protected $fillable = [
        'id',
        'check_in',
        'check_out',
        'status_presensi',
        'duration',
        'id_pengambilan', 

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }


    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'id_makul', 'id_makul');
    }

    public function pengambilan()
    {
        return $this->belongsTo(Pengambilan::class, 'id_pengambilan');
    }

}
