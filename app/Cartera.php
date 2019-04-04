<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 04 Apr 2019 03:08:48 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Cartera
 * 
 * @property int $idcarteras
 * @property int $idgestores
 * @property string $nombre
 * @property string $base
 * @property string $host_user
 * @property string $host_password
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Gestore $gestore
 * @property \Illuminate\Database\Eloquent\Collection $usuarios
 *
 * @package App
 */
class Cartera extends Eloquent
{
	protected $primaryKey = 'idcarteras';

	protected $casts = [
		'idgestores' => 'int'
	];

	protected $hidden = [
		'host_password'
	];

	protected $fillable = [
		'idgestores',
		'nombre',
		'base',
		'host_user',
		'host_password'
	];

	public function gestor()
	{
		return $this->belongsTo(\App\Gestor::class, 'idgestores');
	}

	public function usuarios()
	{
		return $this->hasMany(\App\Usuario::class, 'idcarteras');
	}
}
