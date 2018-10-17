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
							<table id='tabla_usuarios' class="table table-hover table-bordered table-striped datatable" style="width:100%">
		                        <thead>
		                            <tr>
		                                <th>Nombre</th>
		                                <th>Correo electrónico</th>
		                                <th>Perfil</th>
		                                <th>Estado</th>
		                                <th><i class="fa fa-gears"></i></th>
		                            </tr>
		                        </thead>
		                    </table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection