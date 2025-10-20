<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    use HasFactory;

    protected $table = 'asistencias';

protected $fillable = [
    'codigo_qr',
    'empleado',
    'documento',
    'fecha',
    'hora',
    'tipo_marcacion',
];


}
