<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Cartera;
use DB;
use Auth;
use Excel;
/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    /*public function index()
    {
        return view('adminlte::home');
    }*/

    public function index(Request $request)
    {
        //$request->user()->authorizeRoles(['superadmin', 'admin', 'supervisor', 'agente']);
        $rol = Auth::user()->role->name;
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

        $cartera_seleccionada = $carteras_reg[0]->idcarteras;
        $marca_seleccionada = 'MARCA1';

       // DB::select('CALL FUNCION_DASHBOARD('.$cartera_seleccionada.')');

        $base = DB::table('base_dashboard')
                ->select(''.$marca_seleccionada.' AS MARCA',DB::raw('count(*) as casos, sum(OPERACIONES) as operaciones, sum(MONTO) as MONTO , Sum(GESTIONES) AS GESTIONES,SUM(IF(COMPROMISOS > 0,1,0)) AS COMPROMISOS,SUM(IF(TITULAR>0,1,0)) AS TITULAR,SUM(IF(TERCERO>0,1,0)) AS TERCEROS,SUM(IF(SIN_CONTACTO>0,1,0)) AS SIN_CONTACTO'))
                ->groupBy($marca_seleccionada)
                ->get();
    

        return view('adminlte::home',array('carteras' => $carteras,'base' => $base,'cartera_seleccionada' => $cartera_seleccionada, 'marca_seleccionada' => $marca_seleccionada));
    }

    public function cargar_dashboard(Request $request){
        $cartera_seleccionada = $request->cartera;
        $marca_seleccionada = $request->marcas;
        $rol = Auth::user()->role->name;
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

        //$cartera_seleccionada = $carteras_reg[0]->idcarteras;
        //$marca_seleccionada = 'MARCA1';

        DB::select('CALL FUNCION_DASHBOARD('.$cartera_seleccionada.')');

        $base = DB::table('base_dashboard')
                ->select(''.$marca_seleccionada.' AS MARCA',DB::raw('count(*) as casos, sum(OPERACIONES) as operaciones, sum(MONTO) as MONTO , Sum(GESTIONES) AS GESTIONES,SUM(IF(COMPROMISOS > 0,1,0)) AS COMPROMISOS,SUM(IF(TITULAR>0,1,0)) AS TITULAR,SUM(IF(TERCERO>0,1,0)) AS TERCEROS,SUM(IF(SIN_CONTACTO>0,1,0)) AS SIN_CONTACTO'))
                ->groupBy($marca_seleccionada)
                ->get();
    

        return view('adminlte::home',array('carteras' => $carteras,'base' => $base,'cartera_seleccionada' => $cartera_seleccionada,'marca_seleccionada'=>$marca_seleccionada));   
    }

    function exportar_dashboard($tipo,$marca,$valor_marca,$filtro){
        $query = "SELECT * FROM base_dashboard WHERE 1=1 ";
        if($tipo=='individual'){
            if($filtro == 'casos'){
                $query = $query."and ".$marca." = '".$valor_marca."' ";
            } elseif($filtro == 'operaciones'){
                $query = "SELECT DC.numero, DC.deuda,DC.fecha_emision,
                DC.fecha_vencimiento FROM documentos DC INNER JOIN base_dashboard BD ON
                        BD.IDDEUDORES = DC.deudores_iddeudores
                        WHERE BD.".$marca." = '".$valor_marca."' ";
            } elseif($filtro == 'gestiones'){
                $query = "SELECT  dd.rut_dv, ges.descripcion, r.respuesta, rd.detalle, g.fecha FROM deudores_gestiones g INNER JOIN base_dashboard BD ON
                        BD.IDDEUDORES = g.deudores_iddeudores
                        INNER JOIN deudores dd on dd.iddeudores = BD.IDDEUDORES 
                        INNER JOIN gestiones ges on ges.idgestiones = g.gestiones_idgestiones
                        INNER JOIN respuestas r on r.idrespuesta = g.respuestas_idrespuesta
                        INNER JOIN respuestas_detalles rd on rd.idrespuestas_detalles = g.idrespuestas_detalles
                        WHERE BD.".$marca." = '".$valor_marca."' and fecha >= DATE_FORMAT(DATE(CURDATE()),'%Y-%m-01')";
            } elseif($filtro == 'titular'){
                $query = $query."and ".$marca." = '".$valor_marca."' and TITULAR >0";
            } elseif($filtro == 'tercero'){
                $query = $query."and ".$marca." = '".$valor_marca."' and TERCERO >0";
            } elseif($filtro == 'tercero'){
                $query = $query."and ".$marca." = '".$valor_marca."' and TERCERO >0";
            } elseif($filtro == 'sin_contacto'){
                $query = $query."and ".$marca." = '".$valor_marca."' and SIN_CONTACTO > 0";
            } elseif($filtro == 'sin_gestion'){
                $query = $query."and ".$marca." = '".$valor_marca."' and TERCERO =0 and TITULAR = 0 AND SIN_CONTACTO = 0";
            }
        } else {
            if($filtro == 'operaciones'){
                $query = "SELECT DC.numero, DC.deuda,DC.fecha_emision,
                DC.fecha_vencimiento FROM documentos DC INNER JOIN base_dashboard BD ON
                        BD.IDDEUDORES = DC.deudores_iddeudores";
            } elseif($filtro == 'gestiones'){
                $query = "SELECT  dd.rut_dv, ges.descripcion, r.respuesta, rd.detalle, g.fecha FROM deudores_gestiones g INNER JOIN base_dashboard BD ON
                        BD.IDDEUDORES = g.deudores_iddeudores
                        INNER JOIN deudores dd on dd.iddeudores = BD.IDDEUDORES 
                        INNER JOIN gestiones ges on ges.idgestiones = g.gestiones_idgestiones
                        INNER JOIN respuestas r on r.idrespuesta = g.respuestas_idrespuesta
                        INNER JOIN respuestas_detalles rd on rd.idrespuestas_detalles = g.idrespuestas_detalles
                        WHERE fecha >= DATE_FORMAT(DATE(CURDATE()),'%Y-%m-01')";
            } elseif($filtro == 'titular'){
                $query = $query."and TITULAR >0";
            } elseif($filtro == 'tercero'){
                $query = $query."and TERCERO >0";
            } elseif($filtro == 'sin_contacto'){
                $query = $query."and SIN_CONTACTO > 0";
            } elseif($filtro == 'sin_gestion'){
                $query = $query."and TERCERO =0 and TITULAR = 0 AND SIN_CONTACTO = 0";
            }
        }
        $results = DB::select(DB::raw($query));
        $data = array(); 
        foreach ($results as $result) { 
                $data[] = (array)$result; 
        }
        #or first convert it and then change its properties using #an array syntax, it's up to you } Excel::create(....
        //print_r($data);die();
        Excel::create('dashboard', function ($excel) use ($data) {
            /** Creamos una hoja */
            $excel->sheet('Hoja Uno', function ($sheet) use ($data) {
                
                $sheet->with($data, null, 'A1', false, false);
            });
            /** Descargamos nuestro archivo pasandole la extensión deseada (xls, xlsx) */
        })->download('xlsx');
    }
    /*
    public function someAdminStuff(Request $request)
    {
        $request->user()->authorizeRoles(‘admin’);
        return view(‘some.view’);
    }
    */
}