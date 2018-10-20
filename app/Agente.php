<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idagentes
 * @property int $idsupervisores
 * @property string $rut
 * @property string $nombre
 * @property string $created_at
 * @property string $updated_at
 * @property Supervisore $supervisore
 */
class Agente extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idagentes';

    /**
     * @var array
     */
    protected $fillable = ['idsupervisores', 'rut', 'nombre', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function supervisore()
    {
        return $this->belongsTo('App\Supervisore', 'idsupervisores', 'idsupervisores');
    }
}
