<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
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
        $usuarios_correspondiente = Funciones::usuarios_correspondiente(Auth::id());
        $usuarios = User::whereIn('id', $usuarios_correspondiente)->get();
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

    protected function validator(array $data, $usuario = null, $update = null)
    {
        $messages = [
            'username.required' => 'El RUT es obligatorio',
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
            'created_by' => Auth::id(),
            'username' => $request->username,
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'status' => $request->status
        ]);

        if(isset($request->role)){
            $user->roles()->attach(Role::where('name', $request->role)->first());    
        }else{
            $user->roles()->attach(Role::where('name', 'agente')->first());
        }
        
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

        $this->validator($request->all(), $usuario, true)->validate();

        $usuario->username = $request->username;
        $usuario->name = $request->name;
        $usuario->lastname = $request->lastname;
        $usuario->email = $request->email;

        if($request->password != ""){
            $usuario->password = bcrypt($request->password);    
        }

        if(isset($request->role)){
            $usuario->roles()->sync(Role::where('name', $request->role)->first());    
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
