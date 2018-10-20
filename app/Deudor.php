<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $iddeudores
 * @property string $rut
 * @property string $razon_social
 * @property string $created_at
 * @property string $updated_at
 * @property DeudoresCorreo[] $deudoresCorreos
 * @property DeudoresDireccione[] $deudoresDirecciones
 * @property DeudoresDocumento[] $deudoresDocumentos
 * @property DeudoresTelefono[] $deudoresTelefonos
 */
class Deudor extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'deudores';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'iddeudores';

    /**
     * @var array
     */
    protected $fillable = ['rut', 'razon_social', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function deudoresCorreos()
    {
        return $this->hasMany('App\DeudoresCorreo', 'iddeudores', 'iddeudores');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function deudoresDirecciones()
    {
        return $this->hasMany('App\DeudoresDireccione', 'iddeudores', 'iddeudores');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function deudoresDocumentos()
    {
        return $this->hasMany('App\DeudoresDocumento', 'iddeudores', 'iddeudores');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function deudoresTelefonos()
    {
        return $this->hasMany('App\DeudoresTelefono', 'deudores_iddeudores', 'iddeudores');
    }
}
