@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading"></div>
					<div class="panel-body">
						<div>
							<canvas id="bar-chart-uno" data-render="chart-js"></canvas>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading"></div>
					<div class="panel-body">
						<div>
							<canvas id="bar-chart-dos" data-render="chart-js"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

