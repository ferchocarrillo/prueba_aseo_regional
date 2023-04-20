<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $primaryKey = 'id';
    protected $fillable
        = [
      'id',
      'documento',
      'nombres',
      'apellidos',
      'telefono',
      'lat',
      'lng',
      'rutas_id'
          ];
    public function ruta()
          {
            return $this->hasOne('App\Models\Rutas', 'id', 'rutas_id');
          }


}
