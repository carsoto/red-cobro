<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 20 Oct 2018 05:13:05 +0000.
 */

namespace App\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class EstadoDocumento
 * 
 * @property int $idestado_documentos
 * @property string $estado
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $deudores_documentos
 * @property \Illuminate\Database\Eloquent\Collection $proveedores_documentos
 *
 * @package App\Base
 */
class EstadoDocumento extends Eloquent
{
	protected $primaryKey = 'idestado_documentos';
	protected $dateFormat = 'Y-m-d';

	public function deudores_documentos()
	{
		return $this->hasMany(\App\DeudoresDocumento::class, 'idestado_documentos');
	}

	public function proveedores_documentos()
	{
		return $this->hasMany(\App\ProveedoresDocumento::class, 'idestado_documentos');
	}
}
