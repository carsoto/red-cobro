<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Datatables;
use Response;
use Validator;
use Redirect;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();
        return view('adminlte::usuarios.index', compact('usuarios'));
    }

    public function list(){
        //return DataTables::of(User::query())->make(true);
        
        $usuarios = User::all();
        
        return Datatables::of($usuarios)
            ->addColumn('role', function ($usuario) {
                foreach ($usuario->roles as $role) {
                    return ucfirst($role->name);
                }
            })
            ->addColumn('action', function ($usuario) {
                return '<a href="'.route('usuarios.edit', encrypt($usuario->id)).'" data-id="'.encrypt($usuario->id).'" title="'.trans('app.edit_title').'" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                        <a href="#" data-id="'.encrypt($usuario->id).'" title="'.trans('app.delete_title').'" class="btn btn-danger btn-xs eliminar_usuario"><i class="fa fa-trash"></i></a>';
            })
            ->editColumn('id', '{{ encrypt($id) }}')
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuario = new User();
        $roles = Role::all()->pluck('name', 'id');
        $status = array('Activo' => 'Activo', 'Inactivo' => 'Inactivo');
        return view('adminlte::usuarios.create', array('usuario' => $usuario, 'roles' => $roles, 'status' => $status));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$validator = Validator::make($request->all(), User::rules());

        if($validator->fails()){
            Redirect::back()->with('message', 'Su formulario presenta errores')->withErrors($validator);
        }*/

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'status' => $request->status
        ]);

        $user->roles()->attach(Role::where('name', $request->role)->first());
        Session::flash('message', "Usuario creado exitosamente");
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
        $usuario = User::findOrFail(decrypt($id));
        $roles = Role::all()->pluck('name', 'id');
        $status = array('Activo' => 'Activo', 'Inactivo' => 'Inactivo');
        return view('adminlte::usuarios.edit', array('usuario' => $usuario, 'roles' => $roles, 'status' => $status));
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
        $usuario = User::findOrFail(decrypt($id));

        $usuario->name = $request->name;
        $usuario->email = $request->email;
        
        if($request->password != ""){
            $usuario->password = bcrypt($request->password);    
        }
        
        $usuario->status = $request->status;
        $usuario->save();
        $role = Role::where('name', $request->role)->first();
        $usuario->roles()->sync($role->id);
        Session::flash('message', "Usuario actualizado exitosamente");
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
        /*if(User::destroy(decrypt($id))){
            $status = 'success';
            $msg = 'El registro fue eliminado exitosamente!';
   
        } else {
            $status = 'failed';
            $msg = 'Disculpe, el registro no pudo ser eliminado!';
        }*/
        $usuario = User::findOrFail(decrypt($id));
        $usuario->status = 'Inactivo';
        if($usuario->save()){
            $status = 'success';
            $msg = 'El usuario fue deshabilitado exitosamente!';
   
        } else {
            $status = 'failed';
            $msg = 'Disculpe, el usuario no pudo ser deshabilitado!';
        }    
        return Response::json(array('status' => $status, 'msg' => $msg));
    }
}
