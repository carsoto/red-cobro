@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('contentheader_title')
	Dashboard
@endsection

@section('contentheader_description')
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-lg-12">
				<div class="box box-primary">
					<!-- /.box-header -->
					<div class="box-body">
						@if(Auth::user()->hasRole('admin'))
						    <div>Acceso administrador</div>

						@elseif(Auth::user()->hasRole('supervisor'))
						    <div>Acceso supervisor</div>

						@elseif(Auth::user()->hasRole('agente'))
						    <div>Acceso agente</div>

						@endif

						{{ trans('adminlte_lang::message.logged') }}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

