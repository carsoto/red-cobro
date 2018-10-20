<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idregion
 * @property string $region
 * @property string $cod_postal
 * @property string $created_at
 * @property string $updated_at
 * @property Provincia[] $provincias
 */
class Region extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'regiones';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idregion';

    /**
     * @var array
     */
    protected $fillable = ['region', 'cod_postal', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function provincias()
    {
        return $this->hasMany('App\Provincia', 'idregion', 'idregion');
    }
}
