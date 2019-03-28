<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 28 Mar 2019 13:19:20 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class UsersGestoresCartera
 * 
 * @property int $idusersgestorescarteras
 * @property int $users_id
 * @property int $gestores_idgestores
 * @property int $carteras_idcarteras
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Cartera $cartera
 * @property \App\Gestore $gestore
 * @property \App\User $user
 *
 * @package App
 */
class UsersGestoresCartera extends Eloquent
{
	protected $primaryKey = 'idusersgestorescarteras';

	protected $casts = [
		'users_id' => 'int',
		'gestores_idgestores' => 'int',
		'carteras_idcarteras' => 'int'
	];

	protected $fillable = [
		'users_id',
		'gestores_idgestores',
		'carteras_idcarteras'
	];

	public function cartera()
	{
		return $this->belongsTo(\App\Cartera::class, 'carteras_idcarteras');
	}

	public function gestores()
	{
		return $this->belongsTo(\App\Gestor::class, 'gestores_idgestores');
	}

	public function user()
	{
		return $this->belongsTo(\App\User::class, 'users_id');
	}
}
