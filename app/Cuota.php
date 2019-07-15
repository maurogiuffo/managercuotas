<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuota extends Model
{
    //
    protected $fillable = [
		'mes','anio','importe','importe2','importe3',
	];
  
  public function CuotasClientes() {
    return $this->hasMany('App\CuotaCliente');
  }

}
