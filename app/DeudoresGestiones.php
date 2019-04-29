<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 07 Dec 2018 16:10:10 +0000.
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
 * @property string $detalle
 * @property string $observacion
 * @property int $anyo
 * @property int $mes
 * @property \Carbon\Carbon $fecha_gestion
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
		'gestiones_idgestiones' => 'int',
		'anyo' => 'int',
		'mes' => 'int'
	];

	protected $dates = [
		'fecha_gestion'
	];

	protected $fillable = [
		'deudores_iddeudores',
		'gestor',
		'contacto',
		'gestiones_idgestiones',
		'respuesta',
		'detalle',
		'observacion',
		'anyo',
		'mes',
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
