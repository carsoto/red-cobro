<?php

namespace App\Http\Controllers;
ini_set('max_execution_time', 0);

use Illuminate\Http\Request;
use Excel;
use App\User;
use App\Agente;
use App\Comuna;
use App\Correo;
use App\Deudor;
use App\Direccion;
use App\Documento;
use App\Proveedor;
use App\Provincia;
use App\Region;
use App\Supervisor;
use App\Telefono;

use Redirect;
use Session;

class AsignacionController extends Controller
{
    public function cargar(){
        return view('adminlte::asignaciones.index');
    }

    public function formatearRut($rut_sin_formato) {

        if (strpos($rut_sin_formato, '-') !== false ) {
            $procesar_rut = explode('-', $rut_sin_formato);
            $numero = number_format($procesar_rut[0], 0, ',', '.');
            $dverificador = strtoupper($procesar_rut[1]);

            return $numero . '-' . $dverificador;
        }

        return number_format($rut_sin_formato, 0, ',', '.');
    }

    public function importar(Request $request)
    {
        Excel::load($request->file('file'), function($hoja) {
            $tiempo_inicial = microtime(true);
          
            foreach ($hoja->all() as $key => $registro) {
                foreach ($registro as $index => $asignacion) {
                    $deudor = Deudor::firstOrCreate([
                        'rut' => $this->formatearRut($asignacion['rut']),
                        'razon_social' => $asignacion['razon_social_nombre']
                    ]);

                    $direccion = Direccion::firstOrCreate([
                        'idcomunas' => $this->getComuna($asignacion["region"], $asignacion["ciudad"], $asignacion["comuna"]), 
                        'direccion' => $asignacion["direccion"],
                        'complemento' => $asignacion["complemento"]
                    ]);

                    $deudor->direcciones()->sync($direccion->iddirecciones, false);

                    if($asignacion['fono_1'] != ''){
                        $correo = Correo::firstOrCreate([
                            'correo' => $asignacion['email']
                        ]);
                        $deudor->correos()->sync($correo->idcorreos_electronicos, false); 
                    }

                    if($asignacion['fono_1'] != ''){
                        $telefono1 = Telefono::firstOrCreate([
                            'telefono' => $asignacion['fono_1']
                        ]);
                        $deudor->telefonos()->sync($telefono1->idtelefonos, false);
                    }

                    if($asignacion['fono_2'] != ''){
                        $telefono2 = Telefono::firstOrCreate([
                            'telefono' => $asignacion['fono_2']
                        ]);
                        $deudor->telefonos()->sync($telefono2->idtelefonos, false);
                    }

                    $documento = Documento::firstOrCreate([
                        'numero' => $asignacion['num_documento'], 
                        'folio' => $asignacion['folio'], 
                        'deuda' => $asignacion['deuda'], 
                        'fecha_emision' => $asignacion['fecha_emision'], 
                        'fecha_vencimiento' => $asignacion['fecha_vencimiento'],
                        'dias_mora' => $asignacion['dias_mora']
                    ]);

                    $deudor->documentos()->sync($documento->iddocumentos, false);

                    $proveedor = Proveedor::firstOrCreate([
                        'razon_social' => $asignacion['proveedor']
                    ]);               

                    $proveedor->documentos()->sync($documento->iddocumentos, false);
                }
            }
            
            $tiempo_final = microtime(true);
            $tiempo = $tiempo_final - $tiempo_inicial;
            Session::flash('message', "Su archivo fue importado con éxito. Tiempo estimado de carga: ".$tiempo);
        });
        return Redirect::back();
    }   

    public function getComuna($region, $provincia, $comuna){

        $comuna = Comuna::firstOrCreate([
            'idprovincias' => $this->getProvincia($region, $provincia),
            'comuna' => $comuna
        ]);
        return $comuna->idcomunas;
    }

    public function getProvincia($region, $provincia){
        $region = Region::firstOrCreate([
            'region' => $region
        ]);

        $provincia = Provincia::firstOrCreate([
            'idregion' => $region->idregion,
            'provincia' => $provincia
        ]);

        return $provincia->idprovincias;
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
