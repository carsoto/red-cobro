<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idcomunas
 * @property int $idprovincias
 * @property string $comuna
 * @property string $created_at
 * @property string $updated_at
 * @property Provincia $provincia
 * @property Direccione[] $direcciones
 */
class Comuna extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idcomunas';

    /**
     * @var array
     */
    protected $fillable = ['idprovincias', 'comuna', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function provincia()
    {
        return $this->belongsTo('App\Provincia', 'idprovincias', 'idprovincias');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function direcciones()
    {
        return $this->hasMany('App\Direccione', 'idcomunas', 'idcomunas');
    }
}
