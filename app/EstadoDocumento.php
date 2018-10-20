<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idestado_documentos
 * @property string $estado
 * @property string $created_at
 * @property string $updated_at
 * @property DeudoresDocumento[] $deudoresDocumentos
 * @property ProveedoresDocumento[] $proveedoresDocumentos
 */
class EstadoDocumento extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idestado_documentos';

    /**
     * @var array
     */
    protected $fillable = ['estado', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function deudoresDocumentos()
    {
        return $this->hasMany('App\DeudoresDocumento', 'idestado_documentos', 'idestado_documentos');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function proveedoresDocumentos()
    {
        return $this->hasMany('App\ProveedoresDocumento', 'idestado_documentos', 'idestado_documentos');
    }
}
