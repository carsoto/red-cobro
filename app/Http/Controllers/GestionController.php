<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;
use App\Deudor;
use App\Gestion;
use App\Respuesta;
use App\RespuestasDetalle;
use App\DeudoresGestiones;
use Session;
use Datatables;
use Redirect;

class GestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(isset($request->rut)){
            $datos_deudor = $this->search_rut(decrypt($request->rut));
            return view('adminlte::gestiones.rut', array('datos_deudor' => $datos_deudor));    
        }
        return view('adminlte::gestiones.index');        
    }

    public function consultarrespuesta($idgestion){
        $gestion = Gestion::where('idgestiones', '=', $idgestion)->get();
        $gestion = $gestion[0];
        $respuestas = $gestion->respuestas;
        return Response::json(array('respuestas' => $respuestas));
    }

    public function consultardetallesrespuesta($idrespuesta){
        $respuesta = Respuesta::where('idrespuesta', '=', $idrespuesta)->get();
        $respuesta = $respuesta[0];
        $detalles = $respuesta->respuestas_detalles;
        return Response::json(array('detalles' => $detalles));
    }

    private function search_rut($rut){
        $deudor = Deudor::where('rut', '=', $rut)->get();
        $mensaje = '';
        $deuda = 0;
        $direcciones = $telefonos = $correos = $documentos = array();
        
        if(count($deudor) > 0){
            $deudor = $deudor[0];
            $direcciones = $deudor->direcciones;
            $telefonos = $deudor->telefonos;
            $correos = $deudor->correos;
            $documentos = $deudor->documentos;

            foreach ($deudor->documentos as $key => $doc) {
                $deuda += $doc->deuda;
            }

            $deuda = number_format($deuda, 2, ",", ".");
        }else{
            $mensaje = 'Por favor, verifique el rut ingresado es inválido';
        }
        return array('deudor' => $deudor, 'mensaje' => $mensaje, 'deuda' => $deuda, 'direcciones' => $direcciones, 'telefonos' => $telefonos, 'correos' => $correos, 'documentos' => $documentos);
    }

    public function search(Request $request){
        $rut = $request->consultar_rut;
        $resultado = $this->search_rut($rut);
        return Response::json($resultado);
    }

    public function historial(Request $request){
        $mensaje_error = "";
        $deudor = Deudor::where('iddeudores', '=', decrypt($request->id_deudor))->get();
        $deudor = $deudor[0];
        $gestiones = $deudor->gestiones;
        $filtered_gestiones_fecha = [];

        if(($request->dia == null) && ($request->mes == null) && ($request->anyo == null)){
            $mensaje_error = 'Por favor, seleccione una fecha válida a consultar. Escoja un mes o un año para sintetizar su consulta.';
            
        }else if(($request->dia != null) && ($request->mes != null) && ($request->anyo != null)){
            //BUSQUEDA FECHA ESPECIFICA
            $fecha_gestion = $request->anyo.'-'.$request->mes.'-'.$request->dia;
            
            $gestiones->each(function ($item) use (&$fecha_gestion, &$filtered_gestiones_fecha) {
                if($item->pivot->fecha_gestion == $fecha_gestion){
                    $filtered_gestiones_fecha[] = $item;
                }
            });

        }else if(($request->mes != null) && ($request->anyo != null)){
            //BUSQUEDA POR MES Y AÑO
            $mes = $request->mes;
            $anyo = $request->anyo;

            $gestiones->each(function ($item) use (&$mes, &$anyo, &$filtered_gestiones_fecha) {
                if(($item->pivot->mes == $mes) && ($item->pivot->anyo == $anyo)){
                    $filtered_gestiones_fecha[] = $item;
                }
            });

        }else if(($request->mes != null)){
            //BSQUEDA POR MES
            $mes = $request->mes;

            $gestiones->each(function ($item) use (&$mes, &$filtered_gestiones_fecha) {
                if($item->pivot->mes == $mes){
                    $filtered_gestiones_fecha[] = $item;
                }
            });

        }else if(($request->anyo != null)){
            $anyo = $request->anyo;

            $gestiones->each(function ($item) use (&$anyo, &$filtered_gestiones_fecha) {
                if($item->pivot->anyo == $anyo){
                    $filtered_gestiones_fecha[] = $item;
                }
            });
        }

        if(count($filtered_gestiones_fecha) > 0){
            return Datatables::of($filtered_gestiones_fecha)->editColumn('anyo', function($gestiones) {
                return $gestiones->pivot->anyo;

            })->editColumn('contacto', function($gestiones) {
                return $gestiones->pivot->contacto;

            })->editColumn('respuesta', function($gestiones) {
                $gestion_resp = Respuesta::where('idrespuesta', '=', $gestiones->pivot->respuestas_idrespuesta)->get();
                return $gestion_resp[0]->codigo.' - '.$gestion_resp[0]->respuesta;

            })->editColumn('detalle', function($gestiones) {
                $detalle_resp = RespuestasDetalle::where('respuestas_idrespuesta', '=', $gestiones->pivot->respuestas_idrespuesta)->where('literal', '=', $gestiones->pivot->detalle)->get();
                return $detalle_resp[0]->literal.' - '.$detalle_resp[0]->detalle;

            })->editColumn('fecha_gestion', function($gestiones) {
                return date('d-m-Y', strtotime($gestiones->pivot->fecha_gestion));

            })->editColumn('mes', function($gestiones) {
                return $gestiones->pivot->mes;

            })->editColumn('observacion', function($gestiones) {
                return $gestiones->pivot->observacion;

            })->make(true);

        }else{
            $mensaje_error = 'No hay gestiones para este RUT en la fecha consultada.';
        }

        return Response::json(array('mensaje_error' => $mensaje_error));

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
        $nueva_gestion = new DeudoresGestiones();

        $nueva_gestion->deudores_iddeudores = $request->id_deudor;
        $nueva_gestion->contacto = $request->contacto;
        $nueva_gestion->gestiones_idgestiones = $request->gestion;
        $nueva_gestion->respuestas_idrespuesta = $request->respuesta;
        
        if(isset($request->detalle)){
            $nueva_gestion->detalle = $request->detalle;
        }
        
        $nueva_gestion->observacion = $request->observacion;
        $nueva_gestion->anyo = date('Y');
        $nueva_gestion->mes = date('m');
        $nueva_gestion->fecha_gestion = date('Y-m-d');
        
        if($nueva_gestion->save()){
            return Response::json(array('mensaje' => 'Gestión agregada con éxito'));
        }
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
