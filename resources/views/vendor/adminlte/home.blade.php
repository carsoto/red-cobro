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
					<?php
					$total_casos = 0;
					$total_operaciones = 0;
					$total_monto = 0;
					$total_gestiones = 0;
					$total_titular = 0;
					$total_tercero = 0;
					$total_sin_contacto = 0;
					$total_sin_gestion = 0;
					?>
					<div class="box-body">
						{!! Form::open(['id' => 'form-dashboard', 'method' => 'POST', 'route' => 'admin.cargar.dashboard']) !!}
						<div class="col-lg-4 col-md-4 col-sm-12">
							<div class="form-group"> 
								{!! Form::select('cartera', $carteras, NULL, array('class' => 'form-control input-sm', 'id' => 'select-filtro-cartera', 'placeholder' => 'SELECCIONAR TODAS LAS CARTERAS')) !!}
							</div>	
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12">
							<div class="form-group"> 
								{!! Form::select('marcas', $marcas, NULL, array('class' => 'form-control input-sm', 'id' => 'select-filtro-marca', 'placeholder' => 'SELECCIONAR TODAS LAS MARCAS')) !!}
							</div>	
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12">
							<button type="submit" class="btn btn-sm btn-primary btn-block btn-flat" style=""><i class="fa fa-refresh"></i> Actualizar dashboard</button>
						</div>
						{!! Form::close() !!}
						<br><br><br>
						<div class="table-responsive">
						<table class="table">
							<tr>
								<th>Marca</th>
								<th>Casos</th>
								<th>Operaciones</th>
								<th>Monto</th>
								<TH>Gestiones</TH>
								<th>Titular</th>
								<th>Tercero</th>
								<th>Contactabilidad</th>
								<th>Sin contacto</th>
								<th>Sin Gestion</th>
								<th>Intensidad</th>
							</tr>
							<?php
							foreach ($base as $key => $value) {
								?>
								<tr>
									<td><?php echo $value->MARCA ?></td>
									<td><a href="{{ ('exportarDashboard/individual/'.$marca_seleccionada.'/'.$value->MARCA.'/casos') }}"><?php echo number_format($value->casos,0,',','.') ?></a></td>
									<td><a href="{{ ('exportarDashboard/individual/'.$marca_seleccionada.'/'.$value->MARCA.'/operaciones') }}"><?php echo number_format($value->operaciones,0,',','.') ?></a></td>
									<td>{{ number_format($value->MONTO,0,',','.') }}</a></td>
									<td><a href="{{ ('exportarDashboard/individual/'.$marca_seleccionada.'/'.$value->MARCA.'/gestiones') }}"><?php echo number_format($value->GESTIONES,0,',','.') ?></a></td>
									<td><a href="{{ ('exportarDashboard/individual/'.$marca_seleccionada.'/'.$value->MARCA.'/titular') }}"><?php echo number_format($value->TITULAR,0,',','.') ?></a></td>
									<td><a href="{{ ('exportarDashboard/individual/'.$marca_seleccionada.'/'.$value->MARCA.'/tercero') }}"><?php echo number_format($value->TERCEROS,0,',','.') ?></a></td>
									<td><?php 
										$contactos =  $value->TITULAR+ $value->TERCEROS;
										if($contactos > 0) {
											echo number_format(($contactos*100)/$value->casos,0,',','.').'%';
										} else {
											echo '0%';
										}
									?>
									<td><a href="{{ ('exportarDashboard/individual/'.$marca_seleccionada.'/'.$value->MARCA.'/sin_contacto') }}"><?php echo number_format($value->SIN_CONTACTO,0,',','.') ?></a></td>
									<td><a href="{{ ('exportarDashboard/individual/'.$marca_seleccionada.'/'.$value->MARCA.'/sin_gestion') }}"><?php
									$contactos = $contactos+$value->SIN_CONTACTO;
									echo  number_format($value->casos - $contactos,0,',','.') ?>
									</td>

									<td><?php 
									if($value->casos > 0){
										echo number_format($value->GESTIONES/$value->casos,0,',','.');
									} else {
										echo '0';
									}
									
									?></a></td>
								</tr>
								<?php
								$total_casos = $total_casos+$value->casos;
								$total_operaciones = $total_operaciones+$value->operaciones;
								$total_monto = $total_monto+$value->MONTO;
								$total_gestiones = $total_gestiones+$value->GESTIONES;
								$total_titular = $total_titular+$value->TITULAR;
								$total_tercero = $total_tercero+$value->TERCEROS;
								$total_sin_contacto =$total_sin_contacto+$value->SIN_CONTACTO;

							}
							?>
							<tr>
								<td style="font-weight: bold;">TOTAL</td>
								<td style="font-weight: bold;"><a href="{{ ('exportarDashboard/total/'.$marca_seleccionada.'/0/casos') }}"><?php echo number_format($total_casos,0,',','.') ?></a></td>
								<td style="font-weight: bold;"><a href="{{ ('exportarDashboard/total/'.$marca_seleccionada.'/0/operaciones') }}"><?php echo number_format($total_operaciones,0,',','.') ?></a></td>
								<td style="font-weight: bold;"><?php echo number_format($total_monto,0,',','.') ?></td>
								<td style="font-weight: bold;"><a href="{{ ('exportarDashboard/total/'.$marca_seleccionada.'/0/gestiones') }}"><?php echo number_format($total_gestiones,0,',','.') ?></a></td>
								<td style="font-weight: bold;"><a href="{{ ('exportarDashboard/total/'.$marca_seleccionada.'/0/titular') }}"><?php echo number_format($total_titular,0,',','.') ?></a></td>
								<td style="font-weight: bold;"><a href="{{ ('exportarDashboard/total/'.$marca_seleccionada.'/0/tercero') }}"><?php echo number_format($total_tercero,0,',','.') ?></a></td>
								<td style="font-weight: bold;"><?php 
									$total_contacto = $total_titular+$total_tercero;
									if($total_contacto >0) {
										echo number_format(round(($total_contacto*100)/$total_casos),0,',','.').'%';
									}else{
										echo '0%';
									}
								?></a></td>
								<td style="font-weight: bold;"><a href="{{ ('exportarDashboard/total/'.$marca_seleccionada.'/0/sin_contacto') }}"><?php echo number_format($total_sin_contacto,0,',','.') ?></a></td>
								<td style="font-weight: bold;"><a href="{{ ('exportarDashboard/total/'.$marca_seleccionada.'/0/sin_gestion') }}"><?php echo number_format(round($total_casos-$total_contacto-$total_sin_contacto),0,',','.') ?></a></td>
								<td style="font-weight: bold;"><?php 
									if($total_casos>0){
										echo number_format(round($total_gestiones/$total_casos),0,',','.');
									} else {
										echo '0';
									}
								 ?></td>
							</tr>
						</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

<!--
@section('main-content')

@endsection
-->