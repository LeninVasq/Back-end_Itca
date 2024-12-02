<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo_usuario extends Model
{
    use HasFactory;

    protected $table = 'tipo_usuario';
    protected $primaryKey = 'id_tipo_usuario';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true;

    protected $fillable = [
        'id_usuario',
        'tipo',
        'estado',
    ];


    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
