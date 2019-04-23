<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\User;
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

    public static function revisar_saldo($numero, $rut_dv){
        $saldos = DB::select(DB::raw("SELECT d.iddocumentos, de.iddeudores, d.deuda, SUM(p.monto) AS pagos, d.deuda - SUM(p.monto) AS pendiente
                                        FROM
                                            deudores de, documentos d, deudores_documentos dd, pagos p
                                        WHERE
                                            d.numero = ".$numero."
                                        AND de.rut_dv = '".$rut_dv."'
                                        AND dd.iddocumentos = d.iddocumentos
                                        AND dd.iddeudores = de.iddeudores
                                        AND p.rut = de.rut_dv GROUP BY d.iddocumentos"));
        if(count($saldos) > 0){
            $saldos = $saldos[0];
        }
        return $saldos;
    }

    function carteras(){
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
    }

    /*public static function carteras(){
        if(Auth::user()->hasRole('superadmin')){
            $carteras = Cartera::pluck('descripcion', 'idcarteras');
        }else{
            //$carteras = Cartera::where('iduser', '=', Auth::id())->pluck('descripcion', 'idcarteras');
            $carteras    
        }
        
        return $carteras;
    }

    public static function usuario_gestores_carteras(){
        $ugc = DB::select(DB::raw("SELECT GROUP_CONCAT(c.idcarteras) AS id FROM carteras c, users_gestores_carteras gc WHERE gc.users_id = ".Auth::id()." AND gc.carteras_idcarteras = c.idcarteras"));
        return $ugc[0]->id;
    }*/
}
