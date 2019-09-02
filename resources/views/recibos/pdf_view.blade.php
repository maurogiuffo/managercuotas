<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
 <title>Recibo</title>
</head>

<body>
  
 <style>
body {
  padding: 50px;
}

* {
  box-sizing: border-box;
}

.receipt-main {
  display: inline-block;
  width: 100%;
  padding: 15px;
  font-size: 12px;
  border: 1px solid #000;
}

.receipt-title {
  text-align: center;
  text-transform: uppercase;
  font-size: 20px;
  font-weight: 600;
  margin: 0;
}
  
.receipt-label {
  font-weight: 600;
}

.text-large {
  font-size: 16px;
}

.receipt-section {
  margin-top: 10px;
}

.receipt-footer {
  text-align: center;
  background: #ff0000;
}

.receipt-signature {
  height: 80px;
  margin: 50px 0;
  padding: 0 50px;
  background: #fff;
  }

  .receipt-line {
    margin-bottom: 10px;
    border-bottom: 1px solid #000;
  }
  
  p {
    text-align: center;
    margin: 0;
  }


.headerLogo {
  width: 50px;
  padding: 15px;
}

.header {
  width: 100px;
  padding: 15px;
  font-size: 12px;
}


</style>

<div class="receipt-main">
<div >
  <table>
    <tr >
      <td class="headerLogo">
        SP
      </td>

      <td class="header">
        AUTOVIA 2 Km 380<br>
        Barrio La Armonia<br>
        Mar Chiquita<br>
        Pcia. Buenos Aires
      </td>
      <td class="header">
        <span class="receipt-label text-large" >RESUMEN</span><br>
        De Cuenta<br>
        <span class="receipt-label text-large">X</span>
      </td>
      <td class="header" >
        Nº 0000{{ $recibo->id}}<br>
        Fecha: {{ $recibo->created_at}}<br>
        No valido como  factura
      </td>
    </tr>
  
  </table>
</div>


<div class="receipt-section">
    <span class="receipt-label">Apellido y Nombre:</span>
    <span>{{ $cliente->apellido}} {{ $cliente->nombre}}</span>
</div>
  
<div class="receipt-section">
    <span class="receipt-label">Direccion:</span>
    <span>{{ $cliente->direccion}}</span>
</div>

<div class="receipt-section">
    <span class="receipt-label">Telefono:</span>
    <span>{{ $cliente->telefono}}</span>
</div>

<div class="receipt-section">
    <span class="receipt-label">Forma de pago:</span>
    <span>{{ $recibo->forma_pago}}</span>
</div>

<div class="pull-right receipt-section">
		<table>
			<thead>
				<tr>
				<th width="50">Año</th>
				<th width="50">Mes</th>
				<th width="50">Importe</th>
				
				</tr>
			</thead>
			<tbody>
				@foreach($cuotas as $cuota )
				<tr>

					<td>{{ $cuota->cuota->anio}}</td>
					<td>{{ $cuota->cuota->mes}}</td>
					<td>{{ $cuota->importe}}</td>

				</tr>
				@endforeach
			</tbody>								
			
		</table>
</div>
 
<div class="pull-right receipt-section">

@if ( $cliente->tipo_cuota == 'TIPO1')
  <span class="text-large receipt-label">Importe:</span>
@else
  <span class="text-large receipt-label">Saldo:</span>
@endif
    <span class="text-large">{{ $recibo->importe}}</span>
</div>

<div class="receipt-section">

      
    <span>Sr Vecino</span>
    <span>
      El pago a facturar en el corriente mes corresponde a los servicios del anterior
      razon por la cual es imprecindible el puntual cumplimiento del  mismo, dado que esta
      destinado a salarios, cargas sociales, seguros con vencimientos fijos.

    </span>
  </div>

</div>
</body>
</html>