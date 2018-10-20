<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idprovincias
 * @property int $idregion
 * @property string $provincia
 * @property string $created_at
 * @property string $updated_at
 * @property Regione $regione
 * @property Comuna[] $comunas
 */
class Provincia extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idprovincias';

    /**
     * @var array
     */
    protected $fillable = ['idregion', 'provincia', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function regione()
    {
        return $this->belongsTo('App\Regione', 'idregion', 'idregion');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comunas()
    {
        return $this->hasMany('App\Comuna', 'idprovincias', 'idprovincias');
    }
}
