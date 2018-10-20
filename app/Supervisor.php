<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idsupervisores
 * @property int $idproveedores
 * @property string $rut
 * @property string $nombre
 * @property string $created_at
 * @property string $updated_at
 * @property Proveedore $proveedore
 * @property Agente[] $agentes
 */
class Supervisor extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'supervisores';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idsupervisores';

    /**
     * @var array
     */
    protected $fillable = ['idproveedores', 'rut', 'nombre', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function proveedore()
    {
        return $this->belongsTo('App\Proveedore', 'idproveedores', 'idproveedores');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function agentes()
    {
        return $this->hasMany('App\Agente', 'idsupervisores', 'idsupervisores');
    }
}
