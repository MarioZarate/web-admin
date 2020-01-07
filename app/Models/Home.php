<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    protected $table = 'home';

    public $fillable = [
        'imagenB2',
        'tituloB2',
        'descripcionB2',
        'arrayB2'
        
    ];

    protected $casts = [
        'arrayB2' => 'array'
    ];
}