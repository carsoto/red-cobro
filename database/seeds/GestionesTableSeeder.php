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
        	array('codigo' => 'A01', 'descripcion' => 'ANALISIS'),
			array('codigo' => 'A02', 'descripcion' => 'ATENCION EN OFICINA'),
			array('codigo' => 'A03', 'descripcion' => 'ATENCION WEB EN LINEA'),
			array('codigo' => 'A04', 'descripcion' => 'BLOQUEO'),
			array('codigo' => 'A05', 'descripcion' => 'CARGA MASIVA'),
			array('codigo' => 'A06', 'descripcion' => 'CONSULTA'),
			array('codigo' => 'A07', 'descripcion' => 'DEUDOR LLAMA A OFICINA'),
			array('codigo' => 'A08', 'descripcion' => 'ENVIO CUPON DE PAGO'),
			array('codigo' => 'A09', 'descripcion' => 'ENVIO DE CARTA '),
			array('codigo' => 'A10', 'descripcion' => 'ENVIO DE E-MAIL'),
			array('codigo' => 'A11', 'descripcion' => 'ENVIO DE E-MAIL MASIVO'),
			array('codigo' => 'A12', 'descripcion' => 'GESTION ADMINISTRATIVA'),
			array('codigo' => 'A13', 'descripcion' => 'GESTION CALLDETECTION'),
			array('codigo' => 'A14', 'descripcion' => 'GESTIÓN INUBICABLES'),
			array('codigo' => 'A15', 'descripcion' => 'LLAMADO COBRADOR PREDICTIVO'),
			array('codigo' => 'A16', 'descripcion' => 'LLAMADO IVR'),
			array('codigo' => 'A17', 'descripcion' => 'LLAMADO POR COBRADOR'),
			array('codigo' => 'A18', 'descripcion' => 'MENSAJE DE TEXTO SMS'),
			array('codigo' => 'A19', 'descripcion' => 'RECAUDACION DE PAGOS'),
			array('codigo' => 'A20', 'descripcion' => 'RECLAMO'),
			array('codigo' => 'A21', 'descripcion' => 'RESULTADO ENVÍO DE CARTA'),
			array('codigo' => 'A24', 'descripcion' => 'RETIRADO DE GESTION'),
			array('codigo' => 'A22', 'descripcion' => 'RETIRO DOMICILIARIO'),
			array('codigo' => 'A23', 'descripcion' => 'RETORNO PREDICTIVO'),
			array('codigo' => 'A25', 'descripcion' => 'SIN GESTION PROXIMA'),
			array('codigo' => 'A26', 'descripcion' => 'TELECOBRANZA'),
			array('codigo' => 'A27', 'descripcion' => 'VISITA TERRENO'),
        );

        foreach (array_chunk($array_records, 1000) as $records) {
              \DB::table('gestiones')->insert($records);
        }
    }
}
