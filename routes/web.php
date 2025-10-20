<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// 1. Login público
Route::get('/login', function () {
    return view('login');
})->name('login');

// 2. Proceso login simple (usuario fijo)
Route::post('/login', function (Request $request) {
    $validUser = 'admin@admin.com'; // Usuario permitido
    $validPass = '12345678';        // Contraseña permitida

    if (
        $request->input('email') === $validUser &&
        $request->input('password') === $validPass
    ) {
        session(['user' => $validUser]);
        return redirect()->route('dashboard');
    } else {
        return back()->with('error', 'Usuario o contraseña incorrectos');
    }
})->name('login.custom');

// 3. Logout (cerrar sesión)
Route::get('/logout', function () {
    session()->forget('user');
    return redirect()->route('login');
})->name('logout');

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
