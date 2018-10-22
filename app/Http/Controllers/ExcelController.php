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
    public function registrarDeudor($rut, $nombre){
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

    public function importar()
    {

        Excel::load('public/asignaciones.xlsx', function($reader) {
            $tiempo_inicial = microtime(true);
            
            foreach ($reader->all() as $key => $row) {
                foreach ($row as $index => $columna) {
                    $this->registrarDeudor($columna["rut"], $columna["razon_social_nombre"]);
                }
            }

            $tiempo_final = microtime(true);
            $tiempo = $tiempo_final - $tiempo_inicial;
            echo "El tiempo de ejecución del archivo ha sido de " . $tiempo . " segundos";
        });
    }   

    public function importar21515151()
    {
        /*$id_deudor = $this->registrarDeudor('0962597001', 'Carmen');
        dd($id_deudor);*/
        /** El método load permite cargar el archivo definido como primer parámetro */
        
        Excel::load('public/asignaciones.xlsx', function ($reader) {
            $tiempo_inicial = microtime(true);
            /*foreach ($reader->get() as $key => $row) {    
                dd($row);
                //$this->registrarDeudor($row["rut"], $row["razon_social_nombre"]);
                
            }*/
            $reader->each(function($row) {
                echo "<br>".$row->rut;
            });
            /**
             * $reader->get() nos permite obtener todas las filas de nuestro archivo
             *
            
            $comuna = new Comuna();
            $correo = new Correo();
            $deudor = new Deudor();
            $direccion = new Direccion();
            $documento = new Documento();
            $proveedor = new Proveedor();
            $provincia = new Provincia();
            $region = new Region();
            $supervisor = new Supervisor();
            $telefono = new Telefono();
            
            $row["num_documento"];
            $row["folio"];
            $row["deuda"];
            $row["fecha_vencimiento"];
            $row["fecha_emision"];
            $row["direccion"];
            $row["complemento"];
            $row["comuna"];
            $row["ciudad"];
            $row["region"];
            $row["fono_1"];
            $row["fono_2"];
            $row["email"];
            $row["dias_mora"];
            $row["proveedor"];
            foreach ($reader->get() as $key => $row) {
                //dd($row);
                /*$producto = [
                    'articulo' => $row['articulo'],
                    'cantidad' => $row['cantidad'],
                    'precio_unitario' => $row['precio_unitario'],
                    'fecha_registro' => $row['fecha_registro'],
                    'status' => $row['status'],
                ];
                /** Una vez obtenido los datos de la fila procedemos a registrarlos *
                if (!empty($producto)) {
                    DB::table('productos')->insert($producto);
                }*
            }
            echo 'Los productos han sido importados exitosamente';*/
            $tiempo_final = microtime(true);
            $tiempo = $tiempo_final - $tiempo_inicial;
            echo "El tiempo de ejecución del archivo ha sido de " . $tiempo . " segundos";
        });
        
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
