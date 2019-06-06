<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 06 Jun 2019 03:28:34 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class DeudoresGestione
 * 
 * @property int $iddeudoresgestiones
 * @property int $users_id
 * @property int $carteras_idcarteras
 * @property int $deudores_iddeudores
 * @property int $gestiones_idgestiones
 * @property int $respuestas_idrespuesta
 * @property int $idrespuestas_detalles
 * @property int $deudores_correos_id
 * @property int $deudores_telefonos_id
 * @property \Carbon\Carbon $fecha
 * @property \Carbon\Carbon $fecha_futura
 * @property int $idgestion_futura
 * @property boolean $observacion
 * @property string $mes
 * @property string $ano
 * @property int $compromiso
 * @property int $contacto_directo
 * @property int $contacto_indirecto
 * @property int $sin_contacto
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Cartera $cartera
 * @property \App\DeudoresCorreo $deudores_correo
 * @property \App\Deudore $deudore
 * @property \App\DeudoresTelefono $deudores_telefono
 * @property \App\Gestione $gestione
 * @property \App\RespuestasDetalle $respuestas_detalle
 * @property \App\Respuesta $respuesta
 * @property \App\User $user
 *
 * @package App
 */
class DeudoresGestiones extends Eloquent
{
	protected $table = 'deudores_gestiones';
	protected $primaryKey = 'iddeudoresgestiones';

	protected $casts = [
		'users_id' => 'int',
		'carteras_idcarteras' => 'int',
		'deudores_iddeudores' => 'int',
		'gestiones_idgestiones' => 'int',
		'respuestas_idrespuesta' => 'int',
		'idrespuestas_detalles' => 'int',
		'deudores_correos_id' => 'int',
		'deudores_telefonos_id' => 'int',
		'idgestion_futura' => 'int',
		'observacion' => 'boolean',
		'compromiso' => 'int',
		'contacto_directo' => 'int',
		'contacto_indirecto' => 'int',
		'sin_contacto' => 'int'
	];

	protected $dates = [
		'fecha',
		'fecha_futura'
	];

	protected $fillable = [
		'users_id',
		'carteras_idcarteras',
		'deudores_iddeudores',
		'gestiones_idgestiones',
		'respuestas_idrespuesta',
		'idrespuestas_detalles',
		'deudores_correos_id',
		'deudores_telefonos_id',
		'fecha',
		'fecha_futura',
		'idgestion_futura',
		'observacion',
		'mes',
		'ano',
		'compromiso',
		'contacto_directo',
		'contacto_indirecto',
		'sin_contacto'
	];

	public function cartera()
	{
		return $this->belongsTo(\App\Cartera::class, 'carteras_idcarteras');
	}

	public function deudores_correo()
	{
		return $this->belongsTo(\App\DeudoresCorreo::class, 'deudores_correos_id');
	}

	public function deudor()
	{
		return $this->belongsTo(\App\Deudor::class, 'deudores_iddeudores');
	}

	public function deudores_telefono()
	{
		return $this->belongsTo(\App\DeudoresTelefono::class, 'deudores_telefonos_id');
	}

	public function gestiones()
	{
		return $this->belongsTo(\App\Gestion::class, 'gestiones_idgestiones');
	}

	public function respuestas_detalle()
	{
		return $this->belongsTo(\App\RespuestasDetalle::class, 'idrespuestas_detalles');
	}

	public function respuesta()
	{
		return $this->belongsTo(\App\Respuesta::class, 'respuestas_idrespuesta');
	}

	public function user()
	{
		return $this->belongsTo(\App\User::class, 'users_id');
	}
}
