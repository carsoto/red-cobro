<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Gestor;
use Auth;
use Datatables;
use Response;
use Validator;
use Redirect;
use Session;
use Funciones;

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
        $usuarios = Funciones::usuarios_herederos(Auth::id());

        return Datatables::of($usuarios)
            ->addColumn('role', function ($usuario) {
                return ucfirst($usuario->role->name);
            })
            ->addColumn('status', function ($usuario) {
                if($usuario->status){
                    return 'Activo';
                }else{
                    return 'Inactivo';
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
        $status = array(1 => 'Activo', 0 => 'Inactivo');
        $gestores = Gestor::all()->pluck('razon_social', 'idgestores');
        return view('adminlte::usuarios.create', array('usuario' => $usuario, 'roles' => $roles, 'status' => $status, 'gestores' => $gestores));
    }

    protected function validator(array $data, $usuario = null, $update = null)
    {
        
        $messages = [
            'username.required' => 'El RUT es obligatorio',
            'role.required' => 'El perfil es obligatorio',
            'username.max' => 'El RUT no puede tener más de 11 caracteres',
            'username.regex' => 'No es un RUT válido',
            'username.unique' => 'El RUT ya se encuentra registrado',
            'name.required' => 'El nombre es obligatorio',
            'lastname.required' => 'El apellido es obligatorio',
            'email.required' => 'El correo electrónico es obligatorio',
            'email.unique' => 'El correo electrónico ya se encuentra registrado',
            'password.required' => 'La contraseña es obligatoria',
            'password.min' => 'La contraseña debe contener al menos 6 caracteres',
            'password.confirmed' => 'Las contraseñas no coinciden',

        ];

        if($update){
            $rules = [
                'username' => ['required', 'max:11', 'unique:users,username,'.$usuario->id, 'regex:/^(\d{7,9}-)([a-zA-Z]{1}$|\d{1}$)/'],
                'name' => 'required|max:255',
                'lastname' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users,email,'.$usuario->id,
                'password' => '',
            ];
        }else{
            $rules = [
                'username' => ['required', 'max:11', 'unique:users', 'regex:/^(\d{7,9}-)([a-zA-Z]{1}$|\d{1}$)/'],
                'name' => 'required|max:255',
                'lastname' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6|confirmed',
                'role' => 'required',
            ];
        }
        return Validator::make($data, $rules, $messages);
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

        $user = User::create([
            'roles_id' => $request->role,
            'idgestores' => $request->gestor ,
            'username' => $request->username,
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'creado_por' => Auth::id(),
            'status' => $request->status,
            'password' => bcrypt($request->password),
        ]);

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
        $gestores = Gestor::all()->pluck('razon_social', 'idgestores');
        $status = array(1 => 'Activo', 0 => 'Inactivo');
        return view('adminlte::usuarios.edit', array('usuario' => $usuario, 'roles' => $roles, 'status' => $status, 'gestores' => $gestores));
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

        $this->validator($request->all(), $usuario, true)->validate();
        
        $usuario->username = $request->username;
        $usuario->name = $request->name;
        $usuario->lastname = $request->lastname;
        $usuario->email = $request->email;

        if(($request->password != "") || ($request->password != NULL)){
            $usuario->password = bcrypt($request->password);    
        }

        if(isset($request->role)){
            $usuario->roles_id = $request->role;
        }

        if(isset($request->gestor)){
            $usuario->idgestores = $request->gestor;
        }

        $usuario->status = $request->status;
        
        $usuario->save();
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
        $usuario = User::findOrFail(decrypt($id));
        $usuario->status = 0;
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
