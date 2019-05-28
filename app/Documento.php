<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 28 May 2019 03:50:07 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Documento
 * 
 * @property int $iddocumentos
 * @property int $deudores_iddeudores
 * @property int $carteras_idcarteras
 * @property string $numero
 * @property string $folio
 * @property float $deuda
 * @property \Carbon\Carbon $fecha_emision
 * @property \Carbon\Carbon $fecha_vencimiento
 * @property int $dias_mora
 * @property int $activo
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Cartera $cartera
 * @property \App\Deudore $deudore
 * @property \Illuminate\Database\Eloquent\Collection $pagos
 *
 * @package App
 */
class Documento extends Eloquent
{
	protected $primaryKey = 'iddocumentos';

	protected $casts = [
		'deudores_iddeudores' => 'int',
		'carteras_idcarteras' => 'int',
		'deuda' => 'float',
		'dias_mora' => 'int',
		'activo' => 'int'
	];

	protected $dates = [
		'fecha_emision',
		'fecha_vencimiento'
	];

	protected $fillable = [
		'deudores_iddeudores',
		'carteras_idcarteras',
		'numero',
		'folio',
		'deuda',
		'fecha_emision',
		'fecha_vencimiento',
		'dias_mora',
		'activo'
	];

	public function cartera()
	{
		return $this->belongsTo(\App\Cartera::class, 'carteras_idcarteras');
	}

	public function deudor()
	{
		return $this->belongsTo(\App\Deudor::class, 'deudores_iddeudores');
	}

	public function pagos()
	{
		return $this->hasMany(\App\Pago::class, 'documentos_iddocumentos');
	}
}
