<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuota extends Model
{
    //
    protected $fillable = [
		'mes','anio','importe','importe2','importe3','importe4','importe5','importe6'
	];
  
  public function CuotasClientes() {
    return $this->hasMany('App\CuotaCliente');
  }

}
