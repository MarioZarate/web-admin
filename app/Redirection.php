<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Redirection extends Model
{
    protected $fillable = [
        'old_url', 'new_url'
    ];

    public $timestamps = false;
}
