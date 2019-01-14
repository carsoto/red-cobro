<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 06 Nov 2018 21:39:08 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Proveedore
 * 
 * @property int $idproveedores
 * @property int $rut
 * @property string $rut_dv
 * @property string $razon_social
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $empleados
 * @property \Illuminate\Database\Eloquent\Collection $documentos
 *
 * @package App
 */
class Gestor extends Eloquent
{
	protected $table = 'gestores';

	protected $primaryKey = 'idgestores';

	protected $casts = [
		'rut' => 'int'
	];

	protected $fillable = [
		'rut',
		'rut_dv',
		'razon_social'
	];

	public function empleados()
	{
		return $this->hasMany(\App\Empleado::class, 'idgestores');
	}

	public function documentos()
	{
		return $this->belongsToMany(\App\Documento::class, 'gestores_documentos', 'idgestores', 'iddocumentos')
					->withPivot('id', 'idestado_documentos')
					->withTimestamps();
	}
}
