<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 11 Apr 2019 05:50:12 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Cartera
 * 
 * @property int $idcarteras
 * @property int $idgestores
 * @property string $nombre
 * @property int $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Gestore $gestore
 * @property \Illuminate\Database\Eloquent\Collection $deudores
 * @property \Illuminate\Database\Eloquent\Collection $deudores_gestiones
 * @property \Illuminate\Database\Eloquent\Collection $gestiones
 * @property \Illuminate\Database\Eloquent\Collection $pagos
 * @property \Illuminate\Database\Eloquent\Collection $users
 *
 * @package App
 */
class Cartera extends Eloquent
{
	protected $table = 'carteras';

	protected $primaryKey = 'idcarteras';

	protected $casts = [
		'idgestores' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'idgestores',
		'nombre',
		'status'
	];

	public function gestor()
	{
		return $this->belongsTo(\App\Gestor::class, 'idgestores');
	}

	public function deudores()
	{
		return $this->hasMany(\App\Deudor::class, 'carteras_idcarteras');
	}

	public function deudores_gestiones()
	{
		return $this->hasMany(\App\DeudoresGestion::class, 'carteras_idcarteras');
	}

	public function gestiones()
	{
		return $this->hasMany(\App\Gestion::class, 'carteras_idcarteras');
	}

	public function pagos()
	{
		return $this->hasMany(\App\Pago::class, 'carteras_idcarteras');
	}

	public function users()
	{
		return $this->belongsToMany(\App\User::class, 'users_carteras', 'carteras_idcarteras', 'users_id')
					->withPivot('iduserscarteras', 'status')
					->withTimestamps();
	}
}
