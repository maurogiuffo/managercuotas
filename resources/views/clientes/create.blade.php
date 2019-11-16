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
										<td class="col-md-4 " >Nombre</td>
										<td><input type="text" name="nombre" id="nombre" value=""></td>
									</tr>
									<tr>
										<td class="col-md-4 ">Apellido</td>
										<td><input type="text" name="apellido" id="apellido" value=""></td>
									</tr>
									<tr>
										<td class="col-md-4 ">DNI</td>
										<td><input type="text" name="dni" id="dni" value=""></td>
									</tr>	
									<tr>
										<td class="col-md-4 ">Direccion</td>
										<td><input type="text" name="direccion" id="direccion" value=""></td>
									</tr>	
									<tr>
										<td class="col-md-4 ">Telefono</td>
										<td><input type="text" name="telefono" id="telefono" value=""></td>
									</tr>
									<tr>
										<td class="col-md-4 ">Mail</td>
										<td><input type="text" name="mail" id="mail" value=""></td>
									</tr>
									<tr>
										<td class="col-md-4 ">Tipo Cuota</td>
										<td>
											<input type="radio" name="tipo_cuota" id="tipo_cuota" value="TIPO1">TIPO1<br>
											<input type="radio" name="tipo_cuota" id="tipo_cuota" value="TIPO2">TIPO2<br>
											<input type="radio" name="tipo_cuota" id="tipo_cuota" value="TIPO3">TIPO3<br>
											<input type="radio" name="tipo_cuota" id="tipo_cuota" value="TIPO4">TIPO4<br>
											<input type="radio" name="tipo_cuota" id="tipo_cuota" value="TIPO5">TIPO5<br>
											<input type="radio" name="tipo_cuota" id="tipo_cuota" value="TIPO6">TIPO6
										</td>
									</tr>
									<tr>
										<td class="col-md-4 ">Observaciones</td>
										<td><textarea name="observaciones" id="observaciones" rows="10" cols="50"></textarea>
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