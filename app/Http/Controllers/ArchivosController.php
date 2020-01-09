<?php

namespace App\Http\Controllers;
ini_set('max_execution_time', 0);

use Illuminate\Http\Request;
use Excel;
use App\User;
use App\Agente;
use App\Asignacion;
use App\Cartera;
use App\Comuna;
use App\Correo;
use App\Deudor;
use App\DeudoresDocumento;
use App\Marca;
use App\Direccion;
use App\Documento;
use App\Pago;
use App\Gestor;
use App\Provincia;
use App\Region;
use App\Supervisor;
use App\Telefono;

use Auth;
use Carbon\Carbon;
use Funciones;
use Redirect;
use Session;
use DB;


class ArchivosController extends Controller
{
    public function cargar(){
        $rol = Auth::user()->role->name;
        $idgestor = Auth::user()->idgestores;
        $carteras = Cartera::pluck('nombre','idcarteras');
        return view('adminlte::archivos.index', ['carteras' => $carteras]);
    }
    
    public function importar(Request $request)
    {
        //$mimetype_file = $request->file('file')->getClientMimeType();
        $tipo_archivo = $request->tipo_archivo;
        //dd($request);
        if($tipo_archivo == "Asignaciones"){
            $tiempo_inicial = microtime(true);
            $registros = Excel::load($request->file('file'), 'UTF-8')->all()->toArray();
            $fecha_actual = date('Y-m-d');

            Deudor::where('carteras_idcarteras', $request->cartera)->where('users_id', Auth::id())->where('en_gestion', '=', 1)->update(['en_gestion' => 0]);

            foreach ($registros[0] as $index => $asignacion) {
                if((isset($asignacion['rut'])) && ($asignacion['rut'] != "")) {
                    $rut = Funciones::rut_sin_dv($asignacion['rut']);

                    $deudor = Deudor::updateOrCreate(['rut' => $rut], [ 
                        'carteras_idcarteras' => $request->cartera,
                        'users_id' => Auth::id(),
                        'rut' => Funciones::rut_sin_dv($asignacion['rut']),
                        'rut_dv' => strtoupper($asignacion['rut']),
                        'razon_social' => $asignacion['razon_social_nombre'],
                        'en_gestion' => 1,
                        'fecha_asignacion' => $fecha_actual,
                        'fecha_carga' => $fecha_actual,
                        'monto_asignacion' => $asignacion["deuda"],
                        'ano_asignacion' => date('Y'),
                        'mes_asignacion' => date('m'),
                    ]);

                    if(($asignacion["region"] != "") && ($asignacion["ciudad"] != "") && ($asignacion["comuna"] != "")){
                        $comuna = $this->getComuna($asignacion["region"], $asignacion["ciudad"], $asignacion["comuna"]);
                        $direccion = Direccion::firstOrCreate(['idcomunas' => $comuna, 'direccion' => $asignacion["direccion"]], [
                            'idcomunas' => $comuna, 
                            'direccion' => $asignacion["direccion"],
                            'complemento' => $asignacion["complemento"]
                        ]);

                        $deudor->direcciones()->sync($direccion->iddirecciones, false);
                    }

                    if(($asignacion["region"] != "") && ($asignacion["ciudad"] != "") && ($asignacion["comuna"] != "")){
                        $comuna = $this->getComuna($asignacion["region"], $asignacion["ciudad"], $asignacion["comuna"]);
                        $direccion = Direccion::firstOrCreate(['idcomunas' => $comuna, 'direccion' => $asignacion["direccion"]], [
                            'idcomunas' => $comuna, 
                            'direccion' => $asignacion["direccion"],
                            'complemento' => $asignacion["complemento"]
                        ]);

                        $deudor->direcciones()->sync($direccion->iddirecciones, false);
                    }else{
                        $direccion = Direccion::firstOrCreate(['idcomunas' => $comuna, 'direccion' => $asignacion["direccion"]], [
                            'direccion' => $asignacion["direccion"],
                            'complemento' => $asignacion["complemento"]
                        ]);

                        $deudor->direcciones()->sync($direccion->iddirecciones, false);
                    }

                    $asignacion['email'] = str_replace(' ', '', $asignacion['email']);
                    if($asignacion['email'] != ''){
                        if (strpos($asignacion['email'], '@') !== false ) {
                            $correo = Correo::updateOrCreate(['correo' => $asignacion['email']], [
                                'correo' => $asignacion['email']
                            ]);
                            $deudor->correos()->sync($correo->idcorreos_electronicos, false);
                        } 
                    }

                    $asignacion['fono_1'] = str_replace(' ', '', $asignacion['fono_1']);
                    if($asignacion['fono_1'] != ''){
                        $telefono1 = Telefono::updateOrCreate(['telefono' => $asignacion['fono_1']], [
                            'telefono' => $asignacion['fono_1']
                        ]);
                        $deudor->telefonos()->sync($telefono1->idtelefonos, false);
                    }

                    $asignacion['fono_2'] = str_replace(' ', '', $asignacion['fono_2']);
                    if($asignacion['fono_2'] != ''){
                        $telefono2 = Telefono::updateOrCreate(['telefono' => $asignacion['fono_2']], [
                            'telefono' => $asignacion['fono_2']
                        ]);
                        $deudor->telefonos()->sync($telefono2->idtelefonos, false);
                    }

                    $fecha_emision = Carbon::parse($asignacion['fecha_emision'])->format('Y-m-d');

                    if((isset($asignacion['fecha_vencimiento'])) && ($asignacion['fecha_vencimiento'] != "")){
                        $fecha_vencimiento = Carbon::parse($asignacion['fecha_vencimiento'])->format('Y-m-d');
                    }else{
                        $fecha_vencimiento = Carbon::parse($asignacion['fecha_emision'])->addDays(30)->format('Y-m-d');
                    }
                    
                    $dias_mora = Funciones::calcular_dias_mora($fecha_vencimiento, $fecha_actual);
                    
                    $documento = Documento::firstOrCreate([
                        'numero' => $asignacion['num_documento'],
                        'fecha_emision' => $fecha_emision,
                    ],[
                        'deudores_iddeudores' => $deudor->iddeudores,
                        'carteras_idcarteras' => $request->cartera,
                        'numero' => $asignacion['num_documento'], 
                        'folio' => $asignacion['folio'], 
                        'deuda' => $asignacion['deuda'], 
                        'fecha_emision' => $fecha_emision,
                        'fecha_vencimiento' => $fecha_vencimiento,
                        'dias_mora' => $dias_mora
                    ]);

                    if(($asignacion['proveedor'] != "") || ($asignacion['proveedor'] != null)){
                        $gestor = Gestor::firstOrCreate(['razon_social' => $asignacion['proveedor']], [
                            'razon_social' => $asignacion['proveedor']
                        ]);    
                    }
                    
                }
            }
        
            $tiempo_final = microtime(true);
            $tiempo = $tiempo_final - $tiempo_inicial;
            Session::flash('message', "Archivo de asignaciones importado con éxito. Tiempo estimado de carga: ".$tiempo);


        }else if($tipo_archivo == "Pagos"){
            $documentos = Documento::where('carteras_idcarteras', '=', $request->cartera)->pluck('iddocumentos', 'numero')->toArray();
            $tiempo_inicial = microtime(true);

            /*$registros = Excel::load($request->file('file'), 'UTF-8')->all()->toArray();
            dd($registros);
            foreach ($registros as $index => $info) {
                dd($info);
            }*/
            if(count($documentos) > 0){
                Excel::load($request->file('file'), function($hoja) use($request, $documentos) {

                    foreach ($hoja->all() as $key => $registro) {
                        foreach ($registro as $index => $info) {
                            if($info->rut != ""){
                                if($info->fecha_pago != ""){
                                    $fecha_pago = Carbon::parse($info->fecha_pago)->format('Y-m-d');    
                                }else{
                                   $fecha_pago = date('Y-m-d');
                                } 

                                Pago::create([
                                    'carteras_idcarteras' => $request->cartera,
                                    'documentos_iddocumentos' => $documentos[$info->num_documento],
                                    'rut' => strtoupper($info->rut),
                                    'fecha' => $fecha_pago,
                                    'monto' => $info->monto_pago,
                                ]);

                                $nuevo_saldo = Funciones::revisar_saldo($request->cartera, $info->num_documento, $info->rut);

                                if($nuevo_saldo->pendiente == 0){
                                    Documento::where('iddocumentos', $documentos[$info->num_documento])->update(['activo' => 0]);
                                }  
                            }
                        }
                    }

                });

                $tiempo_final = microtime(true);
                $tiempo = $tiempo_final - $tiempo_inicial;
                Session::flash('message', "Archivo de pagos importado con éxito. Tiempo estimado de carga: ".$tiempo);    
            }else{
                Session::flash('message', "No hay documentos registrados en esta cartera");
            }
            
            /*Excel::load($request->file('file'), function($hoja) {
                
                
                foreach ($hoja->all() as $key => $registro) {
                    foreach ($registro as $index => $info) {
                        if($info->rut != ""){

                           //$saldos = Funciones::revisar_saldo($info->num_documento, $info->rut);
                            
                            if($info->fecha_pago != ""){
                                $fecha_pago = Carbon::parse($info->fecha_pago)->format('Y-m-d');    
                            }else{
                               $fecha_pago = date('Y-m-d');
                            }   

                            if((is_a($saldos, "Illuminate\Database\Eloquent\Collection")) && ($saldos->pendiente != 0)){
                                Pago::firstOrCreate([
                                    'rut' => strtoupper($info->rut),
                                    'carteras_idcarteras' => $request->cartera,
                                    'documentos_iddocumentos' => $saldos->iddocumentos,
                                    'monto' => $info->monto_pago,
                                    'fecha' => $fecha_pago
                                ], [
                                    'rut' => strtoupper($info->rut),
                                    'carteras_idcarteras' => $request->cartera,
                                    'documentos_iddocumentos' => $documentos[$info->num_documento],
                                    'monto' => $info->monto_pago,
                                    'fecha' => $fecha_pago
                                ]);
                            }

                            else{
                                if(array_key_exists(intval($info->num_documento), $documentos)){
                                    Pago::create([
                                        'rut' => strtoupper($info->rut),
                                        'carteras_idcarteras' => $request->cartera,
                                        'documentos_iddocumentos' => $documentos[$info->num_documento],
                                        'monto' => $info->monto_pago,
                                        'fecha' => $fecha_pago
                                    ]);
                                }
                            }

                            /*$nuevo_saldo = Funciones::revisar_saldo($info->num_documento, $info->rut);
                            if($nuevo_saldo->pendiente == 0){
                                Deudor::find($nuevo_saldo->iddeudores)->documentos()->updateExistingPivot($nuevo_saldo->iddocumentos, ['activo' => 0]);
                            }*
                        }
                    }
                }
                
                
            });*/

        }else if($tipo_archivo == "Marcar_deudores"){
            
            Excel::load($request->file('file'), function($hoja) {
                $tiempo_inicial = microtime(true);

                foreach ($hoja->all() as $key => $registro) {
                    foreach ($registro as $index => $row) {
                        $deudor = Deudor::where('rut', '=', Funciones::rut_sin_dv($row->rut))->get();
                        
                        if(count($deudor) > 0){
                            $deudor = $deudor[0];
                        
                            for ($i=1; $i <= 10; $i++) {
                                $marca = $row->{"marca_".$i};
                                if($marca != ""){
                                    $nueva_marca = Marca::updateOrCreate(['marca' => $marca], [
                                        'orden' => $i,
                                        'marca' => $marca,
                                    ]);
                                    $deudor->marcas()->sync($nueva_marca->idmarcas, false);
                                }
                            }
                        }
                    }
                }
                //exit;
                $tiempo_final = microtime(true);
                $tiempo = $tiempo_final - $tiempo_inicial;
                Session::flash('message', "Archivo de marcas a deudores importado con éxito. Tiempo estimado de carga: ".$tiempo);
            });

        }/*else if($tipo_archivo == "Marcar_contactos"){

            Excel::load($request->file('file'), function($hoja) {
                $tiempo_inicial = microtime(true);

                foreach ($hoja->all() as $key => $registro) {
                    foreach ($registro as $index => $asignacion) {
                    }
                }
                
                $tiempo_final = microtime(true);
                $tiempo = $tiempo_final - $tiempo_inicial;
                Session::flash('message', "Archivo de marcas a contactos importado con éxito. Tiempo estimado de carga: ".$tiempo);
            });
        }*/
        
        return Redirect::back();
    }   

