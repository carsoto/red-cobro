<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 07 Dec 2018 16:10:38 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Gestione
 * 
 * @property int $idgestiones
 * @property string $codigo
 * @property string $descripcion
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $deudores
 * @property \Illuminate\Database\Eloquent\Collection $respuestas
 *
 * @package App
 */
class Gestion extends Eloquent
{
	protected $table = 'gestiones';
	protected $primaryKey = 'idgestiones';

	protected $fillable = [
		'codigo',
		'descripcion'
	];

	public function deudores()
	{
		return $this->belongsToMany(\App\Deudor::class, 'deudores_gestiones', 'gestiones_idgestiones', 'deudores_iddeudores')
					->withPivot('iddeudores_gestiones', 'contacto', 'gestor', 'respuesta', 'detalle', 'observacion', 'anyo', 'mes', 'fecha_gestion')
					->withTimestamps();
	}

	public function respuestas()
	{
		return $this->belongsToMany(\App\Respuesta::class, 'gestiones_respuestas', 'gestiones_idgestiones', 'respuestas_idrespuesta')
					->withPivot('idgestiones_respuestas')
					->orderby('codigo', 'ASC')
					->withTimestamps();
	}
}
