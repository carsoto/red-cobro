<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idtelefonos
 * @property string $telefono
 * @property string $created_at
 * @property string $updated_at
 * @property DeudoresTelefono[] $deudoresTelefonos
 */
class Telefono extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idtelefonos';

    /**
     * @var array
     */
    protected $fillable = ['telefono', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function deudores()
    {
        return $this->hasMany('App\Deudor', 'deudores_telefonos', 'idtelefonos', 'iddeudores')->withTimestamps();
    }
}
