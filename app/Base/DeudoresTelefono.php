<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 20 Oct 2018 05:13:05 +0000.
 */

namespace App\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class DeudoresTelefono
 * 
 * @property int $id
 * @property int $deudores_iddeudores
 * @property int $telefonos_idtelefonos
 * @property int $activo
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Deudore $deudore
 * @property \App\Telefono $telefono
 *
 * @package App\Base
 */
class DeudoresTelefono extends Eloquent
{
	protected $dateFormat = 'Y-m-d';

	protected $casts = [
		'deudores_iddeudores' => 'int',
		'telefonos_idtelefonos' => 'int',
		'activo' => 'int'
	];

	public function deudore()
	{
		return $this->belongsTo(\App\Deudore::class, 'deudores_iddeudores');
	}

	public function telefono()
	{
		return $this->belongsTo(\App\Telefono::class, 'telefonos_idtelefonos');
	}
}
