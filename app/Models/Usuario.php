<?php

// app/Models/Usuario.php
// app/Models/Usuario.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'tb_usuario';
    protected $primaryKey = 'IdUser';
    public $timestamps = false;

    protected $fillable = [
        'NombreUser', 'Apellido', 'Email', 'Password', 'Imagen', 'Estado'
    ];
}


