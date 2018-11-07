<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 06 Nov 2018 21:39:07 +0000.
 */

namespace App;

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
 * @package App
 */
class Comuna extends Eloquent
{
	protected $table = 'comunas';

	protected $primaryKey = 'idcomunas';

	protected $casts = [
		'idprovincias' => 'int'
	];

	protected $fillable = [
		'idprovincias',
		'comuna'
	];

	public function provincia()
	{
		return $this->belongsTo(\App\Provincia::class, 'idprovincias');
	}

	public function direcciones()
	{
		return $this->hasMany(\App\Direccion::class, 'idcomunas');
	}
}
