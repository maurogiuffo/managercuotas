<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recibo extends Model
{
    //
  	protected $fillable = [
		'id_cliente','id_user','codigo','id_cuota_cliente','importe'
	];

 	public function Cuota()
    {
        return $this->hasOne('App\CuotaCliente');
    }

    public function Cliente()
    {
        return $this->belongsTo('App\Cliente');
    }

    public function User()
    {
        return $this->belongsTo('App\User');
    }

}
