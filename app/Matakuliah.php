<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{

    protected $table = 'matakuliah';
    protected $primaryKey = 'id_makul';

    protected $fillable = [
        'kode_mk',
        'nama_mk',
        'bobot_sks',
        'grup',
        'ruang',
        'waktu',
        'dosen_pengampu',
    ];

    public function pengambilans()
{
    return $this->hasMany(Pengambilan::class, 'id_makul');
}



}
