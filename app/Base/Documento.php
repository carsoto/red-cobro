<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 20 Oct 2018 05:13:05 +0000.
 */

namespace App\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Documento
 * 
 * @property int $iddocumentos
 * @property string $numero
 * @property string $folio
 * @property string $deuda
 * @property string $fecha_emision
 * @property string $fecha_vencimiento
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $deudores
 * @property \Illuminate\Database\Eloquent\Collection $proveedores
 *
 * @package App\Base
 */
class Documento extends Eloquent
{
	protected $primaryKey = 'iddocumentos';
	protected $dateFormat = 'Y-m-d';

	public function deudores()
	{
		return $this->belongsToMany(\App\Deudore::class, 'deudores_documentos', 'iddocumentos', 'iddeudores')
					->withPivot('id', 'dias_mora', 'idestado_documentos')
					->withTimestamps();
	}

	public function proveedores()
	{
		return $this->belongsToMany(\App\Proveedore::class, 'proveedores_documentos', 'iddocumentos', 'idproveedores')
					->withPivot('id', 'idestado_documentos')
					->withTimestamps();
	}
}
