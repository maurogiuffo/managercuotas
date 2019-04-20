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
										<td>Mes</td>
										<td><input type="text" name="mes" id="mes" value="{{ $cuota->mes }}"></td>
									</tr>
									<tr>
										<td>Año</td>
										<td><input type="text" name="anio" id="anio" value="{{ $cuota->anio }}"></td>
									</tr>
									<tr>
										<td>Importe</td>
										<td><input type="text" name="importe" id="importe" value="{{ $cuota->importe }}"></td>
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