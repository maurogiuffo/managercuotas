<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recibo extends Model
{
    //
  	protected $fillable = [
		'id_cliente','id_user','codigo','id_cuota','importe'
	];

 	public function Cuota()
    {
        return $this->hasOne('App\Cuota');
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
