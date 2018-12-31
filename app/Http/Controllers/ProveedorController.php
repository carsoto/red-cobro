<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Datatables;
use App\Proveedor;
use Validator;
use Session;
use Redirect;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adminlte::proveedores.index');
    }

    public function list(){
        
        $proveedores = Proveedor::all();
        
        return Datatables::of($proveedores)
            ->addColumn('action', function ($proveedor) {
                //<a href="#" data-id="'.encrypt($proveedor->idproveedores).'" title="'.trans('app.delete_title').'" class="btn btn-danger btn-xs eliminar_proveedor"><i class="fa fa-trash"></i></a>
                return '<a href="'.route('proveedores.edit', encrypt($proveedor->idproveedores)).'" data-id="'.encrypt($proveedor->idproveedores).'" title="'.trans('app.edit_title').'" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>';
            })
            ->editColumn('idproveedores', '{{ encrypt($idproveedores) }}')
            ->make(true);
    }

    protected function validator(array $data, $proveedor = null, $update = null)
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
                'rut_dv' => ['required', 'max:11', 'unique:proveedores,rut_dv,'.$proveedor->idproveedores.',idproveedores', 'regex:/^(\d{7,9}-)([a-zA-Z]{1}$|\d{1}$)/'],
                'razon_social' => 'required|max:255',
            ];
        }else{
            $rules = [
                'rut_dv' => ['required', 'max:11', 'unique:proveedores', 'regex:/^(\d{7,9}-)([a-zA-Z]{1}$|\d{1}$)/'],
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
        $proveedor = new Proveedor();
        return view('adminlte::proveedores.create', array('proveedor' => $proveedor));
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

        Proveedor::create([
            'rut' => $rut[0],
            'rut_dv' => $request->rut_dv,
            'razon_social' => $request->razon_social,
        ]);
        
        Session::flash('message', "Proveedor creado exitosamente");
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
        $proveedor = Proveedor::where('idproveedores', '=', decrypt($id))->first();
        return view('adminlte::proveedores.edit', array('proveedor' => $proveedor));
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
        $proveedor = Proveedor::where('idproveedores', '=', decrypt($id))->first();
        $this->validator($request->all(), $proveedor, true)->validate();
        $rut = explode('-', $request->rut_dv);
        //$proveedor->idproveedores = decrypt($id);
        $proveedor->rut = $rut[0];
        $proveedor->rut_dv = $request->rut_dv;
        $proveedor->razon_social = $request->razon_social;  
        $proveedor->save();
        Session::flash('message', "Proveedor actualizado exitosamente");
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
