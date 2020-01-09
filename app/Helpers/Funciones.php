<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Deudor;
use DB;

class Funciones{

    public static function usuarios_correspondiente($id_logueado){
        $usuarios_recursivos = "";
        $usuarios = User::where('created_by', '=', $id_logueado)->pluck('id')->toArray();
        $usuarios_recursivos = implode(",", $usuarios);

        while(count($usuarios) > 0){
            $usuarios = User::whereIn('created_by', $usuarios)->pluck('id')->toArray();
            $e = implode(",", $usuarios);
            if($e != ""){
                $usuarios_recursivos = $usuarios_recursivos.",".$e;
            }
        }
        return explode(",", $usuarios_recursivos);
    }

	public static function formatear_fecha($str_fecha){
        $anyo = substr($str_fecha, 0, 4);
        $mes = substr($str_fecha, 4, 2);
        $dia = substr($str_fecha, 6, 2);
        $fecha = $anyo.'-'.$mes.'-'.$dia;
        return $fecha;
	}

	public static function formatearRut($rut_sin_formato) {

        if (strpos($rut_sin_formato, '-') !== false ) {
            $rut_sin_formato = str_replace(' ', '', $rut_sin_formato);
            $procesar_rut = explode('-', $rut_sin_formato);
            $numero = number_format($procesar_rut[0], 0, ',', '.');
            $dverificador = strtoupper($procesar_rut[1]);

            return $numero . '-' . $dverificador;
        }

        return number_format($rut_sin_formato, 0, ',', '.');
    }

    public static function rut_sin_dv($rut_sin_formato) {

        if (strpos($rut_sin_formato, '-') !== false ) {
            $procesar_rut = explode('-', $rut_sin_formato);
            $numero = $procesar_rut[0];

            return $numero;
        }
    }

    public static function calcular_dias_mora($fecha_vencimiento, $fecha_actual){
        $fechaVencimiento = Carbon::parse($fecha_vencimiento);
        $fechaActual = Carbon::parse($fecha_actual);

        $diasDiferencia = $fechaActual->diffInDays($fechaVencimiento);
        return $diasDiferencia;
    }

    public static function nombre_completo_usuario(){
        $nombre = explode(' ', Auth::user()->name);
        $apellido = explode(' ', Auth::user()->lastname);
        $nombre_completo = $nombre[0].' '.$apellido[0];
        return $nombre_completo;
    }

    public static function revisar_saldo($cartera, $numero, $rut_dv){
        $sql = "SELECT d.iddocumentos, de.iddeudores, d.deuda, SUM(p.monto) AS pagos, d.deuda - SUM(p.monto) AS pendiente
                FROM
                    deudores de, documentos d, pagos p
                WHERE 
                    de.carteras_idcarteras = ".$cartera."
                AND d.numero = ".$numero."
                AND de.rut_dv = '".$rut_dv."'
                AND de.carteras_idcarteras = p.carteras_idcarteras
                AND p.rut = de.rut_dv GROUP BY d.iddocumentos";
        $saldos = DB::select(DB::raw($sql));
        
        /*$saldos = DB::select(DB::raw("SELECT d.iddocumentos, de.iddeudores, d.deuda, SUM(p.monto) AS pagos, d.deuda - SUM(p.monto) AS pendiente
                                        FROM
                                            deudores de, documentos d, deudores_documentos dd, pagos p
                                        WHERE
                                            d.numero = ".$numero."
                                        AND de.rut_dv = '".$rut_dv."'
                                        AND dd.iddocumentos = d.iddocumentos
                                        AND dd.iddeudores = de.iddeudores
                                        AND p.rut = de.rut_dv GROUP BY d.iddocumentos"));*/
        if(count($saldos) > 0){
            $saldos = $saldos[0];
        }
        return $saldos;
    }

