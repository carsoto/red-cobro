@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Carteras
@endsection

@section('contentheader_title')
	Carteras
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
	                    {!! Form::model($cartera, ['route' => ['carteras.update', encrypt($cartera->idcarteras)], 'method' => 'put']) !!}

                        	@include('adminlte::carteras.form')

                   		{!! Form::close() !!}
		            </div>
		        </div>
			</div>
		</div>
	</div>
@endsection