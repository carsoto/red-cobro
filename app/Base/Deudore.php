<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 20 Oct 2018 05:13:04 +0000.
 */

namespace App\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Deudore
 * 
 * @property int $iddeudores
 * @property string $rut
 * @property string $razon_social
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $correos
 * @property \Illuminate\Database\Eloquent\Collection $direcciones
 * @property \Illuminate\Database\Eloquent\Collection $documentos
 * @property \Illuminate\Database\Eloquent\Collection $telefonos
 *
 * @package App\Base
 */
class Deudore extends Eloquent
{
	protected $primaryKey = 'iddeudores';
	protected $dateFormat = 'Y-m-d';

	public function correos()
	{
		return $this->belongsToMany(\App\Correo::class, 'deudores_correos', 'iddeudores', 'idcorreos_electronicos')
					->withPivot('id', 'activo')
					->withTimestamps();
	}

	public function direcciones()
	{
		return $this->belongsToMany(\App\Direccione::class, 'deudores_direcciones', 'iddeudores', 'iddirecciones')
					->withPivot('id', 'activo')
					->withTimestamps();
	}

	public function documentos()
	{
		return $this->belongsToMany(\App\Documento::class, 'deudores_documentos', 'iddeudores', 'iddocumentos')
					->withPivot('id', 'dias_mora', 'idestado_documentos')
					->withTimestamps();
	}

	public function telefonos()
	{
		return $this->belongsToMany(\App\Telefono::class, 'deudores_telefonos', 'deudores_iddeudores', 'telefonos_idtelefonos')
					->withPivot('id', 'activo')
					->withTimestamps();
	}
}
