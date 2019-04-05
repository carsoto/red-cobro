<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 05 Apr 2019 01:15:21 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Cartera
 * 
 * @property int $idcarteras
 * @property string $nombre
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $gestores
 *
 * @package App
 */
class Cartera extends Eloquent
{
	protected $primaryKey = 'idcarteras';

	protected $fillable = [
		'nombre'
	];

	public function gestores()
	{
		return $this->belongsToMany(\App\Gestor::class, 'gestores_carteras', 'idcarteras', 'idgestores')
					->withPivot('idgestorescarteras', 'base', 'host_user', 'host_password')
					->withTimestamps();
	}
}
