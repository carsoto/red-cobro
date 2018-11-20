<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;
use App\Deudor;
use App\Gestion;
use App\DeudoresGestiones;
use Session;
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
        $nueva_gestion->respuesta = $request->respuesta;
        $nueva_gestion->observacion = $request->observacion;
        $nueva_gestion->fecha_gestion = date('Y-m-d');
        if($nueva_gestion->save()){
            Session::flash('message', "Gestión registrada");
            return Redirect::back();
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
