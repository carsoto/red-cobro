<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idcorreos_electronicos
 * @property string $correo
 * @property string $created_at
 * @property string $updated_at
 * @property DeudoresCorreo[] $deudoresCorreos
 */
class Correo extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idcorreos_electronicos';

    /**
     * @var array
     */
    protected $fillable = ['correo', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function deudores()
    {
        return $this->hasMany('App\Deudor', 'deudores_correos', 'idcorreos_electronicos', 'iddeudores')->withTimestamps();
    }
}
