<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 20 Oct 2018 05:13:05 +0000.
 */

namespace App\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ProveedoresDocumento
 * 
 * @property int $id
 * @property int $idproveedores
 * @property int $iddocumentos
 * @property int $idestado_documentos
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Documento $documento
 * @property \App\EstadoDocumento $estado_documento
 * @property \App\Proveedore $proveedore
 *
 * @package App\Base
 */
class ProveedoresDocumento extends Eloquent
{
	protected $dateFormat = 'Y-m-d';

	protected $casts = [
		'idproveedores' => 'int',
		'iddocumentos' => 'int',
		'idestado_documentos' => 'int'
	];

	public function documento()
	{
		return $this->belongsTo(\App\Documento::class, 'iddocumentos');
	}

	public function estado_documento()
	{
		return $this->belongsTo(\App\EstadoDocumento::class, 'idestado_documentos');
	}

	public function proveedore()
	{
		return $this->belongsTo(\App\Proveedore::class, 'idproveedores');
	}
}
