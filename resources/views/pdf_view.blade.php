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
  
  .receipt-line {
    margin-bottom: 10px;
    border-bottom: 1px solid #000;
  }
  
  p {
    text-align: center;
    margin: 0;
  }
}
</style>

<div class="receipt-main">
  <p class="receipt-title">Recibo</p>
  
  <div class="receipt-section pull-left">
    <span class="receipt-label text-large">Número:</span>
    <span class="text-large">{{ $recibo->id}}</span>
  </div>

  <div class="receipt-section pull-left">
    <span class="receipt-label text-large">Fecha:</span>
    <span class="text-large">{{ $recibo->created_at}}</span>
  </div>
  
<div class="receipt-section">
    <span class="receipt-label">Cliente:</span>
    <span>{{ $cliente->nombre}} {{ $cliente->apellido}}</span>
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
  
<div class="receipt-section">
    <span class="receipt-label text-large">Cuotas:</span>
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
    <span class="text-large receipt-label">Importe:</span>
    <span class="text-large">{{ $recibo->importe}}</span>
  </div>

</div>



</div>

</body>
</html>