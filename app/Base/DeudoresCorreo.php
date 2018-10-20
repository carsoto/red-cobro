<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 20 Oct 2018 05:13:05 +0000.
 */

namespace App\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class DeudoresCorreo
 * 
 * @property int $id
 * @property int $iddeudores
 * @property int $idcorreos_electronicos
 * @property int $activo
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Correo $correo
 * @property \App\Deudore $deudore
 *
 * @package App\Base
 */
class DeudoresCorreo extends Eloquent
{
	protected $dateFormat = 'Y-m-d';

	protected $casts = [
		'iddeudores' => 'int',
		'idcorreos_electronicos' => 'int',
		'activo' => 'int'
	];

	public function correo()
	{
		return $this->belongsTo(\App\Correo::class, 'idcorreos_electronicos');
	}

	public function deudore()
	{
		return $this->belongsTo(\App\Deudore::class, 'iddeudores');
	}
}
