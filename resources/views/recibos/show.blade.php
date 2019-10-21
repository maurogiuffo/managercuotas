@extends('layouts.app')

@section('content')
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
								<td class="col-md-4 ">Fecha</td>
								<td>{{ $recibo->created_at}} </td>
							</tr>

							<tr>
								<td class="col-md-4 ">Numero</td>
								<td>{{ $recibo->id}} </td>
							</tr>

							<tr>
								<td class="col-md-4 ">Cliente</td>
								<td>{{ $cliente->nombre}} {{ $cliente->apellido}}</td>
							</tr>
							<tr>
								<td class="col-md-4 ">Direccion</td>
								<td>{{ $cliente->direccion}}</td>
							</tr>
							
						
							<tr>
								<td class="col-md-4 ">Forma de pago</td>
								<td>{{ $recibo->forma_pago}}</td>
							</tr>	
						</table>
					</div>
					<div class="form-group row">
						<table>
							<thead>
								<tr>
									<th class="col-md-4 ">Año</th>
									<th class="col-md-4 ">Mes</th>
									<th class="col-md-4 ">Importe</th>
								
								</tr>
							</thead>
							<tbody>
								@foreach($cuotas as $cuota )
								<tr>

									<td class="col-md-4 ">{{ $cuota->cuota->anio}}</td>
									<td class="col-md-4 ">{{ $cuota->cuota->mes}}</td>
									<td class="col-md-4 ">{{ $cuota->importe}}</td>

								</tr>
								@endforeach
							</tbody>								
								
						</table>
					</div>

					<div class="form-group row">
						<table>
							<tr>
								<td class="col-md-4 "><strong>Importe:</strong> </td>
								<td class="col-md-4 ">{{ $recibo->importe}}</td>
							</tr>
						</table>
					</div>

					<div class="form-group row">
						<div class="col-md-4 ">
							<a href="{{route('recibos.imprimir_recibo',[$recibo->id])}}" class="btn btn-sm btn-primary btn-sm-right">Imprimir</a>
						</div>
					</div>
				</div>
					
			</div>

		</div>
		
	</div>
	
</div>
@endsection