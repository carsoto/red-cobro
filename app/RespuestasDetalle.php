<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 23 Nov 2018 00:20:52 +0000.
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
 * @property int $tipos_gestion_idtipogestion
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Respuesta $respuesta
 * @property \App\TiposGestion $tipos_gestion
 *
 * @package App
 */
class RespuestasDetalle extends Eloquent
{
	protected $primaryKey = 'idrespuestas_detalles';

	protected $casts = [
		'respuestas_idrespuesta' => 'int',
		'tipos_gestion_idtipogestion' => 'int'
	];

	protected $fillable = [
		'respuestas_idrespuesta',
		'respuestas_codigo_respuesta',
		'literal',
		'detalle',
		'tipos_gestion_idtipogestion'
	];

	public function respuesta()
	{
		return $this->belongsTo(\App\Respuesta::class, 'respuestas_idrespuesta');
	}

	public function tipos_gestion()
	{
		return $this->belongsTo(\App\TiposGestion::class, 'tipos_gestion_idtipogestion');
	}
}
