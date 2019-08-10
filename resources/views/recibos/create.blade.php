@extends('layouts.app')

@section('content')
<div class="container">


<div class="row justify-content-center">
		<div class="col-md-8 col-offset-2">
			<div class="card">
				<div class="card-header">
					Generar Cuotas Faltantes
				</div>
					<div class="card-body">
						<div class="form-group row">

							

							<form method="POST" action="{{ route('recibos.store')}}">
								@csrf
								<input type="hidden" name="generarnueva"  value="1">
								<input type="hidden" name="id_cliente" id="id_cliente" value="{{ $cliente->id }}">

								<select name="id_cuota" >
									<option value ="-1">Seleccionar un Mes/Año a generar</option>
									@foreach($cuotasacrear as $cuota )
										<option value ="{{ $cuota->id}}">{{ $cuota->anio}} - {{ $cuota->mes}}</option>
									@endforeach
									
								</select>

								<button type="submit" class="btn btn-sm btn-primary">{{ __('Generar') }}</button>	
		                     </form>


						</div>
					</div>
			</div>
			
		</div>
		
	</div>








	<div class="row justify-content-center">
		<div class="col-md-8 col-offset-2">
			<div class="card">
				<div class="card-header">
					Crear Recibo
				</div>
					<div class="card-body">
						<div class="form-group row">

							<form method="POST" action="{{ route('recibos.store')}}">
								@csrf
								<input type="hidden" name="generarnueva"  value="0">

								<input type="hidden" name="id_cliente" id="id_cliente" value="{{ $cliente->id }}">

								<table>
									<tr>
										<td>Cliente</td>
										<td>{{ $cliente->nombre}} {{ $cliente->apellido}}</td>
									</tr>
									<tr>
										<td>Direccion</td>
										<td>{{ $cliente->direccion}}</td>
									</tr>
									
									
								</table>

								<table>
									<thead>
										<tr>
										<th  class="col-md-8 col-offset-2" >Seleccionar</th>
										<th  class="col-md-8 col-offset-2" >Año</th>
										<th class="col-md-8 col-offset-2" >Mes</th>
										<th class="col-md-8 col-offset-2" >Importe</th>
										
										</tr>
									</thead>
									<tbody>
										@foreach($cuotas as $cuota )
										<tr>
											<td  class="col-md-8 col-offset-2" ><input name="id_cuota[{{ $cuota->id}}]" type="checkbox" value="{{ $cuota->id}}"></td>

											<td class="col-md-8 col-offset-2" >{{ $cuota->cuota->anio}}</td>
											<td class="col-md-8 col-offset-2" >{{ $cuota->cuota->mes}}</td>
											<td class="col-md-8 col-offset-2" >{{ $cuota->saldo}}</td>

										</tr>
										@endforeach
									</tbody>
								</table>


								<button type="submit" class="btn btn-sm btn-primary">{{ __('Guardar') }}</button>	
		                     </form>
  				


						</div>
					</div>
			</div>
			
		</div>
		
	</div>
	
</div>

@endsection