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
										<td class="col-md-4 ">Mes</td>
										<td>{{ $cuota->mes }}</td>
									</tr>
									<tr>
										<td class="col-md-4 ">Año</td>
										<td>{{ $cuota->anio }}</td>
									</tr>
									<tr>
										<td class="col-md-4 ">Importe 1</td>
										<td>{{ $cuota->importe }}</td>
									</tr>
									<tr>
										<td class="col-md-4 ">Importe 2</td>
										<td>{{ $cuota->importe2 }}</td>
									</tr>	
									<tr>
										<td class="col-md-4 ">Importe 3</td>
										<td>{{ $cuota->importe3 }}</td>
									</tr>		
									
								</table>

							
						</div>
					</div>
			</div>
			
		</div>
		
	</div>
	
</div>

@endsection