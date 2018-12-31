@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Proveedores
@endsection

@section('contentheader_title')
	Proveedores
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
	                    {!! Form::open(['route' => 'proveedores.store']) !!}

	                        @include('adminlte::proveedores.form')

	                    {!! Form::close() !!}
		            </div>
		        </div>
			</div>
		</div>
	</div>
@endsection