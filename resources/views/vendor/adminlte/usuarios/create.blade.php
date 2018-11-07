@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Usuarios
@endsection

@section('contentheader_title')
	Usuarios
@endsection

@section('contentheader_description')
	Crear
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-lg-12">
				<div class="box box-primary">
					<div class="box-header with-border">
						<!--<h3 class="box-title">Nueva gestión</h3>-->
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						@include('adminlte::usuarios.form')
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection