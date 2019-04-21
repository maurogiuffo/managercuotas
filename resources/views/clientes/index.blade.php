@extends('layouts.app')


@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8 col-offset-2">
			<div class="card">
				<div class="card-header">
					Lista de Clientes
					<div>
							<form method="GET" action="{{ route('clientes.index') }}" class="navbar-form pull-right"> 
							    <div class="input-group"> 
					                <input type="text" class="form-control" name="nombre" placeholder="Busqueda" value ="{{$nombre}}"> 
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
						<a href="{{route('clientes.create')}}" class="btn btn-sm btn-primary btn-sm-right">
							Crear
						</a>
					</div>
					



				  	<table>
				  		<thead>
				  			<tr>
				  				<th>Nombre</th>
				  				<th>Apellido</th>
				  				<th>DNI</th>
				  				<th>Direccion</th>
				  				<th>Telefono</th>
				  				<th></th>
				  				<th></th>
				  				<th></th>
				  				<th></th>
				  			</tr>
				  		</thead>
				  		<tbody>
				  			@foreach($clientes as $cliente )
				  			<tr>
				  				<td>{{ $cliente->nombre}}</td>
				  				<td>{{ $cliente->apellido}}</td>
				  				<td>{{ $cliente->dni}}</td>
				  				<td>{{ $cliente->direccion}}</td>
				  				<td>{{ $cliente->telefono}}</td>
								  <td><a href="{{ route('clientes.show',$cliente->id)}}" class="btn btn-sm btn-primary">Ver</a></td>
								  
								@if(Auth::user()->isAdmin())
									
				  				<td><a href="{{ route('clientes.edit',$cliente->id)}}" class="btn btn-sm btn-primary">Editar</a></td>
				  				<td>
									<form method="POST" action="{{ route('clientes.destroy',$cliente->id) }}">
										  @csrf
										   @method('DELETE')
										  <input type="hidden" id="{{ $cliente->id }}">
										<button type="submit" class="btn btn-sm btn-primary">
		                                {{ __('Eliminar') }}
		                               	</button>	
		                            </form>
								</td>
								@endif

								<td><a href="{{ route('recibos.create',["id=$cliente->id"])}}" class="btn btn-sm btn-primary">Recibo</a></td>

				  			</tr>
				  			@endforeach
				  		</tbody>
				  	</table>
					{{$clientes->render()}}

				</div>
			</div>
			
		</div>
		
	</div>
	
</div>

@endsection