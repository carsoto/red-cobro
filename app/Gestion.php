<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 17 Nov 2018 06:07:55 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Gestione
 * 
 * @property int $idgestiones
 * @property string $codigo
 * @property string $descripcion
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $respuestas
 *
 * @package App
 */
class Gestion extends Eloquent
{
	protected $table = 'gestiones';
	protected $primaryKey = 'idgestiones';

	protected $fillable = [
		'codigo',
		'descripcion'
	];

	public function respuestas()
	{
		return $this->belongsToMany(\App\Respuesta::class, 'gestiones_respuestas', 'gestiones_idgestiones', 'respuestas_idrespuesta')
					->withPivot('idgestiones_respuestas')
					->withTimestamps();
	}
}
