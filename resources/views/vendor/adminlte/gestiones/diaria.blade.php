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
											<td>125</td>
											<td>20</td>
											<td>46</td>
											<td>95</td>
											<td rowspan="7" style="text-align: center; vertical-align: center;">286</td>
										</tr>
										<tr>
											<td>MAIL</td>
											<td></td>
											<td>30</td>
											<td>40</td>
											<td>15</td>
										</tr>
										<tr>
											<td>SMS</td>
											<td></td>
											<td>5</td>
											<td>7</td>
											<td>4</td>
										</tr>
										<tr>
											<td>WHATSAPP</td>
											<td></td>
											<td>10</td>
											<td>15</td>
											<td>17</td>
										</tr>
										<tr>
											<td>TERRENO</td>
											<td></td>
											<td>0</td>
											<td>0</td>
											<td>2</td>
										</tr>
									</tbody>
									<tfoot>
										<tr>
											<th>CASOS</th>
											<th>125</th>
											<th>65</th>
											<th>108</th>
											<th>133</th>
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
											<td>115</td>
											<td>575</td>
											<td>1150</td>
											<td>4600</td>
											<td>13800</td>
										</tr>
										<tr>
											<td>LLAMADOS RECIBIDOS</td>
											<td>5</td>
											<td>25</td>
											<td>50</td>
											<td>200</td>
											<td>600</td>
										</tr>
										<tr>
											<td>MAIL</td>
											<td>18</td>
											<td>90</td>
											<td>180</td>
											<td>720</td>
											<td>2160</td>
										</tr>
										<tr>
											<td>SMS</td>
											<td>4</td>
											<td>20</td>
											<td>40</td>
											<td>160</td>
											<td>480</td>
										</tr>
										<tr>
											<td>WHATSAPP</td>
											<td>19</td>
											<td>95</td>
											<td>190</td>
											<td>760</td>
											<td>2280</td>
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
											<th>161</th>
											<th>805</th>
											<th>1610</th>
											<th>6440</th>
											<th>19320</th>
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