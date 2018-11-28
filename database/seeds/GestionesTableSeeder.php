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
        	array('codigo' => 'A01', 'descripcion' => 'ANALISIS', 'created_at' => date('Y-m-d')),
			array('codigo' => 'A02', 'descripcion' => 'ATENCION EN OFICINA', 'created_at' => date('Y-m-d')),
			array('codigo' => 'A03', 'descripcion' => 'ATENCION WEB EN LINEA', 'created_at' => date('Y-m-d')),
			array('codigo' => 'A04', 'descripcion' => 'BLOQUEO', 'created_at' => date('Y-m-d')),
			array('codigo' => 'A05', 'descripcion' => 'CARGA MASIVA', 'created_at' => date('Y-m-d')),
			array('codigo' => 'A06', 'descripcion' => 'CONSULTA', 'created_at' => date('Y-m-d')),
			array('codigo' => 'A07', 'descripcion' => 'DEUDOR LLAMA A OFICINA', 'created_at' => date('Y-m-d')),
			array('codigo' => 'A08', 'descripcion' => 'ENVIO CUPON DE PAGO', 'created_at' => date('Y-m-d')),
			array('codigo' => 'A09', 'descripcion' => 'ENVIO DE CARTA ', 'created_at' => date('Y-m-d')),
			array('codigo' => 'A10', 'descripcion' => 'ENVIO DE E-MAIL', 'created_at' => date('Y-m-d')),
			array('codigo' => 'A11', 'descripcion' => 'ENVIO DE E-MAIL MASIVO', 'created_at' => date('Y-m-d')),
			array('codigo' => 'A12', 'descripcion' => 'GESTION ADMINISTRATIVA', 'created_at' => date('Y-m-d')),
			array('codigo' => 'A13', 'descripcion' => 'GESTION CALLDETECTION', 'created_at' => date('Y-m-d')),
			array('codigo' => 'A14', 'descripcion' => 'GESTIÓN INUBICABLES', 'created_at' => date('Y-m-d')),
			array('codigo' => 'A15', 'descripcion' => 'LLAMADO COBRADOR PREDICTIVO', 'created_at' => date('Y-m-d')),
			array('codigo' => 'A16', 'descripcion' => 'LLAMADO IVR', 'created_at' => date('Y-m-d')),
			array('codigo' => 'A17', 'descripcion' => 'LLAMADO POR COBRADOR', 'created_at' => date('Y-m-d')),
			array('codigo' => 'A18', 'descripcion' => 'MENSAJE DE TEXTO SMS', 'created_at' => date('Y-m-d')),
			array('codigo' => 'A19', 'descripcion' => 'RECAUDACION DE PAGOS', 'created_at' => date('Y-m-d')),
			array('codigo' => 'A20', 'descripcion' => 'RECLAMO', 'created_at' => date('Y-m-d')),
			array('codigo' => 'A21', 'descripcion' => 'RESULTADO ENVÍO DE CARTA', 'created_at' => date('Y-m-d')),
			array('codigo' => 'A22', 'descripcion' => 'RETIRO DOMICILIARIO', 'created_at' => date('Y-m-d')),
			array('codigo' => 'A23', 'descripcion' => 'RETORNO PREDICTIVO', 'created_at' => date('Y-m-d')),
			array('codigo' => 'A24', 'descripcion' => 'RETIRADO DE GESTION', 'created_at' => date('Y-m-d')),
			array('codigo' => 'A25', 'descripcion' => 'SIN GESTION PROXIMA', 'created_at' => date('Y-m-d')),
			array('codigo' => 'A26', 'descripcion' => 'TELECOBRANZA', 'created_at' => date('Y-m-d')),
			array('codigo' => 'A27', 'descripcion' => 'VISITA TERRENO', 'created_at' => date('Y-m-d')),
        );

        foreach (array_chunk($array_records, 1000) as $records) {
              \DB::table('gestiones')->insert($records);
        }
    }
}
