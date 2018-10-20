<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 20 Oct 2018 05:13:04 +0000.
 */

namespace App\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Comuna
 * 
 * @property int $idcomunas
 * @property int $idprovincias
 * @property string $comuna
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Provincia $provincia
 * @property \Illuminate\Database\Eloquent\Collection $direcciones
 *
 * @package App\Base
 */
class Comuna extends Eloquent
{
	protected $primaryKey = 'idcomunas';
	protected $dateFormat = 'Y-m-d';

	protected $casts = [
		'idprovincias' => 'int'
	];

	public function provincia()
	{
		return $this->belongsTo(\App\Provincia::class, 'idprovincias');
	}

	public function direcciones()
	{
		return $this->hasMany(\App\Direccione::class, 'idcomunas');
	}
}
