@extends('layouts.app')


@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10 col-offset-2">
			<div class="card">
				<div class="card-header">
					Lista de Recibos
					<div>
							<form method="GET" action="{{ route('recibos.index') }}" class="navbar-form pull-right"> 
							    <div class="input-group"> 
					                <input type="text" class="form-control" name="busqueda" placeholder="Busqueda" value ="{{$busqueda}}"> 
									 <span class="input-group-btn"> 
					                    <button type="submit" class="btn btn-default"> 
					                        <span class="glyphicon glyphicon-search">Buscar</span> 
					                    </button> 
					                </span> 
					            </div> 
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

				</div>
			</div>
			
		</div>
		
	</div>
	
</div>

@endsection