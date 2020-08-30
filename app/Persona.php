<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'personas';

    public function documento()
    {
        return $this->belongsTo('App\Documento');
    }
    
    public function correo()
    {
        return $this->hasMany('App\Correo');
    }
}