<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'tb_area';
    protected $primaryKey = 'Idarea';
    public $timestamps = false;

    protected $fillable = [
        'NombreArea', 'CodigoArea', 'Descripcion', 'Estado'
    ];
}
