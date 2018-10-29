<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idproveedores
 * @property int $rut
 * @property string $rut_dv
 * @property string $razon_social
 * @property string $created_at
 * @property string $updated_at
 * @property Empleado[] $empleados
 * @property ProveedoresDocumento[] $proveedoresDocumentos
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
    protected $fillable = ['rut', 'rut_dv', 'razon_social', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function empleados()
    {
        return $this->hasMany('App\Empleado', 'idproveedores', 'idproveedores');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function documentos()
    {
        return $this->belongsToMany('App\Documento', 'proveedores_documentos', 'idproveedores', 'iddocumentos')->withTimestamps();
    }
}
