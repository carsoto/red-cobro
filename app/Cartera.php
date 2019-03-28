<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 28 Mar 2019 05:06:16 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Cartera
 * 
 * @property int $idcarteras
 * @property string $descripcion
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $gestores
 * @property \Illuminate\Database\Eloquent\Collection $users
 *
 * @package App
 */
class Cartera extends Eloquent
{
	protected $primaryKey = 'idcarteras';

	protected $fillable = [
		'descripcion'
	];

	public function gestores()
	{
		return $this->belongsToMany(\App\Gestore::class, 'users_gestores_carteras', 'carteras_idcarteras', 'gestores_idgestores')
					->withPivot('idusersgestorescarteras', 'users_id')
					->withTimestamps();
	}

	public function users()
	{
		return $this->belongsToMany(\App\User::class, 'users_gestores_carteras', 'carteras_idcarteras', 'users_id')
					->withPivot('idusersgestorescarteras', 'gestores_idgestores')
					->withTimestamps();
	}
}
