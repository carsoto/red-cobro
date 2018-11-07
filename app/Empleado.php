<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 06 Nov 2018 21:39:08 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Empleado
 * 
 * @property int $idempleados
 * @property int $idproveedores
 * @property int $rut
 * @property string $rut_dv
 * @property string $nombre
 * @property int $idpadre
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Proveedore $proveedore
 *
 * @package App
 */
class Empleado extends Eloquent
{
	protected $primaryKey = 'idempleados';

	protected $casts = [
		'idproveedores' => 'int',
		'rut' => 'int',
		'idpadre' => 'int'
	];

	protected $fillable = [
		'idproveedores',
		'rut',
		'rut_dv',
		'nombre',
		'idpadre'
	];

	public function proveedore()
	{
		return $this->belongsTo(\App\Proveedore::class, 'idproveedores');
	}
}
