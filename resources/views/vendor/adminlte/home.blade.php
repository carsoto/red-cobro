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
			<div class="col-md-6">
				<div class="box box-success">
					<div class="box-header"><strong>Asignación Mensual en RUT</strong></div>
					<div class="box-body">
						<div>
							<canvas id="asignacion-mensual-rut" data-render="chart-js"></canvas>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="box box-danger">
					<div class="box-header"><strong>Asignación Mensual en M$</strong></div>
					<div class="box-body">
						<div>
							<canvas id="asignacion-mensual-m" data-render="chart-js"></canvas>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="box box-info">
					<div class="box-header"><strong>Histórico de asignación en casos</strong></div>
					<div class="box-body">
						<div>
							<canvas id="historico-casos" data-render="chart-js"></canvas>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="box box-warning">
					<div class="box-header"><strong>Histórico de asignación en montos</strong></div>
					<div class="box-body">
						<div>
							<canvas id="historico-montos" data-render="chart-js"></canvas>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="box box-primary">
					<div class="box-header"><strong>Histórico de contactabilidad</strong></div>
					<div class="box-body">
						<div>
							<canvas id="historico-contactabilidad" data-render="chart-js"></canvas>
						</div>
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