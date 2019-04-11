<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 05 Apr 2019 01:25:23 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Role
 * 
 * @property int $id
 * @property string $name
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $users
 *
 * @package App
 */
class Role extends Eloquent
{
	protected $fillable = [
		'name',
		'description'
	];

	public function users()
	{
		return $this->belongsToMany(\App\User::class, 'role_user', 'roles_id', 'users_id')
					->withPivot('id')
					->withTimestamps();
	}
}
