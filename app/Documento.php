<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use app\Persona;

class Documento extends Model
{
    public function persona()
    {
        return $this->hasOne('App\Persona');
    }
}