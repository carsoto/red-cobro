<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 20 Oct 2018 05:13:05 +0000.
 */

namespace App\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PerfilUser
 * 
 * @property int $id
 * @property int $role_id
 * @property int $user_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Base
 */
class PerfilUser extends Eloquent
{
	protected $table = 'perfil_user';
	protected $dateFormat = 'Y-m-d';

	protected $casts = [
		'role_id' => 'int',
		'user_id' => 'int'
	];
}
