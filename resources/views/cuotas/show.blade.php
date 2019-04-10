@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8 col-offset-2">
			<div class="card">
				<div class="card-header">
					Ver Cuota
				</div>
					<div class="card-body">
						<div class="form-group row">
							
								<table>
									<tr>
										<td>Mes</td>
										<td>{{ $cuota->mes }}</td>
									</tr>
									<tr>
										<td>Año</td>
										<td>{{ $cuota->anio }}</td>
									</tr>
									<tr>
										<td>Importe</td>
										<td>{{ $cuota->importe }}</td>
									</tr>	
									
								</table>

							
						</div>
					</div>
			</div>
			
		</div>
		
	</div>
	
</div>

@endsection