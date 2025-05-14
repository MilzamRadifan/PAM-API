<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model {
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

    protected $table = 'mahasiswa';
    
    protected $fillable = [
        'nim', 'nama', 'email', 'prodi'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var string[]
     */
    protected $hidden = [
        
    ];
}