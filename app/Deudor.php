<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 11 Apr 2019 05:50:13 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Deudore
 * 
 * @property int $iddeudores
 * @property int $carteras_idcarteras
 * @property int $users_id
 * @property int $rut
 * @property string $rut_dv
 * @property string $razon_social
 * @property int $en_gestion
 * @property int $compromisos
 * @property int $contactos_directos
 * @property int $contactos_indirectos
 * @property \Carbon\Carbon $fecha_asignacion
 * @property \Carbon\Carbon $fecha_carga
 * @property float $monto_asignacion
 * @property string $ano_asignacion
 * @property string $mes_asignacion
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Cartera $cartera
 * @property \App\User $user
 * @property \Illuminate\Database\Eloquent\Collection $correos
 * @property \Illuminate\Database\Eloquent\Collection $direcciones
 * @property \Illuminate\Database\Eloquent\Collection $gestiones
 * @property \Illuminate\Database\Eloquent\Collection $marcas
 * @property \Illuminate\Database\Eloquent\Collection $telefonos
 * @property \Illuminate\Database\Eloquent\Collection $documentos
 *
 * @package App
 */
class Deudor extends Eloquent
{
	protected $table = 'deudores';

	protected $primaryKey = 'iddeudores';

	protected $casts = [
		'carteras_idcarteras' => 'int',
		'users_id' => 'int',
		'rut' => 'int',
		'en_gestion' => 'int',
		'compromisos' => 'int',
		'contactos_directos' => 'int',
		'contactos_indirectos' => 'int',
		'monto_asignacion' => 'float'
	];

	protected $dates = [
		'fecha_asignacion',
		'fecha_carga'
	];

	protected $fillable = [
		'carteras_idcarteras',
		'users_id',
		'rut',
		'rut_dv',
		'razon_social',
		'en_gestion',
		'compromisos',
		'contactos_directos',
		'contactos_indirectos',
		'fecha_asignacion',
		'fecha_carga',
		'monto_asignacion',
		'ano_asignacion',
		'mes_asignacion'
	];

	public function cartera()
	{
		return $this->belongsTo(\App\Cartera::class, 'carteras_idcarteras');
	}

	public function user()
	{
		return $this->belongsTo(\App\User::class, 'users_id');
	}

	public function correos()
	{
		return $this->belongsToMany(\App\Correo::class, 'deudores_correos', 'iddeudores', 'idcorreos_electronicos')
					->withPivot('id', 'status')
					->withTimestamps();
	}

	public function direcciones()
	{
		return $this->belongsToMany(\App\Direccion::class, 'deudores_direcciones', 'iddeudores', 'iddirecciones')
					->withPivot('id', 'status')
					->withTimestamps();
	}

	public function gestiones()
	{
		return $this->belongsToMany(\App\Gestion::class, 'deudores_gestiones', 'deudores_iddeudores', 'gestiones_idgestiones')
					->withPivot('iddeudoresgestiones', 'users_id', 'carteras_idcarteras', 'respuestas_idrespuesta', 'idrespuestas_detalles', 'deudores_correos_id', 'deudores_telefonos_id', 'fecha', 'fecha_futura', 'idgestion_futura', 'observacion', 'mes', 'ano', 'contacto_directo', 'contacto_indirecto', 'sin_contacto')
					->withTimestamps();
	}

	public function marcas()
	{
		return $this->belongsToMany(\App\Marca::class, 'deudores_marcas', 'iddeudores', 'idmarcas')
					->withPivot('id', 'activo')
					->withTimestamps();
	}

	public function telefonos()
	{
		return $this->belongsToMany(\App\Telefono::class, 'deudores_telefonos', 'iddeudores', 'idtelefonos')
					->withPivot('id', 'status')
					->withTimestamps();
	}

	public function documentos()
	{
		return $this->hasMany(\App\Documento::class, 'deudores_iddeudores');
	}
}
