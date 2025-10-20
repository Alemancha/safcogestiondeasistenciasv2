<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $fillable = ['nombre', 'archivo', 'imagen', 'estado'];
}
