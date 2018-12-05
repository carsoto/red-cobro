<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 05 Dec 2018 03:37:50 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class DeudoresDocumento
 * 
 * @property int $id
 * @property int $iddeudores
 * @property int $iddocumentos
 * @property int $idestado_documentos
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Deudore $deudore
 * @property \App\Documento $documento
 * @property \App\EstadoDocumento $estado_documento
 *
 * @package App
 */
class DeudoresDocumento extends Eloquent
{
	protected $casts = [
		'iddeudores' => 'int',
		'iddocumentos' => 'int',
		'idestado_documentos' => 'int'
	];

	protected $fillable = [
		'iddeudores',
		'iddocumentos',
		'idestado_documentos'
	];

	public function deudor()
	{
		return $this->belongsTo(\App\Deudor::class, 'iddeudores');
	}

	public function documento()
	{
		return $this->belongsTo(\App\Documento::class, 'iddocumentos');
	}

	/*public function estado_documento()
	{
		return $this->belongsTo(\App\EstadoDocumento::class, 'idestado_documentos');
	}*/
}
