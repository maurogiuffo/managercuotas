@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10 col-offset-2">
			<div class="card">
				<div class="card-header">
					Lista de Recibos
				</div>
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

				
				<div class="card-body">
					

					<table width="100%">
				  		<thead>
				  			<tr>
				  				<th>Numero</th>
				  				<th>Fecha</th>
				  				
				  				<th>Cliente</th>
				  				<th>Forma de Pago</th>
				  				<th>Importe</th>
								  
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
								<td><a href="{{ route('recibos.show',$recibo->id)}}" class="btn btn-sm btn-primary">Ver</a></td>
								@if(Auth::user()->isSuperAdmin())
				  				<td><a href="{{ route('recibos.edit',$recibo->id)}}" class="btn btn-sm btn-primary">Editar</a></td>
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

				<div class="card-body">
					Total: {{$total}}
				</div>
				</div>
			</div>
			
		</div>
		
	</div>
	
</div>

@endsection