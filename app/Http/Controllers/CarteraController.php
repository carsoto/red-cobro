<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Datatables;
use App\Cartera;
use Validator;
use Session;
use Redirect;
use Funciones;
use Auth;

class CarteraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adminlte::carteras.index');
    }

    public function list(){
        
        $carteras = Cartera::all();
        
        return Datatables::of($carteras)
            ->addColumn('status', function ($cartera) {
                if($cartera->status){
                    $estado = "Activa";
                }else{
                    $estado = "Inactiva";
                }
                return $estado;
            })
            ->addColumn('action', function ($cartera) {
                //<a href="#" data-id="'.encrypt($cartera->idcarteras).'" title="'.trans('app.delete_title').'" class="btn btn-danger btn-xs eliminar_cartera"><i class="fa fa-trash"></i></a>
                return '<a href="'.route('carteras.edit', encrypt($cartera->idcarteras)).'" data-id="'.encrypt($cartera->idcarteras).'" title="'.trans('app.edit_title').'" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>';
            })
            ->editColumn('idcarteras', '{{ encrypt($idcarteras) }}')
            ->make(true);
    }

    protected function validator(array $data, $cartera = null, $update = null)
    {
        $messages = [
            'nombre.required' => 'El nombre de la cartera es obligatorio',
            'nombre.unique' => 'La cartera ya se encuentra registrada',
        ];

        if($update){
            $rules = [
                'nombre' => ['required', 'max:45', 'unique:carteras,nombre,'.$cartera->idcarteras.',idcarteras',],
            ];
        }else{
            $rules = [
                'nombre' => ['required', 'max:45', 'unique:carteras'],
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
        $cartera = new Cartera();

        return view('adminlte::carteras.create', array('cartera' => $cartera));
    }

    /*public function crearcartera(Request $request){
        if($request->cartera != ''){
            $desc_cartera = strtoupper($request->cartera);
            
            $cartera = Cartera::firstOrCreate(['descripcion' => $desc_cartera], [
                'descripcion' => $desc_cartera,
            ]);

            //$cartera->carteras()->sync($cartera->idcarteras, false);
            
            Session::flash('message', "Cartera creada exitosamente");
        }else{
            Session::flash('message-error', "Cartera no puede estar en blanco");
        }

        return Redirect::back();
    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();

        Cartera::create([
            'nombre' => $request->nombre,
            'status' => 1
        ]);
        
        Session::flash('message', "Cartera creado exitosamente");
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
        $cartera = Cartera::where('idcarteras', '=', decrypt($id))->first();
        $cartera_selected = 0;
        $cartera_clientes = array();
        
        return view('adminlte::carteras.edit', array('cartera' => $cartera, 'cartera_selected' => $cartera_selected, 'cartera_clientes' => $cartera_clientes));
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
        $cartera = Cartera::where('idcarteras', '=', decrypt($id))->first();
        $this->validator($request->all(), $cartera, true)->validate();
        $cartera->nombre = $request->nombre;
        $cartera->status = 1;
        $cartera->save();
        Session::flash('message', "Cartera actualizado exitosamente");
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
