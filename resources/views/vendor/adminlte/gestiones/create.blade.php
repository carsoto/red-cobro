@extends('adminlte::layouts.app')

@section('htmlheader_title')
	
@endsection

@section('contentheader_title')
	
@endsection

@section('contentheader_description')
	Crear
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="text-center">
							Nuevo
						</div>
					</div>

					<div class="panel-body">
						{!! Form::open(['action' => ['UserController@store'], 'files' => true]) !!}

						
						@include('adminlte::usuarios.form')
						<hr>
						<div class="text-right">
							<a class="btn btn-danger" href="{{ route('usuarios.index') }}" style="width:100px;"><i class="fa fa-angle-double-left"></i> Cancelar</a>
							<button type="submit" class="btn btn-success" style="width:100px;"><i class="fa fa-save"></i> Guardar</button>
						</div>

						{!! Form::close() !!}
						
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection