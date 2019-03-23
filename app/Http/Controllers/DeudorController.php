<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Datatables;
use App\Deudor;
use App\Gestion;
use App\Telefono;
use App\Correo;
use Carbon\Carbon;
use Response;
use DateTime;

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
        	->addColumn('fecha_asignacion', function ($deudor) { 
				$asignacion = $deudor->asignaciones()->orderBy('created_at', 'desc')->first();
				return Carbon::parse($asignacion->fecha_asignacion)->format('d-m-Y');
        	})
            ->addColumn('asignado', function ($deudor) { 
                $asignacion = $deudor->asignaciones()->orderBy('created_at', 'desc')->first();
                return number_format($asignacion->deuda, 2, ",", ".");
            })
        	->addColumn('dias_mora', function ($deudor) { 
        		return $deudor->documentos->max('dias_mora');
        	})
        	->addColumn('marca_1', function ($deudor) { 
        		$m = $deudor->marcas()->where('orden', '=', 1)->first();
        		if($m == null){
        			$mark = "-";
        		}else{
        			$mark = $m->marca;
        		}
        		return $mark; 
        	})
        	->addColumn('marca_2', function ($deudor) { 
        		$m = $deudor->marcas()->where('orden', '=', 2)->first();
        		if($m == null){
        			$mark = "-";
        		}else{
        			$mark = $m->marca;
        		}
        		return $mark; 
        	})
        	->addColumn('deuda_recuperada', function ($deudor) { 
				$deuda_recuperada = 0;
				$documentos = $deudor->documentos;
				foreach ($documentos as $clave_doc => $doc) {
				    foreach ($doc->pagos as $clave_pago => $pago) {
				        $deuda_recuperada += $pago->monto;
				    }
				}
        		return number_format($deuda_recuperada, 2, ",", ".");
        	})
            ->addColumn('action', function ($deudor) {
                /*return '<a href="'.route('gestiones.index', ['rut' => encrypt($deudor->rut)]).'" data-id="'.encrypt($deudor->iddeudores).'" title="Detalles de deudas" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></a> <a href="'.route('deudores.gestion', encrypt($deudor->iddeudores)).'" data-id="'.encrypt($deudor->iddeudores).'" title="Agregar gestión" class="btn btn-warning btn-xs"><i class="fa fa-files-o"></i></a> <a href="'.route('deudores.gestion.historico', encrypt($deudor->iddeudores)).'" data-id="'.encrypt($deudor->iddeudores).'" title="Gestiones" class="btn btn-info btn-xs"><i class="fa fa-history"></i></a>';*/
                return '<a href="'.route('gestiones.index', ['rut' => encrypt($deudor->rut)]).'" data-id="'.encrypt($deudor->iddeudores).'" title="Detalles de deudas" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></a>';
            })
            ->editColumn('iddeudores', '{{ encrypt($iddeudores) }}')
            ->make(true);
    }

    public function direcciones($id_deudor)
    {
        $deudor = Deudor::where('iddeudores', decrypt($id_deudor))->get();
        $deudor = $deudor[0];
        $direcciones = $deudor->direcciones;
        return view('adminlte::deudores.direcciones', array('direcciones' => $direcciones))->render();
    }

    public function documentos($id_deudor){
        return view('adminlte::deudores.documentos')->render();
    }

    public function gestioneshistorial($id_deudor){
        $gestiones = Gestion::all();
        foreach ($gestiones as $key => $gestion) {
            $tipos_gestion[$gestion->idgestiones] = $gestion->codigo.' - '.$gestion->descripcion;
        }
        return view('adminlte::deudores.historial-gestiones', array('iddeudor' => $id_deudor, 'tipos_gestion' => $tipos_gestion))->render();
    }

    public function gestionnueva($id_deudor){
        $deudor = Deudor::where('iddeudores', decrypt($id_deudor))->get();
        $deudor = $deudor[0];
        $telefonos = $deudor->telefonos;
        $correos = $deudor->correos;
        $contactos = array();
        $gestiones_reg = Gestion::all();
        $gestiones = array();
        $respuestas = array();

        foreach ($gestiones_reg as $key => $g) {
            $gestiones[$g->idgestiones] = $g->codigo.' - '.$g->descripcion;
        }

        if(count($telefonos) > 0){
            foreach ($telefonos as $key => $t) {
                $contactos[$t->telefono] = $t->telefono;
                //array_push($contactos, $t->telefono);
            }    
        }

        if(count($correos) > 0){
            foreach ($correos as $key => $c) {
                $contactos[$c->correo] = $c->correo;
                //array_push($contactos, $c->correo);
            }    
        }
        
        return view('adminlte::deudores.gestion.create', array('deudor' => $deudor, 'contactos' => $contactos, 'gestiones' => $gestiones, 'respuestas' => $respuestas))->render();
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

    public function agregar_contacto(Request $request)
    {
        $id_deudor = $request->id_deudor;
        $contacto = $request->contacto;
        $tipo = $request->tipo;
        $status = '';
        $msg = '';
        $id = '';

        $deudor = Deudor::findOrFail(decrypt($id_deudor));
        if($tipo == 'telefono'){
            $telefono = str_replace(' ', '', $contacto);
            if($telefono != ''){
                $new_contact = Telefono::updateOrCreate(['telefono' => $telefono], [
                    'telefono' => $telefono
                ]);

                $id = $new_contact->idtelefonos;

                if($deudor->telefonos()->sync($new_contact->idtelefonos, false)){
                    $status = 'success';
                    $msg = 'El contacto fue agregado exitosamente!';
                }
                else{
                    $status = 'fail';
                    $msg = 'Ocurrió un error no se pudo agregar el teléfono';
                }
            }
        }if($tipo == 'correo'){
            $correo = str_replace(' ', '', $contacto);
            if($correo != ''){
                if (strpos($correo, '@') !== false ) {
                    $correo = Correo::updateOrCreate(['correo' => $correo], [
                        'correo' => $correo
                    ]);

                    $id = $correo->idcorreos_electronicos;

                    if($deudor->correos()->sync($correo->idcorreos_electronicos, false)){
                        $status = 'success';
                        $msg = 'El contacto fue agregado exitosamente!';
                    }
                    else{
                        $status = 'fail';
                        $msg = 'Ocurrió un error no se pudo agregar el correo electrónico';
                    }
                } 
            }
        }
        return Response::json(array('status' => $status, 'msg' => $msg, 'id' => $id));
    }

    public function modificar_contacto(Request $request){
        $id_deudor = $request->iddeudor;
        $tipo = $request->tipo;
        $id_contacto = $request->id_contacto;

        $deudor = Deudor::findOrFail(decrypt($id_deudor));

        if($tipo == 'telefono'){
            $contacto = $deudor->telefonos()->where('telefonos.idtelefonos', '=', $id_contacto)->get();
        }

        if($tipo == 'correo'){
            $contacto = $deudor->correos()->where('correos.idcorreos_electronicos', '=', $id_contacto)->get();
        }

        $contacto = $contacto[0];
        
        if($contacto->pivot->activo){
            $contacto->pivot->activo = 0;
        } else {
            $contacto->pivot->activo = 1;
        }

        if($contacto->pivot->save()){
            $status = 'success';
            if($contacto->pivot->activo){
                $msg = 'El contacto fue activado exitosamente!';
            } else {
                $msg = 'El contacto fue inactivado exitosamente!';
            }
        } else {
            $status = 'failed';
            if($contacto->pivot->activo){
                $msg = 'Disculpe, el contacto no pudo ser activado!';
            }else{
                $msg = 'Disculpe, el contacto no pudo ser inactivado!';
            }
        }    
        return Response::json(array('status' => $status, 'msg' => $msg));
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
