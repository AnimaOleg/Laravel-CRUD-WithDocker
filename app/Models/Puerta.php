<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puerta extends Model
{
    use HasFactory;

    // Oleg - Evitar Asignación masiva - Para evitar enviar valor al atributo 'is_admin' y otorgarse permisos
    protected $fillable = [
        'nombre',
        'status',
        'material',
        'descripcion',
        'precio',
        'due_date'
    ];
}
