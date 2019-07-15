@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8 col-offset-2">
			<div class="card">
				<div class="card-header">
					Crear Cuota
				</div>
					<div class="card-body">
						<div class="form-group row">
							<form method="POST" action="{{ route('cuotas.store')}}">
								@csrf
								
								<table>
									<tr>
										<td>Mes</td>
										<td><input type="text" name="mes" id="mes" value=""></td>
									</tr>
									<tr>
										<td>Año</td>
										<td><input type="text" name="anio" id="anio" value=""></td>
									</tr>
									<tr>
										<td>Importe</td>
										<td><input type="text" name="importe" id="importe" value=""></td>
									</tr>										
									<tr>
										<td>Importe 2</td>
										<td><input type="text" name="importe2" id="importe2" value=""></td>
									</tr>	
									<tr>
										<td>Importe 3</td>
										<td><input type="text" name="importe3" id="importe3" value=""></td>
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