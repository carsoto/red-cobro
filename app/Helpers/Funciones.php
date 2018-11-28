<?php

namespace App\Helpers;

class Funciones{

	public static function cadena_a_fecha($str_fecha){
		$anyo = substr($str_fecha, 0, 4);
        $mes = substr($str_fecha, 4, 2);
        $dia = substr($str_fecha, 6, 2);
        $fecha = $anyo.'-'.$mes.'-'.$dia;
        return $fecha;
	}

	public static function formatearRut($rut_sin_formato) {

        if (strpos($rut_sin_formato, '-') !== false ) {
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
}
