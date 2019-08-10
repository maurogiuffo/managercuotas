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
										<td>
											<select name="mes" id="mes">
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
												<option value="6">6</option>
												<option value="7">7</option>
												<option value="8">8</option>
												<option value="9">9</option>
												<option value="10">10</option>
												<option value="11">11</option>
												<option value="12">12</option>
											</select>

									</tr>
									<tr>
										<td>Año</td>
										<td>
											<select name="anio" id="anio">
												<option value="2018">2018</option>
												<option value="2019">2019</option>
												<option value="2020">2020</option>
												<option value="2021">2021</option>
												<option value="2022">2022</option>
												<option value="2023">2023</option>
												<option value="2024">2024</option>
												<option value="2025">2025</option>
											</select>


											</td>
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