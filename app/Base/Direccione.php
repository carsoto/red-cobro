<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 20 Oct 2018 05:13:05 +0000.
 */

namespace App\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Direccione
 * 
 * @property int $iddirecciones
 * @property int $idcomunas
 * @property string $direccion
 * @property string $complemento
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Comuna $comuna
 * @property \Illuminate\Database\Eloquent\Collection $deudores
 *
 * @package App\Base
 */
class Direccione extends Eloquent
{
	protected $primaryKey = 'iddirecciones';
	protected $dateFormat = 'Y-m-d';

	protected $casts = [
		'idcomunas' => 'int'
	];

	public function comuna()
	{
		return $this->belongsTo(\App\Comuna::class, 'idcomunas');
	}

	public function deudores()
	{
		return $this->belongsToMany(\App\Deudore::class, 'deudores_direcciones', 'iddirecciones', 'iddeudores')
					->withPivot('id', 'activo')
					->withTimestamps();
	}
}
