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
										<td>Nombre</td>
										<td>{{ $cliente->nombre }}</td>
									</tr>
									<tr>
										<td>Apellido</td>
										<td>{{ $cliente->apellido }}</td>
									</tr>
									<tr>
										<td>DNI</td>
										<td>{{ $cliente->dni }}</td>
									</tr>	
									<tr>
										<td>Direccion</td>
										<td>{{ $cliente->direccion }}</td>
									</tr>	
									<tr>
										<td>Telefono</td>
										<td>{{ $cliente->telefono }}</td>
									</tr>	
								</table>

							
						</div>
					</div>
			</div>
			
		</div>
		
	</div>
	
</div>

@endsection