<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $table = 'tb_cargo';
    protected $primaryKey = 'IdCargo';
    protected $fillable = [
        'NombreCargo',
        'DescripcionCargo',
        'Estado',
    ];
    public $timestamps = false;
}

