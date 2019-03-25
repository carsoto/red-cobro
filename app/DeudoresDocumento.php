<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 25 Mar 2019 03:55:32 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class DeudoresDocumento
 * 
 * @property int $id
 * @property int $iddeudores
 * @property int $iddocumentos
 * @property int $activo
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Deudore $deudore
 * @property \App\Documento $documento
 *
 * @package App
 */
class DeudoresDocumento extends Eloquent
{
	protected $casts = [
		'iddeudores' => 'int',
		'iddocumentos' => 'int',
		'activo' => 'int'
	];

	protected $fillable = [
		'iddeudores',
		'iddocumentos',
		'activo'
	];

	public function deudores()
	{
		return $this->belongsTo(\App\Deudor::class, 'iddeudores');
	}

	public function documento()
	{
		return $this->belongsTo(\App\Documento::class, 'iddocumentos');
	}
}
