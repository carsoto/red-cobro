<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 11 Apr 2019 05:59:56 +0000.
 */

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	protected $table = 'users';

	protected $casts = [
		'roles_id' => 'int', 'status' => 'int'
	];

	protected $dates = [
		'email_verified_at'
	];

	protected $hidden = [
		'password', 'remember_token'
	];

	protected $fillable = [
		'roles_id','username','name','lastname','email','status','email_verified_at','password','remember_token'
	];

	/*
    |------------------------------------------------------------------------------------
    | Validations
    |------------------------------------------------------------------------------------
    */
    public static function rules($update = false, $id = null)
    {
        $commun = [
        	'username' => 'required|min:9',
            'name' => 'required|min:2',
            'lastname' => 'required|min:2',
            'email'    => "required|email|unique:users,email,$id",
            'password' => 'nullable|confirmed',
        ];

        if ($update) {
            return $commun;
        }

        return array_merge($commun, [
            'email'    => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    public function authorizeRoles($roles)
    {
        if ($this->hasAnyRole($roles)) {
            return true;
        }
        abort(401, 'Esta acción no está autorizada.');
    }

    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }

	public function role()
	{
		return $this->belongsTo(\App\Role::class, 'roles_id');
	}

	public function deudores()
	{
		return $this->hasMany(\App\Deudor::class, 'users_id');
	}

	public function deudores_gestiones()
	{
		return $this->hasMany(\App\DeudoresGestion::class, 'users_id');
	}

	public function carteras()
	{
		return $this->belongsToMany(\App\Cartera::class, 'users_carteras', 'users_id', 'carteras_idcarteras')
					->withPivot('iduserscarteras', 'status')
					->withTimestamps();
	}

	public function hasCartera($id)
    {
        if ($this->carteras()->where('idcarteras', $id)->first()) {
            return true;
        }
        return false;
    }
}
