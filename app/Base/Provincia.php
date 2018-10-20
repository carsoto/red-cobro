<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 20 Oct 2018 05:13:05 +0000.
 */

namespace App\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Provincia
 * 
 * @property int $idprovincias
 * @property int $idregion
 * @property string $provincia
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Regione $regione
 * @property \Illuminate\Database\Eloquent\Collection $comunas
 *
 * @package App\Base
 */
class Provincia extends Eloquent
{
	protected $primaryKey = 'idprovincias';
	protected $dateFormat = 'Y-m-d';

	protected $casts = [
		'idregion' => 'int'
	];

	public function regione()
	{
		return $this->belongsTo(\App\Regione::class, 'idregion');
	}

	public function comunas()
	{
		return $this->hasMany(\App\Comuna::class, 'idprovincias');
	}
}
