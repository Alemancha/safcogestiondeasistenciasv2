<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// 1. Login público
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

// 2. Proceso login validando contra la tabla de usuarios
Route::post('/login', [AuthController::class, 'login'])->name('login.custom');

// 3. Logout (cerrar sesión)
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// 4. TODAS las rutas protegidas
Route::middleware(['checklogin'])->group(function () {
    // Dashboard
    Route::get('/', fn() => redirect('/dashboard'));
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
    // Todos tus CRUDs aquí
    Route::resource('empleados', App\Http\Controllers\EmpleadoController::class);
    Route::resource('cargos', App\Http\Controllers\CargoController::class);
    Route::resource('areas', App\Http\Controllers\AreaController::class);
    Route::resource('documentos', App\Http\Controllers\DocumentoController::class);
    Route::resource('contratos', App\Http\Controllers\ContratoController::class);
    Route::resource('asistencias', App\Http\Controllers\AsistenciaController::class);
    Route::resource('pagos', App\Http\Controllers\PagoController::class);
    Route::resource('usuarios', App\Http\Controllers\UsuarioController::class);
});

Route::resource('asistencias', App\Http\Controllers\AsistenciaController::class);

Route::get('/asistencias/export/pdf', [App\Http\Controllers\AsistenciaController::class, 'exportPdf'])->name('asistencias.export.pdf');
Route::get('empleados/export/pdf', [App\Http\Controllers\EmpleadoController::class, 'exportPdf'])->name('empleados.export.pdf');

Route::get('pagos/{pago}/boleta', [App\Http\Controllers\PagoController::class, 'boleta'])->name('pagos.boleta');
Route::get('pagos/export/pdf', [App\Http\Controllers\PagoController::class, 'exportPdf'])->name('pagos.export.pdf');
