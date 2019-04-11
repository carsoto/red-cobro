<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 11 Apr 2019 05:50:14 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class RespuestasDetalle
 * 
 * @property int $idrespuestas_detalles
 * @property int $respuestas_idrespuesta
 * @property string $respuestas_codigo_respuesta
 * @property string $literal
 * @property string $detalle
 * @property string $tipo_gestion
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Respuesta $respuesta
 * @property \Illuminate\Database\Eloquent\Collection $deudores_gestiones
 *
 * @package App
 */
class RespuestasDetalle extends Eloquent
{
	protected $table = 'respuestas_detalles';

	protected $primaryKey = 'idrespuestas_detalles';

	protected $casts = [
		'respuestas_idrespuesta' => 'int'
	];

	protected $fillable = [
		'respuestas_idrespuesta',
		'respuestas_codigo_respuesta',
		'literal',
		'detalle',
		'tipo_gestion'
	];

	public function respuesta()
	{
		return $this->belongsTo(\App\Respuesta::class, 'respuestas_idrespuesta');
	}

	public function deudores_gestiones()
	{
		return $this->hasMany(\App\DeudoresGestion::class, 'idrespuestas_detalles');
	}
}
