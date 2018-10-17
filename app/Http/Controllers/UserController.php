<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Datatables;
use Response;

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
                return '<a href="#" data-id="'.encrypt($usuario->id).'" title="'.trans('app.edit_title').'" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
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
        return view('adminlte::usuarios.create');
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
        if(User::destroy(decrypt($id))){
            $status = 'success';
            $msg = 'El registro fue eliminado exitosamente!';
   
        } else {
            $status = 'failed';
            $msg = 'Disculpe, el registro no pudo ser eliminado!';
        }
                
        return Response::json(array('status' => $status, 'msg' => $msg));
    }
}
