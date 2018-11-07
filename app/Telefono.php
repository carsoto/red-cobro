<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 06 Nov 2018 21:39:08 +0000.
 */

namespace App;

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
 * @package App
 */
class Telefono extends Eloquent
{
	protected $table = 'telefonos';

	protected $primaryKey = 'idtelefonos';

	protected $fillable = [
		'telefono'
	];

	public function deudores()
	{
		return $this->belongsToMany(\App\Deudor::class, 'deudores_telefonos', 'idtelefonos', 'iddeudores')
					->withPivot('id', 'activo')
					->withTimestamps();
	}
}
