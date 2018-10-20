<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 20 Oct 2018 05:13:05 +0000.
 */

namespace App\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class DeudoresDocumento
 * 
 * @property int $id
 * @property int $iddeudores
 * @property int $iddocumentos
 * @property int $dias_mora
 * @property int $idestado_documentos
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Deudore $deudore
 * @property \App\Documento $documento
 * @property \App\EstadoDocumento $estado_documento
 *
 * @package App\Base
 */
class DeudoresDocumento extends Eloquent
{
	protected $dateFormat = 'Y-m-d';

	protected $casts = [
		'iddeudores' => 'int',
		'iddocumentos' => 'int',
		'dias_mora' => 'int',
		'idestado_documentos' => 'int'
	];

	public function deudore()
	{
		return $this->belongsTo(\App\Deudore::class, 'iddeudores');
	}

	public function documento()
	{
		return $this->belongsTo(\App\Documento::class, 'iddocumentos');
	}

	public function estado_documento()
	{
		return $this->belongsTo(\App\EstadoDocumento::class, 'idestado_documentos');
	}
}
