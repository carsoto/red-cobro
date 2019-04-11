<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 11 Apr 2019 05:50:13 +0000.
 */

namespace App;

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
 * @package App
 */
class Direccion extends Eloquent
{
	protected $table = 'direcciones';

	protected $primaryKey = 'iddirecciones';

	protected $casts = [
		'idcomunas' => 'int'
	];

	protected $fillable = [
		'idcomunas',
		'direccion',
		'complemento'
	];

	public function comuna()
	{
		return $this->belongsTo(\App\Comuna::class, 'idcomunas');
	}

	public function deudores()
	{
		return $this->belongsToMany(\App\Deudor::class, 'deudores_direcciones', 'iddirecciones', 'iddeudores')
					->withPivot('id', 'status')
					->withTimestamps();
	}
}
