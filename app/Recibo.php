<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recibo extends Model
{
    //
  	protected $fillable = [
		'id_cliente','id_user','codigo','importe','forma_pago'
	];

 
    public function Cliente()
    {
        return $this->belongsTo('App\Cliente','id_cliente');
    }

    public function User()
    {
        return $this->belongsTo('App\User');
    }

}
