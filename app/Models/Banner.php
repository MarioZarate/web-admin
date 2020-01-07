<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banner';

    public $fillable = [
        'titulo',
        'descripcion',
        'fondoDesktop',
        'fondoMobile',
        'visible',
        'textoBtn',
        'enlaceBtn',
        'orden'
    ];
}