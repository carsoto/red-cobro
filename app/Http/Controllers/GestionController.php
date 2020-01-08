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
use App\Marca;
use Funciones;
use Session;
use Datatables;
use Redirect;
use Carbon\Carbon;
use DB;
use Auth;

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
        //print_r($idgestion);
        $gestion = Gestion::where('idgestiones', '=', $idgestion)->get();
        $gestion = $gestion[0];
       //print_r($gestion);
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
            $id_deudor = encrypt($deudor->iddeudores);
            $direcciones = $deudor->direcciones;
            $telefonos = $deudor->telefonos;
            $correos = $deudor->correos;
            $documentos = $deudor->documentos()->get();
            $marcas = $deudor->marcas->take(6);
            $cantd_marcas = count($marcas);

            if($cantd_marcas < 6){
                $marcas_vacias = 6 - $cantd_marcas;

                for ($i=0; $i < $marcas_vacias; $i++) { 
                    $new_marca = new Marca;
                    $new_marca->marca = "-";
                    $marcas->push($new_marca);
                }
            }

            foreach ($deudor->documentos as $clave_doc => $doc) {
                foreach ($doc->pagos as $clave_pago => $pago) {
                    $deuda_recuperada += $pago->monto;
                }
            }
            
            //$asignacion = $deudor->asignaciones()->orderBy('created_at', 'desc')->first();
            
            $ultima_asignacion = array();
            $ultima_asignacion['fecha_asignacion'] = Carbon::parse($deudor->fecha_asignacion)->format('d-m-Y');
            $ultima_asignacion['deuda'] = number_format($deudor->monto_asignacion, 2, ",", ".");
            $ultima_asignacion['dias_mora'] = $documentos->max('dias_mora');

            $saldo_hoy = $deudor->monto_asignacion - $deuda_recuperada;
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
                    $ult_gestion_contacto = $deudor->gestiones()->where('deudores_telefonos_id', '=', $value->idtelefonos)->orderBy('pivot_created_at', 'desc')->first();
            
                    if($ult_gestion_contacto != null){
                        $contactos['telefonos'][$value->telefono] = array('id' => $value->idtelefonos, 'fecha' => Carbon::parse($ult_gestion_contacto->pivot->fecha_gestion)->format('d-m-Y'), 'gestion' => $ult_gestion_contacto->codigo." - ".$ult_gestion_contacto->descripcion, 'respuesta' => $ultima_gestion_reg->pivot->respuesta, 'estatus' => $value->pivot->activo);
                    }else{
                        $contactos['telefonos'][$value->telefono] = array('id' => $value->idtelefonos, 'fecha' => '-', 'gestion' => '-', 'respuesta' => '-', 'estatus' => $value->pivot->status);
                    }
                }
            }
            
            if(count($correos) > 0){
                foreach($correos AS $key => $value){
                    $ult_gestion_contacto = $deudor->gestiones()->where('deudores_correos_id', '=', $value->idcorreos_electronicos)->orderBy('pivot_created_at', 'desc')->first();
                    if($ult_gestion_contacto != null){
                        $contactos['correos'][$value->correo] = array('id' => $value->idcorreos_electronicos, 'fecha' => Carbon::parse($ult_gestion_contacto->pivot->fecha_gestion)->format('d-m-Y'), 'gestion' => $ult_gestion_contacto->codigo." - ".$ult_gestion_contacto->descripcion, 'respuesta' => $ultima_gestion_reg->pivot->respuesta, 'estatus' => $value->pivot->activo);
                    }else{
                        $contactos['correos'][$value->correo] = array('id' => $value->idcorreos_electronicos, 'fecha' => '-', 'gestion' => '-', 'respuesta' => '-', 'estatus' => $value->pivot->status);
                    }
                }
            }
        }else{
            $mensaje = 'Por favor, verifique el rut ingresado es inválido';
        }

        return array('deudor' => $deudor, 'mensaje' => $mensaje, 'direcciones' => $direcciones, 'contactos' => $contactos, 'documentos' => $documentos, 'marcas' => $marcas, 'deuda_recuperada' => $deuda_recuperada, 'saldo_hoy' => $saldo_hoy, 'ultima_asignacion' => $ultima_asignacion, 'ultima_gestion' => $ultima_gestion, 'id_deudor' => $id_deudor);
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
        $lista_gestiones = Gestion::select(DB::raw("CONCAT(codigo,' - ',descripcion) AS gestion"), 'idgestiones')->pluck('gestion', 'idgestiones');

        if(($request->fecha_inicio_consulta) && ($request->fecha_fin_consulta)){
            if($request->tipo_gestion != null){
                $id_gestion = $request->tipo_gestion;
            }

            $inicio_gestion = Carbon::parse($request->fecha_inicio_consulta)->format('Y-m-d');
            $fin_gestion = Carbon::parse($request->fecha_fin_consulta)->format('Y-m-d');

            if($id_gestion == 0){
                $filtered_gestiones_fecha = $deudor->gestiones()->whereBetween('fecha_gestion', [$inicio_gestion, $fin_gestion])->get();
            }else{
                $filtered_gestiones_fecha = $deudor->gestiones()->whereBetween('fecha_gestion', [$inicio_gestion, $fin_gestion])->where('gestiones_idgestiones', '=', $id_gestion)->get();
            }

        }else{
            $mensaje_error = 'Por favor, seleccione una fecha inicio y fin válida a consultar.';
        }
        
        if(count($filtered_gestiones_fecha) > 0){
            return Datatables::of($filtered_gestiones_fecha)->editColumn('contacto', function($gestiones) {
                return $gestiones->pivot->contacto;

            })->editColumn('descripcion', function ($gestiones) use (&$lista_gestiones) {
                return $lista_gestiones[$gestiones->idgestiones];

            })->editColumn('gestor', function($gestiones) {
                return $gestiones->pivot->gestor;

            })->editColumn('respuesta', function($gestiones) {
                return $gestiones->pivot->respuesta;

            })->editColumn('detalle', function($gestiones) {
                return $gestiones->pivot->detalle;

            })->editColumn('fecha_gestion', function($gestiones) {
                return date('d-m-Y', strtotime($gestiones->pivot->fecha_gestion));

            })->editColumn('observacion', function($gestiones) {
                return $gestiones->pivot->observacion;

            })->editColumn('prox_gestion', function ($gestiones) use (&$lista_gestiones) {
                if($gestiones->pivot->prox_gestion != ""){
                    return $lista_gestiones[$gestiones->pivot->prox_gestion];
                }else{
                    return $gestiones->pivot->prox_gestion;
                }

            })->editColumn('fecha_prox_gestion', function($gestiones) {
                return Carbon::parse($gestiones->pivot->fecha_prox_gestion)->format('d-m-Y');

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
        dd($request);
        $nueva_gestion->deudores_iddeudores = $request->id_deudor;
        //$nueva_gestion->gestor = Funciones::nombre_completo_usuario();
       // $nueva_gestion->contacto = ;
        if(!empty($request->contacto)){
            $nueva_gestion->contacto = $request->contacto;
        }
        $nueva_gestion->gestiones_idgestiones = $request->gestion;
        $nueva_gestion->respuestas_idrespuesta = $request->respuesta;
        $nueva_gestion->users_id = Auth::id();
        //busco que tipo de gestion es la respuesta
        $respuesta = Respuesta::where('idrespuesta', $request->respuesta)->get();
        $respuesta = $respuesta[0];
        $contacto_directo = $respuesta->contacto_directo;
        if(!empty($contacto_directo) && $contacto_directo == 1) {
            $nueva_gestion->contacto_directo = 1;
            $compromiso = $respuesta->compromiso;
            if(!empty($compromiso) && $compromiso == 1){
                $nueva_gestion->compromiso = 1;
            }
        }

        $contacto_indirecto = $respuesta->contacto_indirecto;
        if(!empty($contacto_indirecto) && $contacto_indirecto == 1) {
            $nueva_gestion->contacto_indirecto = 1;
        }

        $sin_contacto = $respuesta->sin_contacto;
        if(!empty($sin_contacto) && $sin_contacto == 1) {
            $nueva_gestion->sin_contacto = 1;
        }

        if(isset($request->detalle)){
            $nueva_gestion->idrespuestas_detalles = $request->detalle;
        }
        
        $nueva_gestion->observacion = $request->observacion;
        $nueva_gestion->ano = date('Y');
        $nueva_gestion->mes = date('m');
        $nueva_gestion->fecha = date('Y-m-d');
        $prox_gestion = null;
        $fecha_prox_gestion = null;

        if(isset($request->prox_gestion)){
            $prox_gestion = $request->prox_gestion;
        }

        if(isset($request->fecha_prox_gestion)){
            $fecha_prox_gestion = Carbon::parse($request->fecha_prox_gestion)->format('Y-m-d');
        }

        $nueva_gestion->idgestion_futura = $prox_gestion;
        $nueva_gestion->fecha_futura = $fecha_prox_gestion;
        
        if($nueva_gestion->save()){
            return Response::json(array('mensaje' => 'Gestión agregada con éxito'));
        }
    }

    public function gestion_diaria(){
        return view('adminlte::gestiones.diaria');
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
