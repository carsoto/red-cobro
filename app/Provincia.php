<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 06 Nov 2018 21:39:08 +0000.
 */

namespace App;

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
 * @package App
 */
class Provincia extends Eloquent
{
	protected $table = 'provincias';

	protected $primaryKey = 'idprovincias';

	protected $casts = [
		'idregion' => 'int'
	];

	protected $fillable = [
		'idregion',
		'provincia'
	];

	public function regiones()
	{
		return $this->belongsTo(\App\Region::class, 'idregion');
	}

	public function comunas()
	{
		return $this->hasMany(\App\Comuna::class, 'idprovincias');
	}
}
