<?php

use Illuminate\Database\Seeder;

class GestionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	set_time_limit(0);

        $array_records = array (
        	array('carteras_idcarteras' => 1, 'codigo' => 'A1',  'descripcion' => 'ANÁLISIS', 'created_at' => date('Y-m-d')),
			array('carteras_idcarteras' => 1, 'codigo' => 'A2',  'descripcion' => 'ATENCIÓN EN OFICINA', 'created_at' => date('Y-m-d')),
			array('carteras_idcarteras' => 1, 'codigo' => 'A3',  'descripcion' => 'ATENCIÓN WEB EN LINEA', 'created_at' => date('Y-m-d')),
			array('carteras_idcarteras' => 1, 'codigo' => 'A4',  'descripcion' => 'BLOQUEO', 'created_at' => date('Y-m-d')),
			array('carteras_idcarteras' => 1, 'codigo' => 'A5',  'descripcion' => 'CARGA MASIVA', 'created_at' => date('Y-m-d')),
			array('carteras_idcarteras' => 1, 'codigo' => 'A6',  'descripcion' => 'CONSULTA', 'created_at' => date('Y-m-d')),
			array('carteras_idcarteras' => 1, 'codigo' => 'A7',  'descripcion' => 'DEUDOR LLAMA A OFICINA', 'created_at' => date('Y-m-d')),
			array('carteras_idcarteras' => 1, 'codigo' => 'A8',  'descripcion' => 'ENVÍO CUPÓN DE PAGO', 'created_at' => date('Y-m-d')),
			array('carteras_idcarteras' => 1, 'codigo' => 'A9',  'descripcion' => 'ENVÍO DE CARTA ', 'created_at' => date('Y-m-d')),
			array('carteras_idcarteras' => 1, 'codigo' => 'A10', 'descripcion' => 'ENVÍO DE E-MAIL', 'created_at' => date('Y-m-d')),
			array('carteras_idcarteras' => 1, 'codigo' => 'A11', 'descripcion' => 'ENVÍO DE E-MAIL MASIVO', 'created_at' => date('Y-m-d')),
			array('carteras_idcarteras' => 1, 'codigo' => 'A12', 'descripcion' => 'GESTIÓN ADMINISTRATIVA', 'created_at' => date('Y-m-d')),
			array('carteras_idcarteras' => 1, 'codigo' => 'A13', 'descripcion' => 'GESTIÓN CALLDETECTION', 'created_at' => date('Y-m-d')),
			array('carteras_idcarteras' => 1, 'codigo' => 'A14', 'descripcion' => 'GESTIÓN INUBICABLES', 'created_at' => date('Y-m-d')),
			array('carteras_idcarteras' => 1, 'codigo' => 'A15', 'descripcion' => 'LLAMADO COBRADOR PREDICTIVO', 'created_at' => date('Y-m-d')),
			array('carteras_idcarteras' => 1, 'codigo' => 'A16', 'descripcion' => 'LLAMADO IVR', 'created_at' => date('Y-m-d')),
			array('carteras_idcarteras' => 1, 'codigo' => 'A17', 'descripcion' => 'LLAMADO POR COBRADOR', 'created_at' => date('Y-m-d')),
			array('carteras_idcarteras' => 1, 'codigo' => 'A18', 'descripcion' => 'MENSAJE DE TEXTO SMS', 'created_at' => date('Y-m-d')),
			array('carteras_idcarteras' => 1, 'codigo' => 'A19', 'descripcion' => 'RECAUDACIÓN DE PAGOS', 'created_at' => date('Y-m-d')),
			array('carteras_idcarteras' => 1, 'codigo' => 'A20', 'descripcion' => 'RECLAMO', 'created_at' => date('Y-m-d')),
			array('carteras_idcarteras' => 1, 'codigo' => 'A21', 'descripcion' => 'RESULTADO ENVÍO DE CARTA', 'created_at' => date('Y-m-d')),
			array('carteras_idcarteras' => 1, 'codigo' => 'A22', 'descripcion' => 'RETIRO DOMICILIARIO', 'created_at' => date('Y-m-d')),
			array('carteras_idcarteras' => 1, 'codigo' => 'A23', 'descripcion' => 'RETORNO PREDICTIVO', 'created_at' => date('Y-m-d')),
			array('carteras_idcarteras' => 1, 'codigo' => 'A24', 'descripcion' => 'RETIRADO DE GESTIÓN', 'created_at' => date('Y-m-d')),
			array('carteras_idcarteras' => 1, 'codigo' => 'A25', 'descripcion' => 'SIN GESTIÓN PRÓXIMA', 'created_at' => date('Y-m-d')),
			array('carteras_idcarteras' => 1, 'codigo' => 'A26', 'descripcion' => 'TELECOBRANZA', 'created_at' => date('Y-m-d')),
			array('carteras_idcarteras' => 1, 'codigo' => 'A27', 'descripcion' => 'VISITA TERRENO', 'created_at' => date('Y-m-d')),
        );

        foreach (array_chunk($array_records, 1000) as $records) {
        	\DB::table('gestiones')->insert($records);
        }
    }
}
