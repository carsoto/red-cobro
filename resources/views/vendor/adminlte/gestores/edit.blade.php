@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Gestores
@endsection

@section('contentheader_title')
	Gestores
@endsection

@section('contentheader_description')
	Editar
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-lg-12">
				<div class="box box-primary">
		            <div class="box-body">
	                    {!! Form::model($gestor, ['route' => ['gestores.update', encrypt($gestor->idgestores)], 'method' => 'put']) !!}

                        	@include('adminlte::gestores.form')

                   		{!! Form::close() !!}
		            </div>
		        </div>
			</div>
		</div>
	</div>
@endsection