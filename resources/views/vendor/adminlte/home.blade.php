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
				<div class="box box-primary" style="text-align: center;">
					<div class="box-header with-border">
						<h3 class="box-title">Sección en construcción</h3>
					</div>
					<div class="box-body">
						<img src="{{ asset('public/images/engranajes.gif') }}">
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

<!--
@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-lg-12">
				<div class="box box-primary">
					<!-- /.box-header --
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
-->