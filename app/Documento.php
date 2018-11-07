<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 06 Nov 2018 22:09:17 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Documento
 * 
 * @property int $iddocumentos
 * @property string $numero
 * @property string $folio
 * @property float $deuda
 * @property \Carbon\Carbon $fecha_emision
 * @property \Carbon\Carbon $fecha_vencimiento
 * @property int $dias_mora
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $deudores
 * @property \Illuminate\Database\Eloquent\Collection $proveedores
 *
 * @package App
 */
class Documento extends Eloquent
{
	protected $table = 'documentos';

	protected $primaryKey = 'iddocumentos';

	protected $casts = [
		'deuda' => 'float',
		'dias_mora' => 'int'
	];

	protected $dates = [
		'fecha_emision',
		'fecha_vencimiento'
	];

	protected $fillable = [
		'numero',
		'folio',
		'deuda',
		'fecha_emision',
		'fecha_vencimiento',
		'dias_mora'
	];

	public function deudores()
	{
		return $this->belongsToMany(\App\Deudor::class, 'deudores_documentos', 'iddocumentos', 'iddeudores')
					->withPivot('id', 'idestado_documentos')
					->withTimestamps();
	}

	public function proveedores()
	{
		return $this->belongsToMany(\App\Proveedor::class, 'proveedores_documentos', 'iddocumentos', 'idproveedores')
					->withPivot('id', 'idestado_documentos')
					->withTimestamps();
	}
}
