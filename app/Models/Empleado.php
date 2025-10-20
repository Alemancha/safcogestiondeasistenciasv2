<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'tb_empleado';
    protected $primaryKey = 'IdEmpleado';
    protected $fillable = [
        'IdContrato',
        'IdUser',
        'NomEmp',
        'ApellidoEmp',
        'Qr_code',
        'Area',
        'Tarea',        // <-- ¡Agrega esto!
        'FechaIngreso',
        'Duracion',
        'FondoPensiones',
        'Telefono',
        'Estado'
    ];
    private function crearEmpleadoAleatorio($qr)
{
    $nombres = ['Juan', 'Ana', 'Luis', 'Karla', 'Marco', 'Jessica', 'Esteban'];
    $apellidos = ['Pérez', 'Torres', 'García', 'Ramírez', 'Mendoza', 'Soto', 'Zamora'];
    $nombre = $nombres[array_rand($nombres)];
    $apellido = $apellidos[array_rand($apellidos)];
    $tarea = ['Limpieza', 'Administración', 'Ventas', 'Recepción', 'Supervisión', 'Seguridad', 'Almacén'][array_rand([1,2,3,4,5,6,7])];
    $dni = str_pad(rand(10000000, 99999999), 8, '0', STR_PAD_LEFT);

    return \App\Models\Empleado::create([
        'NomEmp' => $nombre,
        'ApellidoEmp' => $apellido,
        'Qr_code' => $qr,
        'Tarea' => $tarea,
        'DNI' => $dni, // Si tu tabla lo acepta. Si no, bórralo
        'Estado' => 1
        // Puedes agregar más si lo deseas
    ]);
}

}
