<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asdos extends Model
{
    protected $table = 'asdos';
    
  
    // public function posts()
    // {
        // return $this->hasMany(Post::class);
    // }

    protected $fillable = [
        'nim',
        'nama',
        'bank',
        'no_rek',
        'matakuliah',
        'matakuliah2',
    ];
}
