<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 23 Nov 2018 00:21:08 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TiposGestion
 * 
 * @property int $idtipogestion
 * @property string $descripcion
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $respuestas_detalles
 *
 * @package App
 */
class TiposGestion extends Eloquent
{
	protected $table = 'tipos_gestion';
	protected $primaryKey = 'idtipogestion';

	protected $fillable = [
		'descripcion'
	];

	public function respuestas_detalles()
	{
		return $this->hasMany(\App\RespuestasDetalle::class, 'tipos_gestion_idtipogestion');
	}
}
