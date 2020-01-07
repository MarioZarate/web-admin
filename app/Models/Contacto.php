<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $table = 'contacto';

    public $fillable = [
        'nombres',
        'apellidos',
        'correo',
        'telefono',
        'direccion',
        'mensaje',
        'check',
        'fecha'
    ];

}