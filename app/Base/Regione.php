<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 20 Oct 2018 05:13:06 +0000.
 */

namespace App\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Regione
 * 
 * @property int $idregion
 * @property string $region
 * @property string $cod_postal
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $provincias
 *
 * @package App\Base
 */
class Regione extends Eloquent
{
	protected $primaryKey = 'idregion';
	protected $dateFormat = 'Y-m-d';

	public function provincias()
	{
		return $this->hasMany(\App\Provincia::class, 'idregion');
	}
}
