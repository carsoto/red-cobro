<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 09 Apr 2019 10:45:33 +0000.
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
 * @property \Illuminate\Database\Eloquent\Collection $users
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

	/*public function gestores()
	{
		return $this->belongsToMany(\App\Gestore::class, 'gestores_carteras_users', 'idcarteras', 'idgestores')
					->withPivot('idgestorescarterasusers', 'users_id')
					->withTimestamps();
	}*/

	public function users()
	{
		return $this->belongsToMany(\App\User::class, 'gestores_carteras_users', 'idcarteras', 'users_id')
					->withPivot('idgestorescarterasusers', 'idgestores')
					->withTimestamps();
	}
}
