<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 11 Apr 2019 05:50:13 +0000.
 */

namespace App;

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
 * @package App
 */
class Correo extends Eloquent
{
	protected $table = 'correos';

	protected $primaryKey = 'idcorreos_electronicos';

	protected $fillable = [
		'correo'
	];

	public function deudores()
	{
		return $this->belongsToMany(\App\Deudor::class, 'deudores_correos', 'idcorreos_electronicos', 'iddeudores')
					->withPivot('id', 'status')
					->withTimestamps();
	}
}
