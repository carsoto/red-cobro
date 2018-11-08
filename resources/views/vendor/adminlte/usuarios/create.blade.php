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
		            <div class="box-body">
	                    {!! Form::open(['route' => 'usuarios.store']) !!}

	                        @include('adminlte::usuarios.form')

	                    {!! Form::close() !!}
		            </div>
		        </div>
			</div>
		</div>
	</div>
@endsection