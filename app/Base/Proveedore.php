<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 20 Oct 2018 05:13:05 +0000.
 */

namespace App\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Proveedore
 * 
 * @property int $idproveedores
 * @property string $rut
 * @property string $razon_social
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $documentos
 * @property \Illuminate\Database\Eloquent\Collection $supervisores
 *
 * @package App\Base
 */
class Proveedore extends Eloquent
{
	protected $primaryKey = 'idproveedores';
	protected $dateFormat = 'Y-m-d';

	public function documentos()
	{
		return $this->belongsToMany(\App\Documento::class, 'proveedores_documentos', 'idproveedores', 'iddocumentos')
					->withPivot('id', 'idestado_documentos')
					->withTimestamps();
	}

	public function supervisores()
	{
		return $this->hasMany(\App\Supervisore::class, 'idproveedores');
	}
}
