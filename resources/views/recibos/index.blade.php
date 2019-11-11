@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10 col-offset-2">
			<div class="card">
				<div class="card-header">
					Lista de Recibos
				</div>
				@if(Auth::user()->isAdmin())
				<div class="card-header">
					<div>
						<form method="GET" action="{{ route('recibos.index') }}" class="navbar-form pull-right"> 
							<table>

								<tr>
									<td>
										
										<div class="input-group"> 
									    	<div >
									    		Desde
							                	<input class="form-control" id="fechaInicial" name="fechaInicial"  placeholder="AA/MM/DD" value="{{$fechaInicial}}"  type="date"/>
							                </div>
							                <div >
							                	Hasta
							                	<input class="form-control" id="fechaFinal" name="fechaFinal"  placeholder="AA/MM/DD" value="{{$fechaFinal}}" type="date"/>
							                </div>
							                <div>
					                	 		Forma de Pago
												<select class="form-control" id="forma_pago" name="forma_pago">
													<option value="TODOS" >TODOS</option>
													<option value="EFECTIVO" >EFECTIVO</option>
													<option value="DEBITO" >DEBITO</option>
													<option value="CHEQUE">CHEQUE</option>
												</select>
												
												<script type="text/javascript">
													document.getElementById('forma_pago').value= {{$forma_pago}};
												</script>


											</div>

											 <div>
					                	 		Usuario
												<select class="form-control" id="id_usuario" name="id_usuario">
													<option value="" >TODOS</option>
													<option value="4" >USUARIO1</option>
													<option value="5" >USUARIO2</option>
												</select>
											</div>

										 </div> 


									</td>
								
									<td>
										<div class="col-md-10 col-offset-2">
								 
											 <span class="input-group-btn"> 
							                    <button type="submit" class="btn btn-default"> 
							                        <span class="glyphicon glyphicon-search">Buscar</span> 
							                    </button> 
							                </span> 

							             </div>
							           
									</td>
									
								</tr>
								
							</table>
						    
					    </form> 
					</div>
				</div>
				@endif
				
				<div class="card-body">
					

					<table width="100%">
				  		<thead>
				  			<tr>
				  				<th>Numero</th>
				  				<th>Fecha</th>
				  				
				  				<th>Cliente</th>
				  				<th>Forma de Pago</th>
				  				<th>Importe</th>
				  				<th>Usuario</th>
								  
				  				<th></th>
				  				<th></th>
				  				<th></th>
				  			</tr>
				  		</thead>
				  		<tbody>
				  			@foreach($recibos as $recibo )
				  			<tr>
				  				<td>{{ $recibo->id}}</td>
				  				<td>{{ $recibo->created_at}}</td>
				  				<td>{{ $recibo->cliente->nombre }} {{ $recibo->cliente->apellido}}</td>
				  				<td>{{ $recibo->forma_pago}}</td>
				  				<td>{{ $recibo->importe}}</td>
				  				<td>{{ $recibo->user->name}}</td>

								<td><a href="{{ route('recibos.show',$recibo->id)}}" class="btn btn-sm btn-primary">Ver</a></td>
								@if(Auth::user()->isAdmin())
				  				<td><!--<a href="{{ route('recibos.edit',$recibo->id)}}" class="btn btn-sm btn-primary">Editar</a>--></td>
				  				<td>
									<form method="POST" action="{{ route('recibos.destroy',$recibo->id) }}">
										  @csrf
										   @method('DELETE')
										  <input type="hidden" id="{{ $recibo->id }}">
										<button type="submit" class="btn btn-sm btn-primary">
		                                {{ __('Eliminar') }}
		                               	</button>	
		                            </form>
								  </td>
								@endif
				  			</tr>
				  			@endforeach
				  		</tbody>
				  	</table>
					{{$recibos->render()}}
					
				@if(Auth::user()->isAdmin())
					<div class="card-body">
						Total: {{$total}}
					</div>

					<form method="POST" action="{{ route('recibos.imprimir_lista') }}" class="navbar-form pull-right">
						@csrf
		            	<input  id="fechaInicial" name="fechaInicial"  value="{{$fechaInicial}}"  type="hidden"/>
		            	<input  id="fechaFinal" name="fechaFinal" value="{{$fechaFinal}}" type="hidden"/>
		            	<input  id="forma_pago" name="forma_pago"  value="{{$forma_pago}}" type="hidden"/>
		                <button type="submit" class="btn btn-sm btn-primary"> 
		                    <span >Imprimir</span> 
		                </button> 
					</form> 
				@endif
				</div>
			</div>


			
		</div>
		
	</div>
	
</div>

@endsection