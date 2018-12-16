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
use App\DeudoresMarca;
use Funciones;
use Session;
use Datatables;
use Redirect;
use Carbon\Carbon;

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
        $contactos = array('telefonos' => array(), 'correos' => array());
        $deuda_recuperada = 0;

        if(count($deudor) > 0){
            $deudor = $deudor[0];
            $direcciones = $deudor->direcciones;
            $telefonos = $deudor->telefonos;
            $correos = $deudor->correos;
            $documentos = $deudor->documentos;
            $marcas = $deudor->marcas;
            $cantd_marcas = count($marcas);

            if($cantd_marcas < 6){
                $marcas_vacias = 6 - $cantd_marcas;

                for ($i=0; $i < $marcas_vacias; $i++) { 
                    $new_marca = new DeudoresMarca;
                    $new_marca->marca = "-";
                    $marcas->push($new_marca);
                }
            }

            foreach ($documentos as $clave_doc => $doc) {
                foreach ($doc->pagos as $clave_pago => $pago) {
                    $deuda_recuperada += $pago->monto;
                }
            }
        
            $asignacion = $deudor->asignaciones()->orderBy('created_at', 'desc')->first();
            
            $ultima_asignacion = array();
            $ultima_asignacion['fecha_asignacion'] = Carbon::parse($asignacion->fecha_asignacion)->format('d-m-Y');
            $ultima_asignacion['deuda'] = number_format($asignacion->deuda, 2, ",", ".");
            $ultima_asignacion['dias_mora'] = $documentos->max('dias_mora');

            $saldo_hoy = $asignacion->deuda - $deuda_recuperada;
            $deuda_recuperada = number_format($deuda_recuperada, 2, ",", ".");
            $saldo_hoy = number_format($saldo_hoy, 2, ",", ".");

            $ultima_gestion_reg = $deudor->gestiones()->orderBy('pivot_created_at', 'desc')->first();
            $ultima_gestion = array();

            if($ultima_gestion_reg != null){
                $ultima_gestion['fecha_ult_gestion'] = Carbon::parse($ultima_gestion_reg->fecha_gestion)->format('d-m-Y');
                $ultima_gestion['ult_gestion'] = $ultima_gestion_reg->codigo." - ".$ultima_gestion_reg->descripcion;
                
                if($ultima_gestion_reg->pivot->respuesta){
                    $ultima_gestion['ult_respuesta'] = $ultima_gestion_reg->pivot->respuesta;
                }else{
                    $ultima_gestion['ult_respuesta'] = "-";
                }
                
                if($ultima_gestion_reg->pivot->detalle){
                    $ultima_gestion['ult_detalle'] = $ultima_gestion_reg->pivot->detalle;
                }else{
                    $ultima_gestion['ult_detalle'] = "-";
                }
                
                if($ultima_gestion_reg->pivot->observacion){
                    $ultima_gestion['ult_observacion'] = $ultima_gestion_reg->pivot->observacion;
                }else{
                    $ultima_gestion['ult_observacion'] = "-";
                }
            }

            else{
                $ultima_gestion['fecha_ult_gestion'] = "-";
                $ultima_gestion['ult_gestion'] = "-";
                $ultima_gestion['ult_respuesta'] = "-";
                $ultima_gestion['ult_detalle'] = "-";
                $ultima_gestion['ult_observacion'] = "-";
            }

            if(count($telefonos) > 0){
                foreach($telefonos AS $key => $value){
                    $ult_gestion_contacto = $deudor->gestiones()->where('contacto', '=', $value->telefono)->orderBy('pivot_created_at', 'desc')->first();
                    if($ult_gestion_contacto != null){
                        $contactos['telefonos'][$value->telefono] = array('gestion' => $ult_gestion_contacto->codigo." - ".$ult_gestion_contacto->descripcion, 'respuesta' => $ultima_gestion_reg->pivot->respuesta);
                    }else{
                        $contactos['telefonos'][$value->telefono] = array('gestion' => '-', 'respuesta' => '-');
                    }
                }
            }
            
            if(count($correos) > 0){
                foreach($correos AS $key => $value){
                    $ult_gestion_contacto = $deudor->gestiones()->where('contacto', '=', $value->correo)->orderBy('pivot_created_at', 'desc')->first();
                    if($ult_gestion_contacto != null){
                        $contactos['correos'][$value->correo] = array('gestion' => $ult_gestion_contacto->codigo." - ".$ult_gestion_contacto->descripcion, 'respuesta' => $ultima_gestion_reg->pivot->respuesta);
                    }else{
                        $contactos['correos'][$value->correo] = array('gestion' => '-', 'respuesta' => '-');
                    }
                }
            }
        }else{
            $mensaje = 'Por favor, verifique el rut ingresado es inválido';
        }

        return array('deudor' => $deudor, 'mensaje' => $mensaje, 'direcciones' => $direcciones, 'contactos' => $contactos, 'documentos' => $documentos, 'marcas' => $marcas, 'deuda_recuperada' => $deuda_recuperada, 'saldo_hoy' => $saldo_hoy, 'ultima_asignacion' => $ultima_asignacion, 'ultima_gestion' => $ultima_gestion);
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
        $id_gestion = 0;

        if(isset($request->fecha_consulta)){
            if($request->tipo_gestion != null){
                $id_gestion = $request->tipo_gestion;
            }

            $fecha_gestion = Carbon::parse($request->fecha_consulta)->format('Y-m-d');

            $gestiones->each(function ($item) use (&$fecha_gestion, &$id_gestion, &$filtered_gestiones_fecha) {
                if($id_gestion == 0){
                    if($item->pivot->fecha_gestion == $fecha_gestion){
                        $filtered_gestiones_fecha[] = $item;
                    }
                }else{
                    if(($item->pivot->fecha_gestion == $fecha_gestion) && ($item->pivot->gestiones_idgestiones == $id_gestion)){
                        $filtered_gestiones_fecha[] = $item;
                    }
                }
            });

        }else{
            $mensaje_error = 'Por favor, seleccione una fecha válida a consultar.';
        }
        
        if(count($filtered_gestiones_fecha) > 0){
            return Datatables::of($filtered_gestiones_fecha)->editColumn('anyo', function($gestiones) {
                return $gestiones->pivot->anyo;

            })->editColumn('contacto', function($gestiones) {
                return $gestiones->pivot->contacto;

            })->editColumn('gestor', function($gestiones) {
                return $gestiones->pivot->gestor;

            })->editColumn('respuesta', function($gestiones) {
                return $gestiones->pivot->respuesta;

            })->editColumn('detalle', function($gestiones) {
                return $gestiones->pivot->detalle;

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
        $nueva_gestion->gestor = Funciones::nombre_completo_usuario();
        $nueva_gestion->contacto = $request->contacto;
        $nueva_gestion->gestiones_idgestiones = $request->gestion;
        $nueva_gestion->respuesta = $request->respuesta;

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
