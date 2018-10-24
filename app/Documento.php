<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $iddocumentos
 * @property string $numero
 * @property string $folio
 * @property string $deuda
 * @property string $fecha_emision
 * @property string $fecha_vencimiento
 * @property int $dias_mora
 * @property string $created_at
 * @property string $updated_at
 * @property DeudoresDocumento[] $deudoresDocumentos
 * @property ProveedoresDocumento[] $proveedoresDocumentos
 */
class Documento extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'iddocumentos';

    /**
     * @var array
     */
    protected $fillable = ['numero', 'folio', 'deuda', 'fecha_emision', 'fecha_vencimiento', 'dias_mora', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function deudoresDocumentos()
    {
        return $this->hasMany('App\DeudoresDocumento', 'iddocumentos', 'iddocumentos');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function proveedoresDocumentos()
    {
        return $this->hasMany('App\ProveedoresDocumento', 'iddocumentos', 'iddocumentos');
    }
}
