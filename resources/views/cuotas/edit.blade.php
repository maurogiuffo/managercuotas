@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8 col-offset-2">
			<div class="card">
				<div class="card-header">
					Editar Cuota
				</div>
					<div class="card-body">
						<div class="form-group row">
							<form method="POST" action="{{ route('cuotas.update',$cuota->id) }}" enctype="multipart/form-data">
								@method('PUT')
								@csrf
								<input type="hidden" name="id" id="id" value="{{ $cuota->id }}">

								<table>
									<tr>
										<td class="col-md-8 ">Mes</td>
										<td><input type="text" name="mes" id="mes" value="{{ $cuota->mes }}"></td>
									</tr>
									<tr>
										<td class="col-md-8 ">Año</td>
										<td><input type="text" name="anio" id="anio" value="{{ $cuota->anio }}"></td>
									</tr>
									<tr>
										<td class="col-md-8 ">Importe</td>
										<td><input type="text" name="importe" id="importe" value="{{ $cuota->importe }}"></td>
									</tr>										
									<tr>
										<td class="col-md-8 ">Importe 2</td>
										<td><input type="text" name="importe2" id="importe2" value="{{ $cuota->importe2 }}"></td>
									</tr>	
									<tr>
										<td class="col-md-8 ">Importe 3</td>
										<td><input type="text" name="importe3" id="importe3" value="{{ $cuota->importe3 }}"></td>
									</tr>
									<tr>
										<td class="col-md-8 ">Importe 4</td>
										<td><input type="text" name="importe4" id="importe4" value="{{ $cuota->importe4 }}"></td>
									</tr>
									<tr>
										<td class="col-md-8 ">Importe 5</td>
										<td><input type="text" name="importe5" id="importe5" value="{{ $cuota->importe5 }}"></td>
									</tr>
									<tr>
										<td class="col-md-8 ">Importe 6</td>
										<td><input type="text" name="importe6" id="importe6" value="{{ $cuota->importe6 }}"></td>
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