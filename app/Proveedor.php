<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idproveedores
 * @property string $rut
 * @property string $razon_social
 * @property string $created_at
 * @property string $updated_at
 * @property ProveedoresDocumento[] $proveedoresDocumentos
 * @property Supervisore[] $supervisores
 */
class Proveedor extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'proveedores';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idproveedores';

    /**
     * @var array
     */
    protected $fillable = ['rut', 'razon_social', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function proveedoresDocumentos()
    {
        return $this->hasMany('App\ProveedoresDocumento', 'idproveedores', 'idproveedores');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function supervisores()
    {
        return $this->hasMany('App\Supervisore', 'idproveedores', 'idproveedores');
    }
}
