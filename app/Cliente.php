<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
    protected $fillable = [
		'nombre','apellido','dni','direccion','telefono','tipo_cuota'
	];


	public function Recibos() {
        return $this->hasMany('App\Recibo');
    }

    
	public function Cuotas() {
        return $this->hasMany('App\CuotaCliente','id_cliente');
    }

    public function scopeNombre($query, $nombre)
    {
        if($nombre)      
            return $query->where('nombre','like',"%$nombre%")
                ->orWhere('apellido','like',"%$nombre%")
                ->orWhere('dni','like',"%$nombre%")

        ;

        return $query;
    }

}
