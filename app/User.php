<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id';
     protected $fillable = [
        'username',
        'nama_lengkap',
        'no_tlp',
        'email',
        'password',
        'role',
        'nim',
        'bank',
        'no_rek',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function matakuliah()
{
    return $this->hasMany(matakuliah::class, 'id_makul');
}

public function pengambilan()
{
    return $this->belongsTo(Pengambilan::class, 'id_pengambilan');
}

public function pengambilans()
{
    return $this->hasMany(Pengambilan::class, 'id');
}

public function presensi()
{
    return $this->hasMany(Presensi::class, 'id_presensi');
}

}
