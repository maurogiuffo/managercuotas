@extends('layouts.app')


@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8 col-offset-2">
			<div class="card">
				<div class="card-header">
					Lista de Cuotas
					<div>
							<form method="GET" action="{{ route('cuotas.index') }}" class="navbar-form pull-right"> 
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
					<div>
						<a href="{{route('cuotas.create')}}" class="btn btn-sm btn-primary btn-sm-right">
							Crear
						</a>
					</div>
					



				  	<table>
				  		<thead>
				  			<tr>
				  				<th>Mes</th>
				  				<th>Año</th>
				  				<th>Importe</th>
				  				
				  				<th></th>
				  				<th></th>
				  				<th></th>
				  			</tr>
				  		</thead>
				  		<tbody>
				  			@foreach($cuotas as $cuota )
				  			<tr>
				  				<td>{{ $cuota->mes}}</td>
				  				<td>{{ $cuota->anio}}</td>
				  				<td>{{ $cuota->importe}}</td>
				  				<td><a href="{{ route('cuotas.show',$cuota->id)}}" class="btn btn-sm btn-primary">Ver</a></td>
				  				<td><a href="{{ route('cuotas.edit',$cuota->id)}}" class="btn btn-sm btn-primary">Editar</a></td>
				  				<td>
									<form method="POST" action="{{ route('cuotas.destroy',$cuota->id) }}">
										  @csrf
										   @method('DELETE')
										  <input type="hidden" id="{{ $cuota->id }}">
										<button type="submit" class="btn btn-sm btn-primary">
		                                {{ __('Eliminar') }}
		                               	</button>	
		                            </form>
				  				</td>
				  			</tr>
				  			@endforeach
				  		</tbody>
				  	</table>
					{{$cuotas->render()}}

				</div>
			</div>
			
		</div>
		
	</div>
	
</div>

@endsection