@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">Home</div>

					<div class="panel-body">
						@if(Auth::user()->hasRole('admin'))
						    <div>Acceso como administrador</div>

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

