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
        	array('gestiones_idgestiones' => 1, 'codigo' => 'B003', 'respuesta' => 'ABONO NO REBAJADO', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 1, 'codigo' => 'B009', 'respuesta' => 'DEUDOR CORTA LLAMADO', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 1, 'codigo' => 'B010', 'respuesta' => 'DEUDOR DICE QUE IRÁ A CLIENTE', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 1, 'codigo' => 'B011', 'respuesta' => 'DEUDOR NO PUEDE PAGAR', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 1, 'codigo' => 'B014', 'respuesta' => 'DICE QUE COBRO NO CORRESPONDE', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 1, 'codigo' => 'B015', 'respuesta' => 'DICE QUE NO PAGARÁ', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 1, 'codigo' => 'B016', 'respuesta' => 'DICE QUE PAGARÁ', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 1, 'codigo' => 'B017', 'respuesta' => 'DICE QUE PAGÓ', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 1, 'codigo' => 'B026', 'respuesta' => 'FONO FUERA DE SERVICIO', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 1, 'codigo' => 'B040', 'respuesta' => 'NO CUMPLE ABONO', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 1, 'codigo' => 'B054', 'respuesta' => 'SE RECOMIENDA JUDICIAL', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 1, 'codigo' => 'B057', 'respuesta' => 'TERMINADO POR ARCHIVO DE POSTEO', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 2, 'codigo' => 'B003', 'respuesta' => 'ABONO NO REBAJADO', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 2, 'codigo' => 'B005', 'respuesta' => 'ASIGNACIÓN A COBRADOR', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 2, 'codigo' => 'B045', 'respuesta' => 'PAGO NO INGRESADO', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 2, 'codigo' => 'B047', 'respuesta' => 'PROBLEMA SIN SOLUCIÓN DERIVADO A CLIENTE', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 3, 'codigo' => 'B033', 'respuesta' => 'INGRESA RECLAMO POR WEB', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 5, 'codigo' => 'B001', 'respuesta' => 'ABONANDO POR ARCHIVO DE POSTEO', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 5, 'codigo' => 'B002', 'respuesta' => 'ABONANDO POR CONVENIO', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 5, 'codigo' => 'B005', 'respuesta' => 'ASIGNACIÓN A COBRADOR', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 5, 'codigo' => 'B007', 'respuesta' => 'CASO REASIGNADO', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 5, 'codigo' => 'B008', 'respuesta' => 'CASO SIN FONO', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 5, 'codigo' => 'B020', 'respuesta' => 'EN GESTIÓN', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 5, 'codigo' => 'B034', 'respuesta' => 'INGRESO CLIENTE POR ARCHIVO', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 5, 'codigo' => 'B040', 'respuesta' => 'NO CUMPLE ABONO', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 5, 'codigo' => 'B053', 'respuesta' => 'REVERSA DE PAGO CLIENTE', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 5, 'codigo' => 'B056', 'respuesta' => 'TERMINADO CON CONVENIO', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 5, 'codigo' => 'B057', 'respuesta' => 'TERMINADO POR ARCHIVO DE POSTEO', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 7, 'codigo' => 'B009', 'respuesta' => 'DEUDOR CORTA LLAMADO', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 7, 'codigo' => 'B012', 'respuesta' => 'DEUDOR SOLICITA COPIA BOLETA O EST.CUENTA', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 7, 'codigo' => 'B013', 'respuesta' => 'DEUDOR SOLICITA QUE LO LLAMEN', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 7, 'codigo' => 'B014', 'respuesta' => 'DICE QUE COBRO NO CORRESPONDE', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 7, 'codigo' => 'B015', 'respuesta' => 'DICE QUE NO PAGARÁ', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 7, 'codigo' => 'B016', 'respuesta' => 'DICE QUE PAGARÁ', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 7, 'codigo' => 'B017', 'respuesta' => 'DICE QUE PAGÓ', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 7, 'codigo' => 'B026', 'respuesta' => 'FONO FUERA DE SERVICIO', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 7, 'codigo' => 'B027', 'respuesta' => 'FONO NO CORRESPONDE A DEUDOR', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 7, 'codigo' => 'B039', 'respuesta' => 'NO CONTESTA', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 7, 'codigo' => 'B054', 'respuesta' => 'SE RECOMIENDA JUDICIAL', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 8, 'codigo' => 'B016', 'respuesta' => 'DICE QUE PAGARÁ', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 9, 'codigo' => 'B016', 'respuesta' => 'DICE QUE PAGARÁ', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 9, 'codigo' => 'B021', 'respuesta' => 'ENVIO DE CARTA  OFICINA DE COBRO', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 10, 'codigo' => 'B017', 'respuesta' => 'DICE QUE PAGÓ', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 10, 'codigo' => 'B023', 'respuesta' => 'ENVIO DE MAIL', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 11, 'codigo' => 'B004', 'respuesta' => 'ABONO O PAGO PARCIAL', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 11, 'codigo' => 'B023', 'respuesta' => 'ENVIO DE MAIL', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 12, 'codigo' => 'B017', 'respuesta' => 'DICE QUE PAGÓ', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 12, 'codigo' => 'B022', 'respuesta' => 'ENVIO DE INFROMACIÓN A DEUDOR', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 12, 'codigo' => 'B047', 'respuesta' => 'PROBLEMA SIN SOLUCIÓN DERIVADO A CLIENTE', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 12, 'codigo' => 'B055', 'respuesta' => 'SOLUCIÓN CLIENTE', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 14, 'codigo' => 'B006', 'respuesta' => 'BÚSQUEDA DE ANTECEDENTES', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 15, 'codigo' => 'B009', 'respuesta' => 'DEUDOR CORTA LLAMADO', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 15, 'codigo' => 'B012', 'respuesta' => 'DEUDOR SOLICITA COPIA BOLETA O EST.CUENTA', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 15, 'codigo' => 'B013', 'respuesta' => 'DEUDOR SOLICITA QUE LO LLAMEN', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 15, 'codigo' => 'B014', 'respuesta' => 'DICE QUE COBRO NO CORRESPONDE', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 15, 'codigo' => 'B015', 'respuesta' => 'DICE QUE NO PAGARÁ', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 15, 'codigo' => 'B016', 'respuesta' => 'DICE QUE PAGARÁ', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 15, 'codigo' => 'B017', 'respuesta' => 'DICE QUE PAGÓ', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 15, 'codigo' => 'B026', 'respuesta' => 'FONO FUERA DE SERVICIO', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 15, 'codigo' => 'B027', 'respuesta' => 'FONO NO CORRESPONDE A DEUDOR', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 15, 'codigo' => 'B039', 'respuesta' => 'NO CONTESTA', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 15, 'codigo' => 'B054', 'respuesta' => 'SE RECOMIENDA JUDICIAL', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 16, 'codigo' => 'B009', 'respuesta' => 'DEUDOR CORTA LLAMADO', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 16, 'codigo' => 'B029', 'respuesta' => 'GESTIÓN IVR, EXITOSA', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 16, 'codigo' => 'B030', 'respuesta' => 'GESTIÓN IVR, SIN CONTACTO', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 17, 'codigo' => 'B010', 'respuesta' => 'DEUDOR DICE QUE IRÁ A CLIENTE', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 17, 'codigo' => 'B012', 'respuesta' => 'DEUDOR SOLICITA COPIA BOLETA O EST.CUENTA', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 17, 'codigo' => 'B013', 'respuesta' => 'DEUDOR SOLICITA QUE LO LLAMEN', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 17, 'codigo' => 'B014', 'respuesta' => 'DICE QUE COBRO NO CORRESPONDE', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 17, 'codigo' => 'B015', 'respuesta' => 'DICE QUE NO PAGARÁ', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 17, 'codigo' => 'B016', 'respuesta' => 'DICE QUE PAGARÁ', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 17, 'codigo' => 'B017', 'respuesta' => 'DICE QUE PAGÓ', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 17, 'codigo' => 'B026', 'respuesta' => 'FONO FUERA DE SERVICIO', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 17, 'codigo' => 'B027', 'respuesta' => 'FONO NO CORRESPONDE A DEUDOR', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 17, 'codigo' => 'B039', 'respuesta' => 'NO CONTESTA', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 17, 'codigo' => 'B054', 'respuesta' => 'SE RECOMIENDA JUDICIAL', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 18, 'codigo' => 'B024', 'respuesta' => 'ENVIO DE MENSAJE TEXTO', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 19, 'codigo' => 'B046', 'respuesta' => 'PAGO TOTAL', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 20, 'codigo' => 'B031', 'respuesta' => 'HOSTIGAMIENTO', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 21, 'codigo' => 'B032', 'respuesta' => 'INFORME DE CARTAS', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 22, 'codigo' => 'B004', 'respuesta' => 'ABONO O PAGO PARCIAL', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 22, 'codigo' => 'B046', 'respuesta' => 'PAGO TOTAL', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 22, 'codigo' => 'B051', 'respuesta' => 'RETIRO CONCRETADO', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 22, 'codigo' => 'B052', 'respuesta' => 'RETIRO NO CONCRETADO', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 26, 'codigo' => 'B015', 'respuesta' => 'DICE QUE NO PAGARÁ', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 27, 'codigo' => 'B004', 'respuesta' => 'ABONO O PAGO PARCIAL', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 27, 'codigo' => 'B016', 'respuesta' => 'DICE QUE PAGARÁ', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 27, 'codigo' => 'B017', 'respuesta' => 'DICE QUE PAGÓ', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 27, 'codigo' => 'B018', 'respuesta' => 'DIRECCIÓN INCOMPLETA', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 27, 'codigo' => 'B019', 'respuesta' => 'DIRECCIÓN NO CORRESPONDE', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 27, 'codigo' => 'B025', 'respuesta' => 'FALLECIDO', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 27, 'codigo' => 'B028', 'respuesta' => 'FUERA DE ÁREA', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 27, 'codigo' => 'B032', 'respuesta' => 'INFORME DE CARTAS', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 27, 'codigo' => 'B035', 'respuesta' => 'INUBICABLE', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 27, 'codigo' => 'B036', 'respuesta' => 'LUGAR INACCESIBLE', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 27, 'codigo' => 'B038', 'respuesta' => 'NADIE EN DOMICILIO', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 27, 'codigo' => 'B041', 'respuesta' => 'NOTIFICACIÓN BAJO PUERTA', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 27, 'codigo' => 'B042', 'respuesta' => 'NOTIFICACIÓN CON DEUDOR O TERCERO', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 27, 'codigo' => 'B043', 'respuesta' => 'NOTIFICACIÓN CON TERCERO', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 27, 'codigo' => 'B044', 'respuesta' => 'NOTIFICACIÓN CON TITULAR SIN ACUERDO', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 27, 'codigo' => 'B046', 'respuesta' => 'PAGO TOTAL', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 27, 'codigo' => 'B048', 'respuesta' => 'RECLAMO', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 27, 'codigo' => 'B058', 'respuesta' => 'VERIFICACIÓN DE DIRECCIÓN', 'created_at' => date('Y-m-d')),

			array('gestiones_idgestiones' => 27, 'codigo' => 'B059', 'respuesta' => 'VISITA NO CONCRETADA', 'created_at' => date('Y-m-d')),
        );

        foreach (array_chunk($array_records, 1000) as $records) {
			\DB::table('respuestas')->insert($records);
        }
    }
}
