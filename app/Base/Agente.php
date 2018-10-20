<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 20 Oct 2018 05:13:04 +0000.
 */

namespace App\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Agente
 * 
 * @property int $idagentes
 * @property int $idsupervisores
 * @property string $rut
 * @property string $nombre
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Supervisore $supervisore
 *
 * @package App\Base
 */
class Agente extends Eloquent
{
	protected $primaryKey = 'idagentes';
	protected $dateFormat = 'Y-m-d';

	protected $casts = [
		'idsupervisores' => 'int'
	];

	public function supervisore()
	{
		return $this->belongsTo(\App\Supervisore::class, 'idsupervisores');
	}
}
