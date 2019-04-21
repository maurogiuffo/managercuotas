<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Cuota;


class CuotaCliente extends Model
{

    protected $table = 'cuotas_clientes';

    //
    protected $fillable = [
      'importe','saldo'
    ];

    public function Cliente()
    {
        return $this->belongsTo('App\Cliente','id_cliente');
    }

    public function Cuota()
    {
        return $this->belongsTo('App\Cuota','id_cuota');
    }

    /*public function Recibo()
    {
        return $this->belongsTo('App\Recibo','id_recibo');
    }*/
}
