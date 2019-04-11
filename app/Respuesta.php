<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 11 Apr 2019 05:50:13 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Respuesta
 * 
 * @property int $idrespuesta
 * @property int $gestiones_idgestiones
 * @property string $codigo
 * @property string $respuesta
 * @property int $contacto_directo
 * @property int $contacto_indirecto
 * @property int $sin_contacto
 * @property int $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Gestione $gestione
 * @property \Illuminate\Database\Eloquent\Collection $deudores_gestiones
 * @property \Illuminate\Database\Eloquent\Collection $respuestas_detalles
 *
 * @package App
 */
class Respuesta extends Eloquent
{
	protected $table = 'respuestas';

	protected $primaryKey = 'idrespuesta';

	protected $casts = [
		'gestiones_idgestiones' => 'int',
		'contacto_directo' => 'int',
		'contacto_indirecto' => 'int',
		'sin_contacto' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'gestiones_idgestiones',
		'codigo',
		'respuesta',
		'contacto_directo',
		'contacto_indirecto',
		'sin_contacto',
		'status'
	];

	public function gestion()
	{
		return $this->belongsTo(\App\Gestion::class, 'gestiones_idgestiones');
	}

	public function deudores_gestiones()
	{
		return $this->hasMany(\App\DeudoresGestion::class, 'respuestas_idrespuesta');
	}

	public function respuestas_detalles()
	{
		return $this->hasMany(\App\RespuestasDetalle::class, 'respuestas_idrespuesta');
	}
}
