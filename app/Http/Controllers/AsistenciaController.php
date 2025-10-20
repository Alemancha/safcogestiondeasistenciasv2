<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class AsistenciaController extends Controller
{
    // Listar asistencias con filtro por nombre/apellido de empleado
    public function index(Request $request)
    {
        $query = Asistencia::query();

        if ($request->filled('q')) {
            // Busca empleados cuyo nombre o apellido coincida
            $empleados = Empleado::where('NomEmp', 'like', '%'.$request->q.'%')
                ->orWhere('ApellidoEmp', 'like', '%'.$request->q.'%')
                ->pluck('Qr_code'); // Usa el nombre exacto de la columna!

            // Filtra asistencias de esos empleados por su código QR
            $query->whereIn('codigo_qr', $empleados);
        }

        $asistencias = $query->orderBy('fecha', 'desc')->orderBy('hora', 'desc')->get();

        return view('asistencias.index', compact('asistencias'));
    }

    // Mostrar formulario de registro (simulación QR)
    public function create()
    {
        return view('asistencias.create');
    }

    // Guardar registro con hora local de Perú
    public function store(Request $request)
    {
        // Establece la zona horaria de Lima, Perú
        date_default_timezone_set('America/Lima');

        $request->validate([
            'codigo_qr' => 'required|string|max:50',
        ]);

        $now = Carbon::now();
        $hora = $now->format('H:i:s');
        $fecha = $now->toDateString();

        // Lógica para marcar si es temprano/tarde
        $tipo = 'Normal';
        if ($hora < '08:00:00') $tipo = 'Temprano';
        if ($hora > '08:05:00') $tipo = 'Tarde';

        Asistencia::create([
            'codigo_qr' => $request->codigo_qr,
            'fecha' => $fecha,
            'hora' => $hora,
            'tipo_marcacion' => $tipo,
        ]);

        return redirect()->route('asistencias.index')->with('success', 'Asistencia registrada correctamente.');
    }

    // Exportar a PDF
    public function exportPdf()
    {
        $asistencias = Asistencia::orderBy('fecha', 'desc')->orderBy('hora', 'desc')->get();
        $pdf = Pdf::loadView('asistencias.pdf', compact('asistencias'));
        return $pdf->download('asistencias.pdf');
    }

    // Otros métodos CRUD (opcional)
}
