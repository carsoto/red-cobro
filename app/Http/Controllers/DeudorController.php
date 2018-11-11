<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Datatables;
use App\Deudor;
use Response;

class DeudorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adminlte::deudores.index');
    }

    public function list(){
        //return DataTables::of(User::query())->make(true);
        
        $deudores = Deudor::all();
        
        return Datatables::of($deudores)
            ->addColumn('action', function ($deudor) {
                /*return '<a href="'.route('deudores.edit', encrypt($deudor->iddeudores)).'" data-id="'.encrypt($deudor->iddeudores).'" title="'.trans('app.edit_title').'" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                        <a href="#" data-id="'.encrypt($deudor->iddeudores).'" title="'.trans('app.delete_title').'" class="btn btn-danger btn-xs eliminar_deudor"><i class="fa fa-trash"></i></a>';*/
                return '<a href="'.route('gestiones.index', ['rut' => encrypt($deudor->rut)]).'" data-id="'.encrypt($deudor->iddeudores).'" title="Detalles de deudas" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></a> <a href="'.route('deudores.gestion', encrypt($deudor->iddeudores)).'" data-id="'.encrypt($deudor->iddeudores).'" title="Agregar gestión" class="btn btn-warning btn-xs"><i class="fa fa-files-o"></i></a> <a href="'.route('deudores.gestion.historico', encrypt($deudor->iddeudores)).'" data-id="'.encrypt($deudor->iddeudores).'" title="Gestiones" class="btn btn-info btn-xs"><i class="fa fa-history"></i></a>';
            })
            ->editColumn('iddeudores', '{{ encrypt($iddeudores) }}')
            ->make(true);
    }

    public function detallesdeudor($id_deudor)
    {
        $deudor = Deudor::where('iddeudores', decrypt($id_deudor))->get();
        $deudor = $deudor[0];
        $direcciones = $deudor->direcciones;
        $telefonos = $deudor->telefonos;
        $correos = $deudor->correos;
        $documentos = $deudor->documentos;
        $deuda = 0;

        foreach ($deudor->documentos as $key => $doc) {
            $deuda += $doc->deuda;
        }

        $deuda = number_format($deuda, 2, ",", ".");
        
        return Response::json(array('direcciones' => $direcciones, 'telefonos' => $telefonos, 'correos' => $correos, 'documentos' => $documentos, 'deuda' => $deuda));
    }

    public function gestion($id_deudor)
    {
        return view('adminlte::deudores.gestion.index');
    }

    public function gestionhistorica($id_deudor)
    {
        return view('adminlte::deudores.gestion.historico');
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
