<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 12 Dec 2018 00:37:09 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Pago
 * 
 * @property int $idpagos
 * @property string $rut
 * @property int $documentos_iddocumentos
 * @property float $monto
 * @property \Carbon\Carbon $fecha
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Documento $documento
 *
 * @package App
 */
class Pago extends Eloquent
{
	protected $table = 'pagos';
	protected $primaryKey = 'idpagos';

	protected $casts = [
		'documentos_iddocumentos' => 'int',
		'monto' => 'float'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'rut',
		'documentos_iddocumentos',
		'monto',
		'fecha'
	];

	public function documento()
	{
		return $this->belongsTo(\App\Documento::class, 'documentos_iddocumentos');
	}
}
