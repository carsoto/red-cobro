@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Gestión Diaria
@endsection

@section('contentheader_title')
	Gestión Diaria
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

						<div class="panel panel-primary">
							<!-- Default panel contents -->
							<div class="panel-heading" style="text-align: center;"><strong>MI AGENDA DE GESTIÓN</strong></div>
							<div class="panel-body">
								<table class="table table-striped">
									<thead>
										<th>Gestión</th>
										<th>Al día</th>
										<th>Lo que no hice</th>
										<th>Gestionar hoy</th>
										<th>Por vecer</th>
										<th>Total asignado</th>
									</thead>
									<tbody>
										<tr>
											<td>LLAMADOS</td>
											<td><a href="{{ route('deudores.index') }}">125</a></td>
											<td><a href="{{ route('deudores.index') }}">20</a></td>
											<td><a href="{{ route('deudores.index') }}">46</a></td>
											<td><a href="{{ route('deudores.index') }}">95</a></td>
											<td rowspan="7" style="text-align: center; vertical-align: center;"><a href="{{ route('deudores.index') }}">286</a></td>
										</tr>
										<tr>
											<td>MAIL</td>
											<td></td>
											<td><a href="{{ route('deudores.index') }}">30</a></td>
											<td><a href="{{ route('deudores.index') }}">40</a></td>
											<td><a href="{{ route('deudores.index') }}">15</a></td>
										</tr>
										<tr>
											<td>SMS</td>
											<td></td>
											<td><a href="{{ route('deudores.index') }}">5</a></td>
											<td><a href="{{ route('deudores.index') }}">7</a></td>
											<td><a href="{{ route('deudores.index') }}">4</a></td>
										</tr>
										<tr>
											<td>WHATSAPP</td>
											<td></td>
											<td><a href="{{ route('deudores.index') }}">10</a></td>
											<td><a href="{{ route('deudores.index') }}">15</a></td>
											<td><a href="{{ route('deudores.index') }}">17</a></td>
										</tr>
										<tr>
											<td>TERRENO</td>
											<td></td>
											<td><a href="{{ route('deudores.index') }}">0</a></td>
											<td><a href="{{ route('deudores.index') }}">0</a></td>
											<td><a href="{{ route('deudores.index') }}">2</a></td>
										</tr>
									</tbody>
									<tfoot>
										<tr>
											<th>CASOS</th>
											<th><a href="{{ route('deudores.index') }}">125</a></th>
											<th><a href="{{ route('deudores.index') }}">65</a></th>
											<th><a href="{{ route('deudores.index') }}">108</a></th>
											<th><a href="{{ route('deudores.index') }}">133</a></th>
										</tr>
									</tfoot>
								</table>
							</div>
						</div>

						<div class="panel panel-primary">
							<!-- Default panel contents -->
							<div class="panel-heading" style="text-align: center;"><strong>MI RESUMEN DE GESTIÓN</strong></div>
							<div class="panel-body">
								<div class="panel-body">
								<table class="table table-striped">
									<thead>
										<th>Gestión</th>
										<th>Hoy</th>
										<th>1 Semana</th>
										<th>2 Semanas</th>
										<th>Este mes</th>
										<th>Este año</th>
									</thead>
									<tbody>
										<tr>
											<td>LLAMADOS SALIENTES</td>
											<td><a href="{{ route('deudores.index') }}">115</a></td>
											<td><a href="{{ route('deudores.index') }}">575</a></td>
											<td><a href="{{ route('deudores.index') }}">1150</a></td>
											<td><a href="{{ route('deudores.index') }}">4600</a></td>
											<td><a href="{{ route('deudores.index') }}">13800</a></td>
										</tr>
										<tr>
											<td>LLAMADOS RECIBIDOS</td>
											<td><a href="{{ route('deudores.index') }}">5</a></td>
											<td><a href="{{ route('deudores.index') }}">25</a></td>
											<td><a href="{{ route('deudores.index') }}">50</a></td>
											<td><a href="{{ route('deudores.index') }}">200</a></td>
											<td><a href="{{ route('deudores.index') }}">600</a></td>
										</tr>
										<tr>
											<td>MAIL</td>
											<td><a href="{{ route('deudores.index') }}">18</a></td>
											<td><a href="{{ route('deudores.index') }}">90</a></td>
											<td><a href="{{ route('deudores.index') }}">180</a></td>
											<td><a href="{{ route('deudores.index') }}">720</a></td>
											<td><a href="{{ route('deudores.index') }}">2160</a></td>
										</tr>
										<tr>
											<td>SMS</td>
											<td><a href="{{ route('deudores.index') }}">4</a></td>
											<td><a href="{{ route('deudores.index') }}">20</a></td>
											<td><a href="{{ route('deudores.index') }}">40</a></td>
											<td><a href="{{ route('deudores.index') }}">160</a></td>
											<td><a href="{{ route('deudores.index') }}">480</a></td>
										</tr>
										<tr>
											<td>WHATSAPP</td>
											<td><a href="{{ route('deudores.index') }}">19</a></td>
											<td><a href="{{ route('deudores.index') }}">95</a></td>
											<td><a href="{{ route('deudores.index') }}">190</a></td>
											<td><a href="{{ route('deudores.index') }}">760</a></td>
											<td><a href="{{ route('deudores.index') }}">2280</a></td>
										</tr>
										<tr>
											<td>TERRENO</td>
											<td>0</td>
											<td>0</td>
											<td>0</td>
											<td>0</td>
											<td>0</td>
										</tr>
									</tbody>
									<tfoot>
										<tr>
											<th>GESTIONES</th>
											<th><a href="{{ route('deudores.index') }}">161</a></th>
											<th><a href="{{ route('deudores.index') }}">805</a></th>
											<th><a href="{{ route('deudores.index') }}">1610</a></th>
											<th><a href="{{ route('deudores.index') }}">6440</a></th>
											<th><a href="{{ route('deudores.index') }}">19320</a></th>
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
	        		</div>
			    </div>
			</div>
		</div>
	</div>                   
@endsection