@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('contentheader_title')
	Carteras
@endsection

@section('contentheader_description')
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-lg-12">
				<div class="box box-primary">
					<div class="box-body">
						<div class="table-responsive">
							<table class="table table-bordered table-stipped" style="text-align: center; font-size: 9px;">
								<thead>
									<th class="bg-primary" style="text-align: center;">Ciclo</th>
									<th class="bg-primary" style="text-align: center;">Casos</th>
									<th class="bg-primary" style="text-align: center;">Cuota</th>
									<th class="bg-primary" style="text-align: center;">Saldo insoluto</th>
									<th class="bg-primary" style="text-align: center;">Q Gestiones</th>
									<th class="bg-primary" style="text-align: center;">Compromisos</th>
									<th class="bg-primary" style="text-align: center;">Titular</th>
									<th class="bg-primary" style="text-align: center;">Tercero</th>
									<th class="bg-primary" style="text-align: center;">Contacto único</th>
									<th class="bg-primary" style="text-align: center;">Sin contacto</th>
									<th class="bg-primary" style="text-align: center;">Sin gestión</th>
									<th class="bg-primary" style="text-align: center;">Intensidad</th>
									<th class="bg-primary" style="text-align: center;">Contactabilidad</th>
								</thead>
								<tbody>
									<tr style="background: grey; color: white;">
										<th style="text-align: center;">No Pago</th>
										<th style="text-align: center;">2.488</th>
										<th style="text-align: center;">$ 579.203.316</th>
										<th style="text-align: center;">$ 12.231.191.958</th>
										<th style="text-align: center;">68.656</th>
										<th style="text-align: center;">747</th>
										<th style="text-align: center;">1.137</th>
										<th style="text-align: center;">473</th>
										<th style="text-align: center;">1.316</th>
										<th style="text-align: center;">1.172</th>
										<th style="text-align: center;">266</th>
										<th style="text-align: center;">27,6</th>
										<th style="text-align: center;">53%</th>
									</tr>
									<tr>
										<td>Ciclo 1</td>
										<td><a href="{{ route('deudores.index') }}">692</a></td>
										<td><a href="{{ route('deudores.index') }}">$ 153.268.212</a></td>
										<td><a href="{{ route('deudores.index') }}">$ 3.146.206.525</a></td>
										<td><a href="{{ route('deudores.index') }}">32..116</a></td>
										<td><a href="{{ route('deudores.index') }}">241</a></td>
										<td><a href="{{ route('deudores.index') }}">391</a></td>
										<td><a href="{{ route('deudores.index') }}">175</a></td>
										<td><a href="{{ route('deudores.index') }}">430</a></td>
										<td><a href="{{ route('deudores.index') }}">262</a></td>
										<td><a href="{{ route('deudores.index') }}">34</a></td>
										<td><a href="{{ route('deudores.index') }}">46,4</a></td>
										<td>62%</td>
									</tr>
									<tr>
										<td>Ciclo 2</td>
										<td><a href="{{ route('deudores.index') }}">437</a></td>
										<td><a href="{{ route('deudores.index') }}">$ 97.94.100</a></td>
										<td><a href="{{ route('deudores.index') }}">$ 2.150.832.731</a></td>
										<td><a href="{{ route('deudores.index') }}">15.411</a></td>
										<td><a href="{{ route('deudores.index') }}">142</a></td>
										<td><a href="{{ route('deudores.index') }}">242</a></td>
										<td><a href="{{ route('deudores.index') }}">111</a></td>
										<td><a href="{{ route('deudores.index') }}">277</a></td>
										<td><a href="{{ route('deudores.index') }}">160</a></td>
										<td><a href="{{ route('deudores.index') }}">25</a></td>
										<td><a href="{{ route('deudores.index') }}">35,3</a></td>
										<td>63%</td>
									</tr>
									<tr>
										<td>Ciclo 3</td>
										<td><a href="{{ route('deudores.index') }}">359</a></td>
										<td><a href="{{ route('deudores.index') }}">$ 85.111.159</a></td>
										<td><a href="{{ route('deudores.index') }}">$ 1.824.660.313</a></td>
										<td><a href="{{ route('deudores.index') }}">11.613</a></td>
										<td><a href="{{ route('deudores.index') }}">161</a></td>
										<td><a href="{{ route('deudores.index') }}">215</a></td>
										<td><a href="{{ route('deudores.index') }}">97</a></td>
										<td><a href="{{ route('deudores.index') }}">246</a></td>
										<td><a href="{{ route('deudores.index') }}">113</a></td>
										<td><a href="{{ route('deudores.index') }}">9</a></td>
										<td><a href="{{ route('deudores.index') }}">32,3</a></td>
										<td>68%</td>
									</tr>
									<tr>
										<td>Ciclo 4</td>
										<td><a href="{{ route('deudores.index') }}">356</a></td>
										<td><a href="{{ route('deudores.index') }}">$ 84.296.690</a></td>
										<td><a href="{{ route('deudores.index') }}">$ 1.747.450.010</a></td>
										<td><a href="{{ route('deudores.index') }}">7.410</a></td>
										<td><a href="{{ route('deudores.index') }}">140</a></td>
										<td><a href="{{ route('deudores.index') }}">195</a></td>
										<td><a href="{{ route('deudores.index') }}">76</a></td>
										<td><a href="{{ route('deudores.index') }}">241</a></td>
										<td><a href="{{ route('deudores.index') }}">115</a></td>
										<td><a href="{{ route('deudores.index') }}">14</a></td>
										<td><a href="{{ route('deudores.index') }}">20,8</a></td>
										<td>68%</td>
									</tr>
									<tr>
										<td>Ciclo 5</td>
										<td><a href="{{ route('deudores.index') }}">644</a></td>
										<td><a href="{{ route('deudores.index') }}">$ 158.578.146</a></td>
										<td><a href="{{ route('deudores.index') }}">$ 3.362.042.370</a></td>
										<td><a href="{{ route('deudores.index') }}">2.106</a></td>
										<td><a href="{{ route('deudores.index') }}">63</a></td>
										<td><a href="{{ route('deudores.index') }}">94</a></td>
										<td><a href="{{ route('deudores.index') }}">14</a></td>
										<td><a href="{{ route('deudores.index') }}">122</a></td>
										<td><a href="{{ route('deudores.index') }}">522</a></td>
										<td><a href="{{ route('deudores.index') }}">184</a></td>
										<td><a href="{{ route('deudores.index') }}">3,3</a></td>
										<td>19%</td>
									</tr>
									<tr style="background: grey; color: white;">
										<th style="text-align: center;">Pagado</th>
										<th style="text-align: center;">4.042</th>
										<th style="text-align: center;">$ 997.235.890</th>
										<th style="text-align: center;">$ 21.153.211.208</th>
										<th style="text-align: center;">49.170</th>
										<th style="text-align: center;">2.001</th>
										<th style="text-align: center;">1.640</th>
										<th style="text-align: center;">599</th>
										<th style="text-align: center;">2.422</th>
										<th style="text-align: center;">1.347</th>
										<th style="text-align: center;">245</th>
										<th style="text-align: center;">12,2</th>
										<th style="text-align: center;">60%</th>
									</tr>
									<tr>
										<td>Ciclo 1</td>
										<td><a href="{{ route('deudores.index') }}">2.054</a></td>
										<td><a href="{{ route('deudores.index') }}">$ 492.399.450</a></td>
										<td><a href="{{ route('deudores.index') }}">$ 10.471.690.992</a></td>
										<td><a href="{{ route('deudores.index') }}">25.544</a></td>
										<td><a href="{{ route('deudores.index') }}">1.054</a></td>
										<td><a href="{{ route('deudores.index') }}">704</a></td>
										<td><a href="{{ route('deudores.index') }}">228</a></td>
										<td><a href="{{ route('deudores.index') }}">1234</a></td>
										<td><a href="{{ route('deudores.index') }}">806</a></td>
										<td><a href="{{ route('deudores.index') }}">156</a></td>
										<td><a href="{{ route('deudores.index') }}">12,4</a></td>
										<td>60%</td>
									</tr>
									<tr>
										<td>Ciclo 2</td>
										<td><a href="{{ route('deudores.index') }}">901</a></td>
										<td><a href="{{ route('deudores.index') }}">$ 230.179.666</a></td>
										<td><a href="{{ route('deudores.index') }}">$ 4.922.147.133</a></td>
										<td><a href="{{ route('deudores.index') }}">12.471</a></td>
										<td><a href="{{ route('deudores.index') }}">491</a></td>
										<td><a href="{{ route('deudores.index') }}">468</a></td>
										<td><a href="{{ route('deudores.index') }}">189</a></td>
										<td><a href="{{ route('deudores.index') }}">598</a></td>
										<td><a href="{{ route('deudores.index') }}">285</a></td>
										<td><a href="{{ route('deudores.index') }}">60</a></td>
										<td><a href="{{ route('deudores.index') }}">13,8</a></td>
										<td>66%</td>
									</tr>
									<tr>
										<td>Ciclo 3</td>
										<td><a href="{{ route('deudores.index') }}">565</a></td>
										<td><a href="{{ route('deudores.index') }}">$ 137.081.588</a></td>
										<td><a href="{{ route('deudores.index') }}">$ 2.969.661.514</a></td>
										<td><a href="{{ route('deudores.index') }}">8.553</a></td>
										<td><a href="{{ route('deudores.index') }}">332</a></td>
										<td><a href="{{ route('deudores.index') }}">334</a></td>
										<td><a href="{{ route('deudores.index') }}">133</a></td>
										<td><a href="{{ route('deudores.index') }}">410</a></td>
										<td><a href="{{ route('deudores.index') }}">145</a></td>
										<td><a href="{{ route('deudores.index') }}">17</a></td>
										<td><a href="{{ route('deudores.index') }}">15,1</a></td>
										<td>73%</td>
									</tr>
									<tr>
										<td>Ciclo 4</td>
										<td><a href="{{ route('deudores.index') }}">484</a></td>
										<td><a href="{{ route('deudores.index') }}">$ 125.166.993</a></td>
										<td><a href="{{ route('deudores.index') }}">$ 2.492.349.107</a></td>
										<td><a href="{{ route('deudores.index') }}">2.602</a></td>
										<td><a href="{{ route('deudores.index') }}">124</a></td>
										<td><a href="{{ route('deudores.index') }}">134</a></td>
										<td><a href="{{ route('deudores.index') }}">49</a></td>
										<td><a href="{{ route('deudores.index') }}">180</a></td>
										<td><a href="{{ route('deudores.index') }}">111</a></td>
										<td><a href="{{ route('deudores.index') }}">12</a></td>
										<td><a href="{{ route('deudores.index') }}">5,4</a></td>
										<td>37%</td>
									</tr>
									<tr>
										<td>Ciclo 5</td>
										<td><a href="{{ route('deudores.index') }}">38</a></td>
										<td><a href="{{ route('deudores.index') }}">$ 12.408.193</a></td>
										<td><a href="{{ route('deudores.index') }}">$ 297.362.462</a></td>
										<td>-</td>
										<td>-</td>
										<td>-</td>
										<td>-</td>
										<td>-</td>
										<td>-</td>
										<td>-</td>
										<td>-</td>
										<td>0%</td>
									</tr>
								</tbody>
								<tfoot>
									<tr>
										<td class="bg-primary">Total general</td>
										<td class="bg-primary">6.530</td>
										<td class="bg-primary">$ 1.576.439.206</td>
										<td class="bg-primary">$ 33.384.403.166</td>
										<td class="bg-primary">117.826</td>
										<td class="bg-primary">2.748</td>
										<td class="bg-primary">2.777</td>
										<td class="bg-primary">1.072</td>
										<td class="bg-primary">3.738</td>
										<td class="bg-primary">2.519</td>
										<td class="bg-primary">511</td>
										<td class="bg-primary">18</td>
										<td class="bg-primary">57,24%</td>
									</tr>
								</tfoot>
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