    /*function carteras(){
        $rol = Auth::user()->role->name;
        print_r($rol);die();
        if($rol == 'agente' || $rol == 'supervisor') {
            $carteras_reg = DB::table('carteras')
                    ->join('users_carteras', 'carteras.idcarteras', '=', 'users_carteras.carteras_idcarteras')
                    ->where('users_carteras.users_id','=',Auth::user()->id)
                    ->where('users_carteras.status','=',1)
                    ->select('carteras.idcarteras', 'carteras.nombre')
                    ->get();
        } elseif($rol == 'admin'){
            //$idgestor = Auth::user()->gestor->idgestores;
            $idgestor = 1;
            $carteras_reg = DB::table('carteras')
                    ->where('carteras.idgestores','=',$idgestor)
                    ->where('carteras.status','=',1)
                    ->select('carteras.idcarteras', 'carteras.nombre')
                    ->get();
        } else {
            $carteras_reg = DB::table('carteras')
                    ->where('carteras.status','=',1)
                    ->select('carteras.idcarteras', 'carteras.nombre')
                    ->get();
        }
        $carteras = array();
       
        foreach ($carteras_reg as $key => $g) {
            $carteras[$g->idcarteras] = $g->nombre;
        }
        return $carteras;
    }*/

    public static function usuarios_herederos($id_usuario){
        $usarios_ids = $id_usuario;
        $user_search = "";
        $users = array();
        
        if(Auth::user()->hasRole('superadmin')){
            $users = User::all();
        }else if(Auth::user()->hasRole('admin')){
            do{
                $ids_usarios = DB::select(DB::raw("SELECT GROUP_CONCAT(id) AS id FROM users WHERE creado_por IN(".$usarios_ids.")"));    
                
                if($ids_usarios){
                    $usarios_ids = $ids_usarios[0]->id;
                    if($usarios_ids != ""){
                        $user_search .= $usarios_ids.","; 
                    }
                }
            }while($usarios_ids != "");

            if($user_search != ""){
                $users = User::whereIn('id', explode(",", $user_search))->get();
            }
        }
        return $users;
    }

    public static function carteras($rol, $user_id, $idgestor){
        if($rol == 'agente' || $rol == 'supervisor') {
            $carteras_reg = DB::table('carteras')
                    ->join('users_carteras', 'carteras.idcarteras', '=', 'users_carteras.carteras_idcarteras')
                    ->where('users_carteras.users_id','=', $user_id)
                    ->where('users_carteras.status','=', 1)
                    ->select('carteras.idcarteras', 'carteras.nombre')
                    ->get();
        } elseif($rol == 'admin'){
            if(($idgestor != null) || ($idgestor != "")){
                $carteras_reg = DB::table('carteras')
                    ->where('carteras.idgestores','=',$idgestor)
                    ->where('carteras.status','=', 1)
                    ->select('carteras.idcarteras', 'carteras.nombre')
                    ->get();
            }
        } else {
            $carteras_reg = DB::table('carteras')
                    ->where('carteras.status','=', 1)
                    ->select('carteras.idcarteras', 'carteras.nombre')
                    ->get();
        }
        
        $carteras = array();
       
        foreach ($carteras_reg as $key => $g) {
            $carteras[$g->idcarteras] = $g->nombre;
        }
        
        return array('carteras' => $carteras, 'carteras_reg' => $carteras_reg);
    }

    public static function identificar_contacto($id_deudor, $contacto){
        $deudor = Deudor::find($id_deudor);
        $datos_contacto = [];

        foreach ($deudor->telefonos as $key => $t) {
            if($t->telefono == $contacto){
                $datos_contacto['id'] = $t->idtelefonos;
                $datos_contacto['tipo'] = 'telefono';
                $datos_contacto['contacto'] = $contacto;
            }
        }

        if(empty($datos_contacto)){
            foreach ($deudor->correos as $key => $c) {
                if($c->correo == $contacto){
                    $datos_contacto['id'] = $c->idcorreos_electronicos;
                    $datos_contacto['tipo'] = 'correo';
                    $datos_contacto['contacto'] = $contacto;   
                }
            }
        }
        return $datos_contacto;
    }
    /*public static function usuario_gestores_carteras(){
        $ugc = DB::select(DB::raw("SELECT GROUP_CONCAT(c.idcarteras) AS id FROM carteras c, users_gestores_carteras gc WHERE gc.users_id = ".Auth::id()." AND gc.carteras_idcarteras = c.idcarteras"));
        return $ugc[0]->id;
    }*/
}
