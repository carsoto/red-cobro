<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 23 Nov 2018 00:20:42 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Respuesta
 * 
 * @property int $idrespuesta
 * @property string $codigo
 * @property string $respuesta
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $gestiones
 * @property \Illuminate\Database\Eloquent\Collection $respuestas_detalles
 *
 * @package App
 */
class Respuesta extends Eloquent
{
	protected $primaryKey = 'idrespuesta';

	protected $fillable = [
		'codigo',
		'respuesta'
	];

	public function gestiones()
	{
		return $this->belongsToMany(\App\Gestion::class, 'gestiones_respuestas', 'respuestas_idrespuesta', 'gestiones_idgestiones')
					->withPivot('idgestiones_respuestas')
					->withTimestamps();
	}

	public function respuestas_detalles()
	{
		return $this->hasMany(\App\RespuestasDetalle::class, 'respuestas_idrespuesta');
	}
}
