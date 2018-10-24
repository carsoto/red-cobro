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


class ExcelController extends Controller
{
    public function formatearRut($unformattedRut) {

        if (strpos($unformattedRut, '-') !== false ) {

            $splittedRut = explode('-', $unformattedRut);

            $number = number_format($splittedRut[0], 0, ',', '.');

            $verifier = strtoupper($splittedRut[1]);

            return $number . '-' . $verifier;

        }

        return number_format($unformattedRut, 0, ',', '.');

    }


    public function registrarDeudor($rut, $nombre){
        $rut = $this->formatearRut($rut);
        $deudor = Deudor::where('rut', '=', $rut)->get();
        
        if(count($deudor) < 1){
            $new_deudor = new Deudor();
            $new_deudor->rut = $rut;
            $new_deudor->razon_social = $nombre;
            if($new_deudor->save()){
                $id = $new_deudor->iddeudores;
            }
        }else{
            $id = $deudor[0]->iddeudores;
        }
        return $id;
    }

    public function obtenerdeudores(){
        $deudores = Deudor::all();
    }

    public function importar()
    {

        Excel::load(public_path("asignaciones.xlsx"), function($reader) {
            $tiempo_inicial = microtime(true);
          
            foreach ($reader->all() as $key => $row) {
                foreach ($row as $index => $columna) {
                    $deudor = Deudor::firstOrCreate([
                        'rut' => $this->formatearRut($columna['rut']),
                        'razon_social' => $columna['razon_social_nombre']
                    ]);

                    $direccion = Direccion::firstOrCreate([
                        'idcomunas' => $this->getComuna($columna["region"], $columna["ciudad"], $columna["comuna"]), 
                        'direccion' => $columna["direccion"],
                        'complemento' => $columna["complemento"]
                    ]);

                    $deudor->direcciones()->sync($direccion->iddirecciones, false);

                    if($columna['fono_1'] != ''){
                        $correo = Correo::firstOrCreate([
                            'correo' => $columna['email']
                        ]);
                        $deudor->correos()->sync($correo->idcorreos_electronicos, false); 
                    }

                    if($columna['fono_1'] != ''){
                        $telefono1 = Telefono::firstOrCreate([
                            'telefono' => $columna['fono_1']
                        ]);
                        $deudor->telefonos()->sync($telefono1->idtelefonos, false);
                    }

                    if($columna['fono_2'] != ''){
                        $telefono2 = Telefono::firstOrCreate([
                            'telefono' => $columna['fono_2']
                        ]);
                        $deudor->telefonos()->sync($telefono2->idtelefonos, false);
                    }

                    $documento = Documento::firstOrCreate([
                        'numero' => $columna['num_documento'], 
                        'folio' => $columna['folio'], 
                        'deuda' => $columna['deuda'], 
                        'fecha_emision' => $columna['fecha_emision'], 
                        'fecha_vencimiento' => $columna['fecha_vencimiento'],
                        'dias_mora' => $columna['dias_mora']
                    ]);

                    $deudor->documentos()->sync($documento->iddocumentos, false);

                    $proveedor = Proveedor::firstOrCreate([
                        'razon_social' => $columna['proveedor']
                    ]);               

                    $proveedor->documentos()->sync($documento->iddocumentos, false);
                }
            }
            
            $tiempo_final = microtime(true);
            $tiempo = $tiempo_final - $tiempo_inicial;
            echo "El tiempo de ejecución del archivo ha sido de " . $tiempo . " segundos";
         
        });
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
                 * Valores del encabezado de la columna,
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
