<?php

// app/Models/Contrato.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $table = 'tb_contrato';
    protected $primaryKey = 'IdContrato';
    public $timestamps = true;

    protected $fillable = [
        'Horario',
        'Turno',
        'PeriodoContr',
        'Fecha_inicioContr',
        'Fecha_FinContr',
        'Fecha_Firma',
        'SueldoContr',
        'Moneda',
        'TipoContrato'
    ];
}
