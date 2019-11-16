@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8 col-offset-2">
			<div class="card">
				<div class="card-header">
					Ver Cliente
				</div>
					<div class="card-body">
						<div class="form-group row">
							
								<table>
									<tr>
										<td class="col-md-4 ">Nombre</td>
										<td>{{ $cliente->nombre }}</td>
									</tr>
									<tr>
										<td class="col-md-4 ">Apellido</td>
										<td>{{ $cliente->apellido }}</td>
									</tr>
									<tr>
										<td class="col-md-4 ">DNI</td>
										<td>{{ $cliente->dni }}</td>
									</tr>	
									<tr>
										<td class="col-md-4 ">Direccion</td>
										<td>{{ $cliente->direccion }}</td>
									</tr>	
									<tr>
										<td class="col-md-4 ">Telefono</td>
										<td>{{ $cliente->telefono }}</td>
									</tr>
									<tr>
										<td class="col-md-4 ">Mail</td>
										<td>{{ $cliente->mail }}</td>
									</tr>
									<tr>
										<td class="col-md-4 ">Tipo de Cuota</td>
										<td>
											{{ $cliente->tipo_cuota}}
										</td>
									</tr>
									<tr>
										<td class="col-md-4 ">Observaciones</td>
										<td><textarea name="observaciones" id="observaciones" rows="10" cols="50"  disabled>{{ $cliente->observaciones }}</textarea>
										</td>
									</tr>

								</table>

								</table>

							
						</div>
					</div>
			</div>
			
		</div>
		
	</div>
	
</div>

@endsection