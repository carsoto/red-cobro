<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 20 Oct 2018 05:13:06 +0000.
 */

namespace App\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Telefono
 * 
 * @property int $idtelefonos
 * @property string $telefono
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $deudores
 *
 * @package App\Base
 */
class Telefono extends Eloquent
{
	protected $primaryKey = 'idtelefonos';
	protected $dateFormat = 'Y-m-d';

	public function deudores()
	{
		return $this->belongsToMany(\App\Deudore::class, 'deudores_telefonos', 'telefonos_idtelefonos', 'deudores_iddeudores')
					->withPivot('id', 'activo')
					->withTimestamps();
	}
}
