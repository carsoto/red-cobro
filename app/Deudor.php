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
    public function correos()
    {
        return $this->belongsToMany('App\Correo', 'deudores_correos', 'iddeudores', 'idcorreos_electronicos')->withTimestamps();
    }

    public function direcciones()
    {
        return $this->belongsToMany('App\Direccion', 'deudores_direcciones', 'iddeudores', 'iddirecciones')->withTimestamps();
    }

    public function documentos()
    {
        return $this->belongsToMany('App\Documento', 'deudores_documentos', 'iddeudores', 'iddocumentos')->withTimestamps();
    }

    public function telefonos()
    {
        return $this->belongsToMany('App\Telefono', 'deudores_telefonos', 'iddeudores', 'idtelefonos')->withTimestamps();
    }
}
