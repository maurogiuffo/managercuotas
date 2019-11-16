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
										<td class="col-md-4 ">Nombre</td>
										<td><input type="text" name="nombre" id="nombre" value="{{ $cliente->nombre }}"></td>
									</tr>
									<tr>
										<td class="col-md-4 ">Apellido</td>
										<td><input type="text" name="apellido" id="apellido" value="{{ $cliente->apellido }}"></td>
									</tr>
									<tr>
										<td class="col-md-4 ">DNI</td>
										<td><input type="text" name="dni" id="dni" value="{{ $cliente->dni }}"></td>
									</tr>	
									<tr>
										<td class="col-md-4 ">Direccion</td>
										<td><input type="text" name="direccion" id="direccion" value="{{ $cliente->direccion }}"></td>
									</tr>	
									<tr>
										<td class="col-md-4 ">Telefono</td>
										<td><input type="text" name="telefono" id="telefono" value="{{ $cliente->telefono }}"></td>
									</tr>
									<tr>
										<td class="col-md-4 ">Mail</td>
										<td><input type="text" name="mail" id="mail" value="{{ $cliente->mail }}"></td>
									</tr>
									<tr>
										<td class="col-md-4 ">Tipo de Cuota</td>
										<td>
											<input type="radio" name="tipo_cuota" id="tipo_cuota" value="TIPO1" {{ $cliente->tipo_cuota == 'TIPO1' ? "checked" : "" }}>TIPO1<br>
											<input type="radio" name="tipo_cuota" id="tipo_cuota" value="TIPO2" {{ $cliente->tipo_cuota == 'TIPO2' ? "checked" : "" }}>TIPO2<br>
											<input type="radio" name="tipo_cuota" id="tipo_cuota" value="TIPO3" {{ $cliente->tipo_cuota == 'TIPO3' ? "checked" : "" }}>TIPO3<br>
											<input type="radio" name="tipo_cuota" id="tipo_cuota" value="TIPO4" {{ $cliente->tipo_cuota == 'TIPO4' ? "checked" : "" }}>TIPO4<br>
											<input type="radio" name="tipo_cuota" id="tipo_cuota" value="TIPO5" {{ $cliente->tipo_cuota == 'TIPO5' ? "checked" : "" }}>TIPO5<br>
											<input type="radio" name="tipo_cuota" id="tipo_cuota" value="TIPO6" {{ $cliente->tipo_cuota == 'TIPO6' ? "checked" : "" }}>TIPO6
										</td>
									</tr>
									<tr>
										<td class="col-md-4 ">Observaciones</td>
										<td><textarea name="observaciones" id="observaciones" rows="10" cols="50">{{ $cliente->observaciones }}</textarea>
										</td>
									</tr>

								</table>

								<button  type="submit" class="btn btn-sm btn-primary">{{ __('Guardar') }}</button>	
		                     </form>
  				
						</div>
					</div>
			</div>
			
		</div>
		
	</div>
	
</div>

@endsection