@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Usuarios
@endsection

@section('contentheader_title')
	Usuarios
@endsection

@section('contentheader_description')
	Listado
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="text-right">
							<a class="btn btn-info" href="{{ route('usuarios.create') }}" title="Nuevo usuario">
								<i class="fa fa-plus" style="vertical-align:middle" ></i> <span>Crear nuevo usuario</span>
							</a>	
						</div>
					</div>

					<div class="panel-body">
						
						<div class="table-responsive" style="padding-top: 15px;">
							<table id="tabla_usuarios" class="table data-tables table-striped table-hover" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>Nombre</th>
										<th>Correo electrónico</th>
										<th>Perfil</th>
										<th>Estado</th>
										<th class="no-sort"></th>
									</tr>
								</thead>

								<tfoot>
									<tr>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th class="actions"></th>
									</tr>
								</tfoot>

								<tbody>
									@foreach ($usuarios as $usuario)

									<tr>
										<td><a href="{{ route('usuarios.edit', encrypt($usuario->id)) }}">{{ $usuario->name }}</a></td>
										<td>{{ $usuario->email }}</td>
										<td>{{ $usuario->roles[0]->name }}</td>
										<td>{{ $usuario->status }}</td>
										<td class="actions">
											<ul class="list-inline" style="margin-bottom:0px;">
												<li><a href="{{ route('usuarios.edit', encrypt($usuario->id)) }}" title="Editar" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a></li>
												<li>
												{!!
													Form::open([
														'class'=>'delete',
														'url'  => route('usuarios.borrar', encrypt($usuario->id)),
														'method' => 'GET',
													])
												!!}

												<button class="btn btn-danger btn-xs" title="Eliminar"><i class="fa fa-trash"></i></button>

												{!! Form::close() !!}
												</li>
									      	</ul>
										</td>
									</tr>

									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection