<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 20 Oct 2018 05:13:06 +0000.
 */

namespace App\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Supervisore
 * 
 * @property int $idsupervisores
 * @property int $idproveedores
 * @property string $rut
 * @property string $nombre
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Proveedore $proveedore
 * @property \Illuminate\Database\Eloquent\Collection $agentes
 *
 * @package App\Base
 */
class Supervisore extends Eloquent
{
	protected $primaryKey = 'idsupervisores';
	protected $dateFormat = 'Y-m-d';

	protected $casts = [
		'idproveedores' => 'int'
	];

	public function proveedore()
	{
		return $this->belongsTo(\App\Proveedore::class, 'idproveedores');
	}

	public function agentes()
	{
		return $this->hasMany(\App\Agente::class, 'idsupervisores');
	}
}
