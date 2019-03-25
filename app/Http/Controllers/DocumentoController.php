<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Datatables;
use App\Documento;
use App\Deudor;

class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adminlte::documentos.index');
    }

    public function documentos($iddeudor){
        
        $deudor = Deudor::where('iddeudores', '=', decrypt($iddeudor))->get();
        $deudor = $deudor[0];
        $documentos = $deudor->documentos()->where('activo', '=', 1)->get();
        
        return Datatables::of($documentos)
            ->editColumn('deuda', function ($documento) {
                return number_format($documento->deuda, 2, ",", ".");
            })
            ->addColumn('pago', function ($documento) {
                $pagos = 0;
                foreach ($documento->pagos as $key => $pago) {
                    $pagos += $pago->monto;
                }
                return number_format($pagos, 2, ",", ".");
            })
            ->addColumn('saldo', function ($documento) {
                $saldo = 0;
                $pagos = 0;
                foreach ($documento->pagos as $key => $pago) {
                    $pagos += $pago->monto;
                }
                $saldo = $documento->deuda - $pagos;
                return number_format($saldo, 2, ",", ".");
            })
            ->editColumn('fecha_emision', function ($documento) {
                return date('d-m-Y', strtotime($documento->fecha_emision));
            })
            ->editColumn('fecha_vencimiento', function ($documento) {
                return date('d-m-Y', strtotime($documento->fecha_vencimiento));
        })->make(true);
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