    public function getComuna($region, $provincia, $comuna){
        if($region != "" && $provincia != ""){
            $comuna = Comuna::firstOrCreate([
                'idprovincias' => $this->getProvincia($region, $provincia),
                'comuna' => $comuna
            ]);
            return $comuna->idcomunas;
        }
    }

    public function getProvincia($region, $provincia){
        if($region != ""){
            $region = Region::firstOrCreate([
                'region' => $region
            ]);

            $provincia = Provincia::firstOrCreate([
                'idregion' => $region->idregion,
                'provincia' => $provincia
            ]);    
            return $provincia->idprovincias;
        }
    }

    public function exportar()
    {
        /** Fuente de Datos Eloquent */
        $data = User::all();
        /** Creamos nuestro archivo Excel */
        Excel::create('usuarios', function ($excel) use ($data) {
            /** Creamos una hoja */
            $excel->sheet('Hoja Uno', function ($sheet) use ($data) {
                /**
                 * Insertamos los datos en la hoja con el método with/fromArray
                 * Parametros: (
                 * Datos,
                 * Valores del encabezado de la asignacion,
                 * Celda de Inicio,
                 * Comparación estricta de los valores del encabezado
                 * Impresión de los encabezados
                 * )*/
                $sheet->with($data, null, 'A1', false, false);
            });
            /** Descargamos nuestro archivo pasandole la extensión deseada (xls, xlsx) */
        })->download('xlsx');
    }

    public function exportarCampana()
    {
        /** Fuente de Datos Eloquent */
        $data = Telefono::select(DB::raw('DISTINCT(telefono)'))->get();

        foreach ($data as $key => $d) {
            $datos[]=array('Telefono'=>$d->telefono, 'Rut' => '...', 'Nombre' => '...', 'Asignado' => '...');
        }
        /** Creamos nuestro archivo Excel */
        Excel::create('Campaña '.date('d-m-Y'), function ($excel) use ($datos) {
            /** Creamos una hoja */
            $excel->sheet('Campaña '.date('d-m-Y'), function ($sheet) use ($datos) {
                /**
                 * Insertamos los datos en la hoja con el método with/fromArray
                 * Parametros: (
                 * Datos,
                 * Valores del encabezado de la asignacion,
                 * Celda de Inicio,
                 * Comparación estricta de los valores del encabezado
                 * Impresión de los encabezados
                 * )*/
                $sheet->with($datos, null, 'A1', false, false);
            });
            /** Descargamos nuestro archivo pasandole la extensión deseada (xls, xlsx) */
        })->download('xlsx');
    }
    
    public function bladeToExcel()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
