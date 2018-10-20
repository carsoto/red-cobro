<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 20 Oct 2018 05:13:04 +0000.
 */

namespace App\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Correo
 * 
 * @property int $idcorreos_electronicos
 * @property string $correo
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $deudores
 *
 * @package App\Base
 */
class Correo extends Eloquent
{
	protected $primaryKey = 'idcorreos_electronicos';
	protected $dateFormat = 'Y-m-d';

	public function deudores()
	{
		return $this->belongsToMany(\App\Deudore::class, 'deudores_correos', 'idcorreos_electronicos', 'iddeudores')
					->withPivot('id', 'activo')
					->withTimestamps();
	}
}
