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

	protected $casts = [
		'carteras_idcarteras' => 'int',
		'contacto_directo' => 'int',
		'contacto_indirecto' => 'int',
		'sin_contacto' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'carteras_idcarteras',
		'codigo',
		'descripcion',
		'contacto_directo',
		'contacto_indirecto',
		'sin_contacto',
		'status'
	];

	public function cartera()
	{
		return $this->belongsTo(\App\Cartera::class, 'carteras_idcarteras');
	}

	public function deudores()
	{
		return $this->belongsToMany(\App\Deudore::class, 'deudores_gestiones', 'gestiones_idgestiones', 'deudores_iddeudores')
					->withPivot('iddeudoresgestiones', 'users_id', 'carteras_idcarteras', 'respuestas_idrespuesta', 'idrespuestas_detalles', 'deudores_correos_id', 'deudores_telefonos_id', 'fecha', 'fecha_futura', 'idgestion_futura', 'observacion', 'mes', 'ano', 'compromiso', 'contacto_directo', 'contacto_indirecto', 'sin_contacto')
					->withTimestamps();
	}

	public function respuestas()
	{
		return $this->hasMany(\App\Respuesta::class, 'gestiones_idgestiones');
	}
}


