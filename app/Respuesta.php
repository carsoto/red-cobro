<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 17 Nov 2018 06:08:45 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Respuesta
 * 
 * @property int $idrespuesta
 * @property string $codigo
 * @property string $respuesta
 * @property string $detalle
 * @property string $descripcion
 * @property string $gestion
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $gestiones
 *
 * @package App
 */
class Respuesta extends Eloquent
{
	protected $primaryKey = 'idrespuesta';

	protected $fillable = [
		'codigo',
		'respuesta',
		'detalle',
		'descripcion',
		'gestion'
	];

	public function gestiones()
	{
		return $this->belongsToMany(\App\Gestion::class, 'gestiones_respuestas', 'respuestas_idrespuesta', 'gestiones_idgestiones')
					->withPivot('idgestiones_respuestas')
					->withTimestamps();
	}
}
