<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 07 Dec 2018 21:44:58 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class DeudoresMarca
 * 
 * @property int $iddeudores_marcas
 * @property int $deudores_iddeudores
 * @property string $marca
 * @property \Carbon\Carbon $fecha_marca
 * @property int $activo
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Deudore $deudore
 *
 * @package App
 */
class DeudoresMarca extends Eloquent
{
	protected $primaryKey = 'iddeudores_marcas';

	protected $casts = [
		'deudores_iddeudores' => 'int',
		'activo' => 'int'
	];

	protected $dates = [
		'fecha_marca'
	];

	protected $fillable = [
		'deudores_iddeudores',
		'marca',
		'fecha_marca',
		'activo'
	];

	public function deudore()
	{
		return $this->belongsTo(\App\Deudore::class, 'deudores_iddeudores');
	}
}
