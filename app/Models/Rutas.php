<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rutas extends Model
{

    protected $primaryKey = 'id';
    protected $fillable
        = [
      'id',
      'codigo',
      'nombre'
          ];
          public function clientes()
          {
              return $this->belongsTo('App\Models\Clientes');
          }



}

