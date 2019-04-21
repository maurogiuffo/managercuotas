<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuota extends Model
{
    //
    protected $fillable = [
		'mes','anio','importe',
	];
  
  public function CuotasClientes() {
    return $this->hasMany('App\CuotaCliente');
  }

}
