@extends('layouts.app')

@section('content')
<div class="container">

	<div class="row justify-content-center">
		<div class="col-md-8 col-offset-2">
			<div class="card">
			
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Recibo</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Cuotas Faltantes</a>
					</li>

				</ul>
			
				<div class="card-body">
					

					
					<div class="tab-content" id="myTabContent">

						<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
						
							<div class="form-group row">
								<form method="POST" action="{{ route('recibos.store')}}">
									@csrf
									<input type="hidden" name="generarnueva"  value="0">

									<input type="hidden" name="id_cliente" id="id_cliente" value="{{ $cliente->id }}">

									<table>
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
											<td>
												<select id="forma_pago" name="forma_pago">
													<option value="EFECTIVO" selected>EFECTIVO</option>
													<option value="DEBITO">DEBITO</option>
													<option value="CHEQUE">CHEQUE</option>
												</select>
											</td>
										</tr>	
										
									</table>

									<table>
										<thead>
											<tr>
											<th class="col-md-4 ">Seleccionar</th>
											<th class="col-md-4 " >Año</th>
											<th class="col-md-4 " >Mes</th>
											<th class="col-md-4 " >Importe</th>
											
											</tr>
										</thead>
										<tbody>
											@foreach($cuotas as $cuota )
											<tr>
												<td class="col-md-4 "><input name="id_cuota[{{ $cuota->id}}]" type="checkbox" value="{{ $cuota->id}}"></td>

												<td class="col-md-4 " >{{ $cuota->cuota->anio}}</td>
												<td class="col-md-4 " >{{ $cuota->cuota->mes}}</td>
												<td class="col-md-4 " >{{ $cuota->saldo}}</td>

											</tr>
											@endforeach
										</tbody>
									</table>


									<button type="submit" class="btn btn-sm btn-primary">{{ __('Guardar') }}</button>	
								</form>
							</div>
						</div>
						
						<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

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
			
		</div>
		
	</div>


	
</div>

@endsection