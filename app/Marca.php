<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 11 Apr 2019 05:50:13 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Marca
 * 
 * @property int $idmarcas
 * @property int $orden
 * @property string $marca
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $deudores
 *
 * @package App
 */
class Marca extends Eloquent
{
	protected $table = 'marcas';

	protected $primaryKey = 'idmarcas';

	protected $casts = [
		'orden' => 'int'
	];

	protected $fillable = [
		'orden',
		'marca'
	];

	public function deudores()
	{
		return $this->belongsToMany(\App\Deudor::class, 'deudores_marcas', 'idmarcas', 'iddeudores')
					->withPivot('id', 'activo')
					->withTimestamps();
	}
}
