<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 06 Nov 2018 21:31:54 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Deudore
 * 
 * @property int $iddeudores
 * @property int $rut
 * @property string $rut_dv
 * @property string $razon_social
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $correos
 * @property \Illuminate\Database\Eloquent\Collection $direcciones
 * @property \Illuminate\Database\Eloquent\Collection $documentos
 * @property \Illuminate\Database\Eloquent\Collection $telefonos
 *
 * @package App
 */
class Deudor extends Eloquent
{
	protected $table = 'deudores';

	protected $primaryKey = 'iddeudores';

	protected $casts = [
		'rut' => 'int'
	];

	protected $fillable = [
		'rut',
		'rut_dv',
		'razon_social'
	];

	public function correos()
	{
		return $this->belongsToMany(\App\Correo::class, 'deudores_correos', 'iddeudores', 'idcorreos_electronicos')
					->withPivot('id', 'activo')
					->withTimestamps();
	}

	public function direcciones()
	{
		return $this->belongsToMany(\App\Direccion::class, 'deudores_direcciones', 'iddeudores', 'iddirecciones')
					->withPivot('id', 'activo')
					->withTimestamps();
	}

	public function documentos()
	{
		return $this->belongsToMany(\App\Documento::class, 'deudores_documentos', 'iddeudores', 'iddocumentos')
					->withPivot('id', 'idestado_documentos')
					->withTimestamps();
	}

	public function gestiones()
	{
		return $this->belongsToMany(\App\Gestion::class, 'deudores_gestiones', 'deudores_iddeudores', 'gestiones_idgestiones')
					->withPivot('iddeudores_gestiones', 'contacto', 'respuesta', 'observacion', 'fecha_gestion')
					->withTimestamps();
	}

	public function telefonos()
	{
		return $this->belongsToMany(\App\Telefono::class, 'deudores_telefonos', 'iddeudores', 'idtelefonos')
					->withPivot('id', 'activo')
					->withTimestamps();
	}
}
