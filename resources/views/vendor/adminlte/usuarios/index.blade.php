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

				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title"></h3>
						<!-- Buttons, labels, and many other things can be placed here! -->
						<!-- Here is a label for example -->
							<a class="btn btn-sm btn-success" href="{{ route('usuarios.create') }}" title="Nuevo usuario">
								<i class="fa fa-plus" style="vertical-align:middle" ></i> <span>Crear nuevo usuario</span>
							</a>
						
					<!-- /.box-tools -->
					</div>
					<!-- /.box-header -->
					<div class="box-body">
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
					<!-- /.box-body -->
					<!--<div class="box-footer">
						The footer of the box
					</div>-->
				</div>
				
			</div>
		</div>
	</div>
@endsection