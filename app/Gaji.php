<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    protected $table = 'gaji';
    protected $primaryKey = 'id_gaji';
    protected $fillable = [
        'id',
       'id_presensi',
       'id_pengambilan',
       'bulan',
       'gaji_total',
   ];


public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
