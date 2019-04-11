<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 11 Apr 2019 05:50:13 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Regione
 * 
 * @property int $idregion
 * @property string $region
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $provincias
 *
 * @package App
 */
class Region extends Eloquent
{
	protected $table = 'regiones';

	protected $primaryKey = 'idregion';

	protected $fillable = [
		'region'
	];

	public function provincias()
	{
		return $this->hasMany(\App\Provincia::class, 'idregion');
	}
}
