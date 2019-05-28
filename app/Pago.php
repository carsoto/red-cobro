<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 28 May 2019 03:51:21 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Pago
 * 
 * @property int $idpagos
 * @property int $carteras_idcarteras
 * @property int $documentos_iddocumentos
 * @property string $rut
 * @property \Carbon\Carbon $fecha
 * @property float $monto
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Cartera $cartera
 * @property \App\Documento $documento
 *
 * @package App
 */
class Pago extends Eloquent
{
	protected $primaryKey = 'idpagos';

	protected $casts = [
		'carteras_idcarteras' => 'int',
		'documentos_iddocumentos' => 'int',
		'monto' => 'float'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'carteras_idcarteras',
		'documentos_iddocumentos',
		'rut',
		'fecha',
		'monto'
	];

	public function cartera()
	{
		return $this->belongsTo(\App\Cartera::class, 'carteras_idcarteras');
	}

	public function documento()
	{
		return $this->belongsTo(\App\Documento::class, 'documentos_iddocumentos');
	}
}
