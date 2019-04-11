<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 11 Apr 2019 05:50:13 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Documento
 * 
 * @property int $iddocumentos
 * @property int $deudores_iddeudores
 * @property string $numero
 * @property string $folio
 * @property float $deuda
 * @property \Carbon\Carbon $fecha_emision
 * @property \Carbon\Carbon $fecha_vencimiento
 * @property int $dias_mora
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Deudore $deudore
 * @property \Illuminate\Database\Eloquent\Collection $pagos
 *
 * @package App
 */
class Documento extends Eloquent
{
	protected $table = 'documentos';

	protected $primaryKey = 'iddocumentos';

	protected $casts = [
		'deudores_iddeudores' => 'int',
		'deuda' => 'float',
		'dias_mora' => 'int'
	];

	protected $dates = [
		'fecha_emision',
		'fecha_vencimiento'
	];

	protected $fillable = [
		'deudores_iddeudores',
		'numero',
		'folio',
		'deuda',
		'fecha_emision',
		'fecha_vencimiento',
		'dias_mora'
	];

	public function deudor()
	{
		return $this->belongsTo(\App\Deudor::class, 'deudores_iddeudores');
	}

	public function pagos()
	{
		return $this->hasMany(\App\Pago::class, 'documentos_iddocumentos');
	}
}
