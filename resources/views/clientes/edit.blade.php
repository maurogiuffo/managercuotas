@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8 col-offset-2">
			<div class="card">
				<div class="card-header">
					Editar Cliente
				</div>
					<div class="card-body">
						<div class="form-group row">
							<form method="POST" action="{{ route('clientes.update',$cliente->id) }}" enctype="multipart/form-data">
								@method('PUT')
								@csrf
								<input type="hidden" name="id" id="id" value="{{ $cliente->id }}">

								<table>
									<tr>
										<td>Nombre</td>
										<td><input type="text" name="nombre" id="nombre" value="{{ $cliente->nombre }}"></td>
									</tr>
									<tr>
										<td>Apellido</td>
										<td><input type="text" name="apellido" id="apellido" value="{{ $cliente->apellido }}"></td>
									</tr>
									<tr>
										<td>DNI</td>
										<td><input type="text" name="dni" id="dni" value="{{ $cliente->dni }}"></td>
									</tr>	
									<tr>
										<td>Direccion</td>
										<td><input type="text" name="direccion" id="direccion" value="{{ $cliente->direccion }}"></td>
									</tr>	
									<tr>
										<td>Telefono</td>
										<td><input type="text" name="telefono" id="telefono" value="{{ $cliente->telefono }}"></td>
									</tr>
									<tr>
										<td>Tipo Cuota</td>
										<td>
											<input type="radio" name="tipo_cuota" id="tipo_cuota" value="TIPO1" {{ $cliente->tipo_cuota == 'TIPO1' ? "checked" : "" }}>TIPO1<br>
											<input type="radio" name="tipo_cuota" id="tipo_cuota" value="TIPO2" {{ $cliente->tipo_cuota == 'TIPO2' ? "checked" : "" }}>TIPO2<br>
											<input type="radio" name="tipo_cuota" id="tipo_cuota" value="TIPO3" {{ $cliente->tipo_cuota == 'TIPO3' ? "checked" : "" }}>TIPO3
										</td>
									</tr>										
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