<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
 <title>Recibo</title>
</head>
<body>
  
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8 col-offset-2">
			<div class="card">
				<div class="card-header">
					Recibo
				</div>
					<div class="card-body">
						<div class="form-group row">
						
						
							<table>
								<tr>
									<td>Fecha</td>
									<td>{{ $recibo->created_at}} </td>
								</tr>

								<tr>
									<td>Numero</td>
									<td>{{ $recibo->id}} </td>
								</tr>

								<tr>
									<td>Cliente</td>
									<td>{{ $cliente->nombre}} {{ $cliente->apellido}}</td>
								</tr>
								<tr>
									<td>Direccion</td>
									<td>{{ $cliente->direccion}}</td>
								</tr>
								
								<tr>
									<td>Importe</td>
									<td>{{ $recibo->importe}} </td>
								</tr>
							</table>
							</div>
							<div class="form-group row">
							<table>
								<thead>
										<tr>
										<th>Año</th>
											<th>Mes</th>
											<th>Importe</th>
										
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
					</div>
			</div>
			
		</div>
		
	</div>
	
</div>
</body>
</html>