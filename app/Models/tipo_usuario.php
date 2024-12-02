<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    use HasFactory;

    protected $table = 'tipo_usuario';

    protected $primaryKey = 'id_tipo_usuario';

    // Definir si la clave primaria es auto incremental (si es diferente)
    public $incrementing = true;

    // Definir el tipo de la clave primaria (si es diferente a 'int')
    protected $keyType = 'int';

    // Habilitar o deshabilitar los timestamps si no están presentes en la tabla
    public $timestamps = true;

    // Especificar qué atributos se pueden asignar masivamente
    protected $fillable = [
        'id_usuario',
        'tipo',
        'estado',
    ];

    // Especificar qué atributos no se pueden asignar masivamente
    // protected $guarded = [];

    /**
     * Relación con el modelo Usuario.
     * Un tipo de usuario pertenece a un usuario.
     */
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
