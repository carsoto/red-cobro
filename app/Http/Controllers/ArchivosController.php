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

use Funciones;
use Redirect;
use Session;

class ArchivosController extends Controller
{
    public function cargar(){
        return view('adminlte::archivos.index');
    }
    
    public function importar(Request $request)
    {
        //$mimetype_file = $request->file('file')->getClientMimeType();
        $tipo_archivo = $request->tipo_archivo;

        if($tipo_archivo == "Asignaciones"){

            Excel::load($request->file('file'), function($hoja) {
                $tiempo_inicial = microtime(true);
              
                foreach ($hoja->all() as $key => $registro) {
                    foreach ($registro as $index => $asignacion) {
                        $deudor = Deudor::firstOrCreate([
                            'rut' => Funciones::rut_sin_dv($asignacion['rut']),
                            'rut_dv' => strtoupper($asignacion['rut']),
                            'razon_social' => $asignacion['razon_social_nombre']
                        ]);

                        $direccion = Direccion::firstOrCreate([
                            'idcomunas' => $this->getComuna($asignacion["region"], $asignacion["ciudad"], $asignacion["comuna"]), 
                            'direccion' => $asignacion["direccion"],
                            'complemento' => $asignacion["complemento"]
                        ]);

                        $deudor->direcciones()->sync($direccion->iddirecciones, false);

                        $asignacion['email'] = str_replace(' ', '', $asignacion['email']);
                        if($asignacion['email'] != ''){
                            if (strpos($asignacion['email'], '@') !== false ) {
                                $correo = Correo::firstOrCreate([
                                    'correo' => $asignacion['email']
                                ]);
                                $deudor->correos()->sync($correo->idcorreos_electronicos, false);
                            } 
                        }

                        $asignacion['fono_1'] = str_replace(' ', '', $asignacion['fono_1']);
                        if($asignacion['fono_1'] != ''){
                            $telefono1 = Telefono::firstOrCreate([
                                'telefono' => $asignacion['fono_1']
                            ]);
                            $deudor->telefonos()->sync($telefono1->idtelefonos, false);
                        }

                        $asignacion['fono_2'] = str_replace(' ', '', $asignacion['fono_2']);
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
                            'fecha_emision' => Funciones::cadena_a_fecha($asignacion['fecha_emision']), 
                            'fecha_vencimiento' => Funciones::cadena_a_fecha($asignacion['fecha_vencimiento']),
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
                Session::flash('message', "Archivo de asignaciones importado con éxito. Tiempo estimado de carga: ".$tiempo);
            });

        }else if($tipo_archivo == "Pagos"){
            Session::flash('message', "Archivo de pagos fue importado con éxito.");
        }else if($tipo_archivo == "Marcar_deudores"){
            Session::flash('message', "Archivo de marcas a deudores fue importado con éxito.");
        }else if($tipo_archivo == "Marcar_contactos"){
            Session::flash('message', "Archivo de marcas a contactos fue importado con éxito.");
        }
        
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
