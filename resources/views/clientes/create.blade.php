@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8 col-offset-2">
			<div class="card">
				<div class="card-header">
					Crear Cliente
				</div>
					<div class="card-body">
						<div class="form-group row">
							<form method="POST" action="{{ route('clientes.store')}}">
								@csrf
								
								<table>
									<tr>
										<td>Nombre</td>
										<td><input type="text" name="nombre" id="nombre" value=""></td>
									</tr>
									<tr>
										<td>Apellido</td>
										<td><input type="text" name="apellido" id="apellido" value=""></td>
									</tr>
									<tr>
										<td>DNI</td>
										<td><input type="text" name="dni" id="dni" value=""></td>
									</tr>	
									<tr>
										<td>Direccion</td>
										<td><input type="text" name="direccion" id="direccion" value=""></td>
									</tr>	
									<tr>
										<td>Telefono</td>
										<td><input type="text" name="telefono" id="telefono" value=""></td>
									</tr>
									<tr>
										<td>Tipo Cuota</td>
										<td>
											<input type="radio" name="tipo_cuota" id="tipo_cuota" value="TIPO1">TIPO1<br>
											<input type="radio" name="tipo_cuota" id="tipo_cuota" value="TIPO2">TIPO2<br>
											<input type="radio" name="tipo_cuota" id="tipo_cuota" value="TIPO3">TIPO3
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