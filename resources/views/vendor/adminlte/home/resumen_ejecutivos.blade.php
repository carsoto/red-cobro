@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('contentheader_title')
	Resumen Ejecutivos
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
							<table class="table table-bordered table-stipped" style="font-size: 8px; text-align: center;">
								<thead>
									<th class="bg-primary">ID</th>
									<th class="bg-primary">Ciclo de pago</th>
									<th class="bg-primary">Casos</th>
									<th class="bg-primary">Cuota</th>
									<th class="bg-primary">Saldo insoluto</th>
									<th class="bg-primary">Recuperado</th>
									<th class="bg-primary">Q Recuperados</th>
									<th class="bg-primary">% Normalizado</th>
									<th class="bg-primary">Q Gestiones</th>
									<th class="bg-primary">Compromisos</th>
									<th class="bg-primary">Titular</th>
									<th class="bg-primary">Tercero</th>
									<th class="bg-primary">Contacto único</th>
									<th class="bg-primary">Sin contacto</th>
									<th class="bg-primary">Sin gestión</th>
									<th class="bg-primary">Intensidad</th>
									<th class="bg-primary">Contactabilidad</th>
								</thead>
								<tbody>
									<tr style="background: grey; color: white;">
										<th style="text-align: center;" colspan="2">Asignado</th>
										<th style="text-align: center;">7.275</th>
										<th style="text-align: center;">$ 2.299</th>
										<th style="text-align: center;">$ 47.193</th>
										<th style="text-align: center;">1.453</th>
										<th style="text-align: center;">4.599</th>
										<th style="text-align: center;">63%</th>
										<th style="text-align: center;">36.375</th>
										<th style="text-align: center;">2.668</th>
										<th style="text-align: center;">3.975</th>
										<th style="text-align: center;">900</th>
										<th style="text-align: center;">4.955</th>
										<th style="text-align: center;">2.320</th>
										<th style="text-align: center;">273</th>
										<th style="text-align: center;">5</th>
										<th style="text-align: center;">68%</th>
									</tr>
									<tr>
										<td>1</td>
										<td>Cobrador 1</td>
										<td><a href="{{ route('deudores.index') }}">485</a></td>
										<td><a href="{{ route('deudores.index') }}">$ 153</a></td>
										<td><a href="{{ route('deudores.index') }}">$ 3.146</a></td>
										<td><a href="{{ route('deudores.index') }}">130</a></td>
										<td><a href="{{ route('deudores.index') }}">412</a></td>
										<td>65%</td>
										<td><a href="{{ route('deudores.index') }}">2.425</a></td>
										<td><a href="{{ route('deudores.index') }}">238</a></td>
										<td><a href="{{ route('deudores.index') }}">354</a></td>
										<td><a href="{{ route('deudores.index') }}">87</a></td>
										<td><a href="{{ route('deudores.index') }}">441</a></td>
										<td><a href="{{ route('deudores.index') }}">44</a></td>
										<td>-</td>
										<td><a href="{{ route('deudores.index') }}">5</a></td>
										<td>91%</td>
									</tr>
									<tr>
										<td>2</td>
										<td>Cobrador 2</td>
										<td><a href="{{ route('deudores.index') }}">485</a></td>
										<td><a href="{{ route('deudores.index') }}">$ 153</a></td>
										<td><a href="{{ route('deudores.index') }}">$ 3.146</a></td>
										<td><a href="{{ route('deudores.index') }}">125</a></td>
										<td><a href="{{ route('deudores.index') }}">394</a></td>
										<td>81%</td>
										<td><a href="{{ route('deudores.index') }}">2.318</a></td>
										<td><a href="{{ route('deudores.index') }}">227</a></td>
										<td><a href="{{ route('deudores.index') }}">339</a></td>
										<td><a href="{{ route('deudores.index') }}">84</a></td>
										<td><a href="{{ route('deudores.index') }}">422</a></td>
										<td><a href="{{ route('deudores.index') }}">63</a></td>
										<td><a href="{{ route('deudores.index') }}">8</a></td>
										<td><a href="{{ route('deudores.index') }}">5</a></td>
										<td>87%</td>
									</tr>
									<tr>
										<td>3</td>
										<td>Cobrador 3</td>
										<td><a href="{{ route('deudores.index') }}">485</a></td>
										<td><a href="{{ route('deudores.index') }}">$ 153</a></td>
										<td><a href="{{ route('deudores.index') }}">$ 3.146</a></td>
										<td><a href="{{ route('deudores.index') }}">119</a></td>
										<td><a href="{{ route('deudores.index') }}">377</a></td>
										<td>78%</td>
										<td><a href="{{ route('deudores.index') }}">2.216</a></td>
										<td><a href="{{ route('deudores.index') }}">218</a></td>
										<td><a href="{{ route('deudores.index') }}">324</a></td>
										<td><a href="{{ route('deudores.index') }}">80</a></td>
										<td><a href="{{ route('deudores.index') }}">404</a></td>
										<td><a href="{{ route('deudores.index') }}">81</a></td>
										<td><a href="{{ route('deudores.index') }}">10</a></td>
										<td><a href="{{ route('deudores.index') }}">5</a></td>
										<td>87%</td>
									</tr>
									<tr>
										<td>4</td>
										<td>Cobrador 4</td>
										<td><a href="{{ route('deudores.index') }}">485</a></td>
										<td><a href="{{ route('deudores.index') }}">$ 153</a></td>
										<td><a href="{{ route('deudores.index') }}">$ 3.146</a></td>
										<td><a href="{{ route('deudores.index') }}">114</a></td>
										<td><a href="{{ route('deudores.index') }}">360</a></td>
										<td>74%</td>
										<td><a href="{{ route('deudores.index') }}">2.119</a></td>
										<td><a href="{{ route('deudores.index') }}">208</a></td>
										<td><a href="{{ route('deudores.index') }}">310</a></td>
										<td><a href="{{ route('deudores.index') }}">77</a></td>
										<td><a href="{{ route('deudores.index') }}">387</a></td>
										<td><a href="{{ route('deudores.index') }}">98</a></td>
										<td><a href="{{ route('deudores.index') }}">12</a></td>
										<td><a href="{{ route('deudores.index') }}">4</a></td>
										<td>80%</td>
									</tr>
									<tr>
										<td>5</td>
										<td>Cobrador 5</td>
										<td><a href="{{ route('deudores.index') }}">485</a></td>
										<td><a href="{{ route('deudores.index') }}">$ 153</a></td>
										<td><a href="{{ route('deudores.index') }}">$ 3.146</a></td>
										<td><a href="{{ route('deudores.index') }}">109</a></td>
										<td><a href="{{ route('deudores.index') }}">344</a></td>
										<td>71%</td>
										<td><a href="{{ route('deudores.index') }}">2.026</a></td>
										<td><a href="{{ route('deudores.index') }}">199</a></td>
										<td><a href="{{ route('deudores.index') }}">297</a></td>
										<td><a href="{{ route('deudores.index') }}">73</a></td>
										<td><a href="{{ route('deudores.index') }}">370</a></td>
										<td><a href="{{ route('deudores.index') }}">115</a></td>
										<td><a href="{{ route('deudores.index') }}">14</a></td>
										<td><a href="{{ route('deudores.index') }}">4</a></td>
										<td>76%</td>
									</tr>
									<tr>
										<td>6</td>
										<td>Cobrador 6</td>
										<td><a href="{{ route('deudores.index') }}">485</a></td>
										<td><a href="{{ route('deudores.index') }}">$ 153</a></td>
										<td><a href="{{ route('deudores.index') }}">$ 3.146</a></td>
										<td><a href="{{ route('deudores.index') }}">104</a></td>
										<td><a href="{{ route('deudores.index') }}">329</a></td>
										<td>66%</td>
										<td><a href="{{ route('deudores.index') }}">1.936</a></td>
										<td><a href="{{ route('deudores.index') }}">191</a></td>
										<td><a href="{{ route('deudores.index') }}">284</a></td>
										<td><a href="{{ route('deudores.index') }}">70</a></td>
										<td><a href="{{ route('deudores.index') }}">354</a></td>
										<td><a href="{{ route('deudores.index') }}">131</a></td>
										<td><a href="{{ route('deudores.index') }}">16</a></td>
										<td><a href="{{ route('deudores.index') }}">4</a></td>
										<td>73%</td>
									</tr>
									<tr>
										<td>7</td>
										<td>Cobrador 7</td>
										<td><a href="{{ route('deudores.index') }}">485</a></td>
										<td><a href="{{ route('deudores.index') }}">$ 153</a></td>
										<td><a href="{{ route('deudores.index') }}">$ 3.146</a></td>
										<td><a href="{{ route('deudores.index') }}">99</a></td>
										<td><a href="{{ route('deudores.index') }}">315</a></td>
										<td>65%</td>
										<td><a href="{{ route('deudores.index') }}">1.851</a></td>
										<td><a href="{{ route('deudores.index') }}">183</a></td>
										<td><a href="{{ route('deudores.index') }}">272</a></td>
										<td><a href="{{ route('deudores.index') }}">67</a></td>
										<td><a href="{{ route('deudores.index') }}">339</a></td>
										<td><a href="{{ route('deudores.index') }}">146</a></td>
										<td><a href="{{ route('deudores.index') }}">18</a></td>
										<td><a href="{{ route('deudores.index') }}">4</a></td>
										<td>79%</td>
									</tr>
									<tr>
										<td>8</td>
										<td>Cobrador 8</td>
										<td><a href="{{ route('deudores.index') }}">485</a></td>
										<td><a href="{{ route('deudores.index') }}">$ 153</a></td>
										<td><a href="{{ route('deudores.index') }}">$ 3.146</a></td>
										<td><a href="{{ route('deudores.index') }}">95</a></td>
										<td><a href="{{ route('deudores.index') }}">301</a></td>
										<td>62%</td>
										<td><a href="{{ route('deudores.index') }}">1.779</a></td>
										<td><a href="{{ route('deudores.index') }}">175</a></td>
										<td><a href="{{ route('deudores.index') }}">260</a></td>
										<td><a href="{{ route('deudores.index') }}">64</a></td>
										<td><a href="{{ route('deudores.index') }}">324</a></td>
										<td><a href="{{ route('deudores.index') }}">161</a></td>
										<td><a href="{{ route('deudores.index') }}">19</a></td>
										<td><a href="{{ route('deudores.index') }}">4</a></td>
										<td>67%</td>
									</tr>
									<tr>
										<td>9</td>
										<td>Cobrador 9</td>
										<td><a href="{{ route('deudores.index') }}">485</a></td>
										<td><a href="{{ route('deudores.index') }}">$ 153</a></td>
										<td><a href="{{ route('deudores.index') }}">$ 3.146</a></td>
										<td><a href="{{ route('deudores.index') }}">91</a></td>
										<td><a href="{{ route('deudores.index') }}">280</a></td>
										<td>59%</td>
										<td><a href="{{ route('deudores.index') }}">1.692</a></td>
										<td><a href="{{ route('deudores.index') }}">167</a></td>
										<td><a href="{{ route('deudores.index') }}">249</a></td>
										<td><a href="{{ route('deudores.index') }}">61</a></td>
										<td><a href="{{ route('deudores.index') }}">311</a></td>
										<td><a href="{{ route('deudores.index') }}">174</a></td>
										<td><a href="{{ route('deudores.index') }}">21</a></td>
										<td><a href="{{ route('deudores.index') }}">3</a></td>
										<td>64%</td>
									</tr>
									<tr>
										<td>10</td>
										<td>Cobrador 10</td>
										<td><a href="{{ route('deudores.index') }}">485</a></td>
										<td><a href="{{ route('deudores.index') }}">$ 153</a></td>
										<td><a href="{{ route('deudores.index') }}">$ 3.146</a></td>
										<td><a href="{{ route('deudores.index') }}">87</a></td>
										<td><a href="{{ route('deudores.index') }}">275</a></td>
										<td>57%</td>
										<td><a href="{{ route('deudores.index') }}">1.617</a></td>
										<td><a href="{{ route('deudores.index') }}">168</a></td>
										<td><a href="{{ route('deudores.index') }}">238</a></td>
										<td><a href="{{ route('deudores.index') }}">59</a></td>
										<td><a href="{{ route('deudores.index') }}">297</a></td>
										<td><a href="{{ route('deudores.index') }}">108</a></td>
										<td><a href="{{ route('deudores.index') }}">23</a></td>
										<td><a href="{{ route('deudores.index') }}">3</a></td>
										<td>61%</td>
									</tr>
									<tr>
										<td>11</td>
										<td>Cobrador 11</td>
										<td><a href="{{ route('deudores.index') }}">485</a></td>
										<td><a href="{{ route('deudores.index') }}">$ 153</a></td>
										<td><a href="{{ route('deudores.index') }}">$ 3.146</a></td>
										<td><a href="{{ route('deudores.index') }}">83</a></td>
										<td><a href="{{ route('deudores.index') }}">263</a></td>
										<td>54%</td>
										<td><a href="{{ route('deudores.index') }}">1.546</a></td>
										<td><a href="{{ route('deudores.index') }}">153</a></td>
										<td><a href="{{ route('deudores.index') }}">220</a></td>
										<td><a href="{{ route('deudores.index') }}">56</a></td>
										<td><a href="{{ route('deudores.index') }}">284</a></td>
										<td><a href="{{ route('deudores.index') }}">201</a></td>
										<td><a href="{{ route('deudores.index') }}">24</a></td>
										<td><a href="{{ route('deudores.index') }}">3</a></td>
										<td>59%</td>
									</tr>
									<tr>
										<td>12</td>
										<td>Cobrador 12</td>
										<td><a href="{{ route('deudores.index') }}">485</a></td>
										<td><a href="{{ route('deudores.index') }}">$ 153</a></td>
										<td><a href="{{ route('deudores.index') }}">$ 3.146</a></td>
										<td><a href="{{ route('deudores.index') }}">$ 79</a></td>
										<td><a href="{{ route('deudores.index') }}">251</a></td>
										<td>52%</td>
										<td><a href="{{ route('deudores.index') }}">1.478</a></td>
										<td><a href="{{ route('deudores.index') }}">147</a></td>
										<td><a href="{{ route('deudores.index') }}">218</a></td>
										<td><a href="{{ route('deudores.index') }}">54</a></td>
										<td><a href="{{ route('deudores.index') }}">272</a></td>
										<td><a href="{{ route('deudores.index') }}">213</a></td>
										<td><a href="{{ route('deudores.index') }}">26</a></td>
										<td><a href="{{ route('deudores.index') }}">3</a></td>
										<td>56%</td>
									</tr>
									<tr>
										<td>13</td>
										<td>Cobrador 13</td>
										<td><a href="{{ route('deudores.index') }}">485</a></td>
										<td><a href="{{ route('deudores.index') }}">$ 153</a></td>
										<td><a href="{{ route('deudores.index') }}">$ 3.146</a></td>
										<td><a href="{{ route('deudores.index') }}">76</a></td>
										<td><a href="{{ route('deudores.index') }}">240</a></td>
										<td>50%</td>
										<td><a href="{{ route('deudores.index') }}">1.413</a></td>
										<td><a href="{{ route('deudores.index') }}">140</a></td>
										<td><a href="{{ route('deudores.index') }}">209</a></td>
										<td><a href="{{ route('deudores.index') }}">52</a></td>
										<td><a href="{{ route('deudores.index') }}">260</a></td>
										<td><a href="{{ route('deudores.index') }}">225</a></td>
										<td><a href="{{ route('deudores.index') }}">27</a></td>
										<td><a href="{{ route('deudores.index') }}">3</a></td>
										<td>54%</td>
									</tr>
									<tr>
										<td>14</td>
										<td>Cobrador 14</td>
										<td><a href="{{ route('deudores.index') }}">485</a></td>
										<td><a href="{{ route('deudores.index') }}">$ 153</a></td>
										<td><a href="{{ route('deudores.index') }}">$ 3.146</a></td>
										<td><a href="{{ route('deudores.index') }}">73</a></td>
										<td><a href="{{ route('deudores.index') }}">230</a></td>
										<td>47%</td>
										<td><a href="{{ route('deudores.index') }}">1.351</a></td>
										<td><a href="{{ route('deudores.index') }}">134</a></td>
										<td><a href="{{ route('deudores.index') }}">200</a></td>
										<td><a href="{{ route('deudores.index') }}">49</a></td>
										<td><a href="{{ route('deudores.index') }}">249</a></td>
										<td><a href="{{ route('deudores.index') }}">236</a></td>
										<td><a href="{{ route('deudores.index') }}">28</a></td>
										<td><a href="{{ route('deudores.index') }}">3</a></td>
										<td>51%</td>
									</tr>
									<tr>
										<td>15</td>
										<td>Cobrador 15</td>
										<td><a href="{{ route('deudores.index') }}">485</a></td>
										<td><a href="{{ route('deudores.index') }}">$ 153</a></td>
										<td><a href="{{ route('deudores.index') }}">$ 3.146</a></td>
										<td><a href="{{ route('deudores.index') }}">69</a></td>
										<td><a href="{{ route('deudores.index') }}">220</a></td>
										<td>45%</td>
										<td><a href="{{ route('deudores.index') }}">1.292</a></td>
										<td><a href="{{ route('deudores.index') }}">128</a></td>
										<td><a href="{{ route('deudores.index') }}">191</a></td>
										<td><a href="{{ route('deudores.index') }}">47</a></td>
										<td><a href="{{ route('deudores.index') }}">239</a></td>
										<td><a href="{{ route('deudores.index') }}">246</a></td>
										<td><a href="{{ route('deudores.index') }}">30</a></td>
										<td><a href="{{ route('deudores.index') }}">3</a></td>
										<td>49%</td>
									</tr>
									<tr style="background: grey; color: white;">
										<th style="text-align: center;" colspan="2">No Asignado</th>
										<th style="text-align: center;">$ 4.042</th>
										<th style="text-align: center;">$ 997</th>
										<th style="text-align: center;">$ 21.153</th>
										<th style="text-align: center;">728</th>
										<th style="text-align: center;">2.951</th>
										<th style="text-align: center;">73%</th>
										<th style="text-align: center;">15.158</th>
										<th style="text-align: center;">895</th>
										<th style="text-align: center;">1.135</th>
										<th style="text-align: center;">486</th>
										<th style="text-align: center;">1.621</th>
										<th style="text-align: center;">2.421</th>
										<th style="text-align: center;">291</th>
										<th style="text-align: center;">4</th>
										<th style="text-align: center;">40%</th>
									</tr>
								</tbody>
								<tfoot>
									<tr>
										<td colspan="2" class="bg-primary">Total general</td>
										<td class="bg-primary" style="text-align: center;">$ 11.317</td>
										<td class="bg-primary" style="text-align: center;">$ 3.296</td>
										<td class="bg-primary" style="text-align: center;">$ 68.346</td>
										<td class="bg-primary" style="text-align: center;">$ 2.181</td>
										<td class="bg-primary" style="text-align: center;">7.549</td>
										<td class="bg-primary" style="text-align: center;">67%</td>
										<td class="bg-primary" style="text-align: center;">51.533</td>
										<td class="bg-primary" style="text-align: center;">3.563</td>
										<td class="bg-primary" style="text-align: center;">5.110</td>
										<td class="bg-primary" style="text-align: center;">1.466</td>
										<td class="bg-primary" style="text-align: center;">6.576</td>
										<td class="bg-primary" style="text-align: center;">4.741</td>
										<td class="bg-primary" style="text-align: center;">564</td>
										<td class="bg-primary" style="text-align: center;">9</td>
										<td class="bg-primary" style="text-align: center;">58.11%</td>
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