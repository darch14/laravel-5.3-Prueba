<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class noticia extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      // CAMPOS DE FORMULARIOS
        'titulo', 'descripcion', 'urlImg',
    ];
}
