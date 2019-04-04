<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 04 Apr 2019 03:09:34 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Role
 * 
 * @property int $id
 * @property string $nombre
 * @property string $descripcion
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $usuarios
 *
 * @package App
 */
class Role extends Eloquent
{
	protected $table = 'roles';

	protected $fillable = [
		'nombre',
		'descripcion'
	];

	public function usuarios()
	{
		return $this->belongsToMany(\App\Usuario::class, 'roles_usuarios', 'rol_id')
					->withPivot('id')
					->withTimestamps();
	}
}
