<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 11 Apr 2019 05:50:13 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Gestore
 * 
 * @property int $idgestores
 * @property string $rut
 * @property string $razon_social
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $carteras
 *
 * @package App
 */
class Gestor extends Eloquent
{
	protected $table = 'gestores';

	protected $primaryKey = 'idgestores';

	protected $fillable = [
		'rut',
		'razon_social'
	];

	public function carteras()
	{
		return $this->hasMany(\App\Cartera::class, 'idgestores');
	}
}
