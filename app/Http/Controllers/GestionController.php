<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;
use App\Deudor;

class GestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adminlte::gestiones.index');
    }

    public function search(Request $request){
        $rut = $request->consultar_rut;
        $deudor = Deudor::where('rut', '=', $rut)->get();
        $mensaje = '';
        $deuda = 0;
        $direcciones = array();
        $telefonos = array();
        $correos = array();
        $documentos = array();
        
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
        return Response::json(array('deudor' => $deudor, 'mensaje' => $mensaje, 'deuda' => $deuda, 'direcciones' => $direcciones, 'telefonos' => $telefonos, 'correos' => $correos, 'documentos' => $documentos));
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
