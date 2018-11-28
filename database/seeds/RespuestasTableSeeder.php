<?php

use Illuminate\Database\Seeder;

class RespuestasTableSeeder extends Seeder
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
			array('codigo' => 'B001', 'respuesta' => 'ABONANDO POR ARCHIVO DE POSTEO', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B002', 'respuesta' => 'ABONANDO POR CONVENIO', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B003', 'respuesta' => 'ABONO NO REBAJADO', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B004', 'respuesta' => 'ABONO O PAGO PARCIAL', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B005', 'respuesta' => 'ASIGNACIÓN A COBRADOR', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B006', 'respuesta' => 'BÚSQUEDA DE ANTECEDENTES', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B007', 'respuesta' => 'CASO REASIGNADO', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B008', 'respuesta' => 'CASO SIN FONO', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B009', 'respuesta' => 'DEUDOR CORTA LLAMADO', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B010', 'respuesta' => 'DEUDOR DICE QUE IRÁ A CLIENTE', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B011', 'respuesta' => 'DEUDOR NO PUEDE PAGAR', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B012', 'respuesta' => 'DEUDOR SOLICITA COPIA BOLETA O EST.CUENTA', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B013', 'respuesta' => 'DEUDOR SOLICITA QUE LO LLAMEN', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B014', 'respuesta' => 'DICE QUE COBRO NO CORRESPONDE', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B015', 'respuesta' => 'DICE QUE NO PAGARÁ', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B016', 'respuesta' => 'DICE QUE PAGARÁ', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B017', 'respuesta' => 'DICE QUE PAGÓ', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B018', 'respuesta' => 'DIRECCIÓN INCOMPLETA', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B019', 'respuesta' => 'DIRECCIÓN NO CORRESPONDE', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B020', 'respuesta' => 'EN GESTIÓN', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B021', 'respuesta' => 'ENVIO DE CARTA  OFICINA DE COBRO', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B022', 'respuesta' => 'ENVIO DE INFROMACIÓN A DEUDOR', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B023', 'respuesta' => 'ENVIO DE MAIL', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B024', 'respuesta' => 'ENVIO DE MENSAJE TEXTO', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B025', 'respuesta' => 'FALLECIDO', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B026', 'respuesta' => 'FONO FUERA DE SERVICIO', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B027', 'respuesta' => 'FONO NO CORRESPONDE A DEUDOR', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B028', 'respuesta' => 'FUERA DE ÁREA', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B029', 'respuesta' => 'GESTIÓN IVR, EXITOSA', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B030', 'respuesta' => 'GESTIÓN IVR, SIN CONTACTO', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B031', 'respuesta' => 'HOSTIGAMIENTO', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B032', 'respuesta' => 'INFORME DE CARTAS', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B033', 'respuesta' => 'INGRESA RECLAMO POR WEB', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B034', 'respuesta' => 'INGRESO CLIENTE POR ARCHIVO', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B035', 'respuesta' => 'INUBICABLE', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B036', 'respuesta' => 'LUGAR INACCESIBLE', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B037', 'respuesta' => 'MENSAJE', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B038', 'respuesta' => 'NADIE EN DOMICILIO', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B039', 'respuesta' => 'NO CONTESTA', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B040', 'respuesta' => 'NO CUMPLE ABONO', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B041', 'respuesta' => 'NOTIFICACIÓN BAJO PUERTA', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B042', 'respuesta' => 'NOTIFICACIÓN CON DEUDOR O TERCERO', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B043', 'respuesta' => 'NOTIFICACIÓN CON TERCERO', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B044', 'respuesta' => 'NOTIFICACIÓN CON TITULAR SIN ACUERDO', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B045', 'respuesta' => 'PAGO NO INGRESADO', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B046', 'respuesta' => 'PAGO TOTAL', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B047', 'respuesta' => 'PROBLEMA SIN SOLUCIÓN DERIVADO A CLIENTE', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B048', 'respuesta' => 'RECLAMO', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B049', 'respuesta' => 'REHUSADO', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B050', 'respuesta' => 'RETIRADO DE COBRANZA', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B051', 'respuesta' => 'RETIRO CONCRETADO', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B052', 'respuesta' => 'RETIRO NO CONCRETADO', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B053', 'respuesta' => 'REVERSA DE PAGO CLIENTE', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B054', 'respuesta' => 'SE RECOMIENDA JUDICIAL', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B055', 'respuesta' => 'SOLUCIÓN CLIENTE', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B056', 'respuesta' => 'TERMINADO CON CONVENIO', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B057', 'respuesta' => 'TERMINADO POR ARCHIVO DE POSTEO', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B058', 'respuesta' => 'VERIFICACIÓN DE DIRECCIÓN', 'created_at' => date('Y-m-d')),
			array('codigo' => 'B059', 'respuesta' => 'VISITA NO CONCRETADA', 'created_at' => date('Y-m-d')),


        );

        foreach (array_chunk($array_records, 1000) as $records) {
              \DB::table('respuestas')->insert($records);
        }
    }
}
