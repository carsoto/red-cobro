<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 04 Dec 2018 21:42:39 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Asignacione
 * 
 * @property int $idasignaciones
 * @property int $deudores_iddeudores
 * @property \Carbon\Carbon $fecha_asignacion
 * @property float $deuda
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Deudore $deudore
 *
 * @package App
 */
class Asignacion extends Eloquent
{
	protected $table = 'asignaciones';
	protected $primaryKey = 'idasignaciones';

	protected $casts = [
		'deudores_iddeudores' => 'int',
		'deuda' => 'float'
	];

	protected $dates = [
		'fecha_asignacion'
	];

	protected $fillable = [
		'deudores_iddeudores',
		'fecha_asignacion',
		'deuda'
	];

	public function deudores()
	{
		return $this->belongsTo(\App\Deudor::class, 'deudores_iddeudores');
	}
}
