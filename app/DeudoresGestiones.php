<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 20 Nov 2018 04:21:09 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class DeudoresGestione
 * 
 * @property int $iddeudores_gestiones
 * @property int $deudores_iddeudores
 * @property string $contacto
 * @property int $gestiones_idgestiones
 * @property string $respuesta
 * @property string $observacion
 * @property string $fecha_gestion
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Deudore $deudore
 * @property \App\Gestione $gestione
 *
 * @package App
 */
class DeudoresGestiones extends Eloquent
{
	protected $primaryKey = 'iddeudores_gestiones';

	protected $casts = [
		'deudores_iddeudores' => 'int',
		'gestiones_idgestiones' => 'int'
	];

	protected $fillable = [
		'deudores_iddeudores',
		'contacto',
		'gestiones_idgestiones',
		'respuesta',
		'observacion',
		'fecha_gestion'
	];

	public function deudores()
	{
		return $this->belongsTo(\App\Deudor::class, 'deudores_iddeudores');
	}

	public function gestiones()
	{
		return $this->belongsTo(\App\Gestion::class, 'gestiones_idgestiones');
	}
}
