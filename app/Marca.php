<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 18 Dec 2018 23:30:54 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Marca
 * 
 * @property int $idmarcas
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
	protected $primaryKey = 'idmarcas';

	protected $fillable = [
		'marca', 'orden'
	];

	public function deudores()
	{
		return $this->belongsToMany(\App\Deudor::class, 'deudores_marcas', 'idmarcas', 'iddeudores')
					->withPivot('id', 'activo')
					->withTimestamps();
	}
}
