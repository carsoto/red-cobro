<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $iddirecciones
 * @property int $idcomunas
 * @property string $direccion
 * @property string $complemento
 * @property string $created_at
 * @property string $updated_at
 * @property Comuna $comuna
 * @property DeudoresDireccione[] $deudoresDirecciones
 */
class Direccion extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'direcciones';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'iddirecciones';

    /**
     * @var array
     */
    protected $fillable = ['idcomunas', 'direccion', 'complemento', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function comuna()
    {
        return $this->belongsTo('App\Comuna', 'idcomunas', 'idcomunas')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function deudoresDirecciones()
    {
        return $this->hasMany('App\DeudoresDireccione', 'iddirecciones', 'iddirecciones');
    }
}
