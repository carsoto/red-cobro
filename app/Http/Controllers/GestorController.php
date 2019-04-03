<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Datatables;
use App\Gestor;
use App\Cartera;
use Validator;
use Session;
use Redirect;
use Funciones;
use Auth;

class GestorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adminlte::gestores.index');
    }

    public function list(){
        
        $gestores = Gestor::all();
        
        return Datatables::of($gestores)
            ->addColumn('cartera', function ($gestores) {
                foreach ($gestores->carteras as $cartera) {
                    return strtoupper($cartera->descripcion);
                }
            })
            ->addColumn('action', function ($gestor) {
                //<a href="#" data-id="'.encrypt($gestor->idgestores).'" title="'.trans('app.delete_title').'" class="btn btn-danger btn-xs eliminar_gestor"><i class="fa fa-trash"></i></a>
                return '<a href="'.route('gestores.edit', encrypt($gestor->idgestores)).'" data-id="'.encrypt($gestor->idgestores).'" title="'.trans('app.edit_title').'" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>';
            })
            ->editColumn('idgestores', '{{ encrypt($idgestores) }}')
            ->make(true);
    }

    protected function validator(array $data, $gestor = null, $update = null)
    {
        $messages = [
            'rut_dv.required' => 'El RUT es obligatorio',
            'rut_dv.max' => 'El RUT no puede tener más de 11 caracteres',
            'rut_dv.regex' => 'No es un RUT válido',
            'rut_dv.unique' => 'El RUT ya se encuentra registrado',
            'razon_social.required' => 'La razón social es obligatoria'
        ];

        if($update){
            $rules = [
                'rut_dv' => ['required', 'max:11', 'unique:gestores,rut_dv,'.$gestor->idgestores.',idgestores', 'regex:/^(\d{7,9}-)([a-zA-Z]{1}$|\d{1}$)/'],
                'razon_social' => 'required|max:255',
            ];
        }else{
            $rules = [
                'rut_dv' => ['required', 'max:11', 'unique:gestores', 'regex:/^(\d{7,9}-)([a-zA-Z]{1}$|\d{1}$)/'],
                'razon_social' => 'required|max:255',
            ];
        }

        return Validator::make($data, $rules, $messages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gestor = new Gestor();
        //$cartera_clientes = Funciones::carteras();
        $cartera_selected = 0;
        $cartera_clientes = array();
        
        return view('adminlte::gestores.create', array('gestor' => $gestor, 'cartera_selected' => $cartera_selected, 'cartera_clientes' => $cartera_clientes));
    }

    public function nuevacartera(){
        //$cartera_clientes = Funciones::carteras();
        return view('adminlte::gestores.create_cartera');
    }

    public function crearcartera(Request $request){
        if($request->cartera != ''){
            $desc_cartera = strtoupper($request->cartera);
            
            $cartera = Cartera::firstOrCreate(['descripcion' => $desc_cartera], [
                'descripcion' => $desc_cartera,
            ]);

            //$gestor->carteras()->sync($cartera->idcarteras, false);
            
            Session::flash('message', "Cartera creada exitosamente");
        }else{
            Session::flash('message-error', "Cartera no puede estar en blanco");
        }

        return Redirect::back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        
        $rut = explode('-', $request->rut_dv);

        Gestor::create([
            'rut' => $rut[0],
            'rut_dv' => $request->rut_dv,
            'razon_social' => $request->razon_social,
        ]);
        
        Session::flash('message', "Gestor creado exitosamente");
        return Redirect::back();
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
        $gestor = Gestor::where('idgestores', '=', decrypt($id))->first();
        $cartera_selected = 0;
        $cartera_clientes = array();
        
        return view('adminlte::gestores.edit', array('gestor' => $gestor, 'cartera_selected' => $cartera_selected, 'cartera_clientes' => $cartera_clientes));
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
        $gestor = Gestor::where('idgestores', '=', decrypt($id))->first();
        $this->validator($request->all(), $gestor, true)->validate();
        $rut = explode('-', $request->rut_dv);
        //$gestor->idgestores = decrypt($id);
        $gestor->rut = $rut[0];
        $gestor->rut_dv = $request->rut_dv;
        $gestor->razon_social = $request->razon_social;  
        $gestor->save();
        Session::flash('message', "Gestor actualizado exitosamente");
        return Redirect::back();
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
