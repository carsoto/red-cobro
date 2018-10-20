<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 20 Oct 2018 05:13:05 +0000.
 */

namespace App\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class DeudoresDireccione
 * 
 * @property int $id
 * @property int $iddeudores
 * @property int $iddirecciones
 * @property int $activo
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Deudore $deudore
 * @property \App\Direccione $direccione
 *
 * @package App\Base
 */
class DeudoresDireccione extends Eloquent
{
	protected $dateFormat = 'Y-m-d';

	protected $casts = [
		'iddeudores' => 'int',
		'iddirecciones' => 'int',
		'activo' => 'int'
	];

	public function deudore()
	{
		return $this->belongsTo(\App\Deudore::class, 'iddeudores');
	}

	public function direccione()
	{
		return $this->belongsTo(\App\Direccione::class, 'iddirecciones');
	}
}
