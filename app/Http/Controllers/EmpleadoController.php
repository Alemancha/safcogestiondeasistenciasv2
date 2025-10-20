<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleados = Empleado::all();
        return view('empleados.index', compact('empleados'));
    }

    public function create()
    {
        return view('empleados.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'NomEmp' => 'required|string|max:50',
            'ApellidoEmp' => 'required|string|max:50',
            'Area' => 'nullable|string|max:100',
            'Tarea' => 'nullable|string|max:100', // <--- ¡Agregado!
            'FechaIngreso' => 'nullable|date',
            'Duracion' => 'nullable|string|max:10',
            'FondoPensiones' => 'nullable|in:ONP,AFP',
            'Telefono' => 'nullable|string|max:20',
            'Estado' => 'nullable|numeric', // Opcional, si lo manejas en formulario
        ]);
        Empleado::create($request->all());
        return redirect()->route('empleados.index')->with('success', 'Empleado creado correctamente.');
    }

    public function edit($id)
    {
        $empleado = Empleado::findOrFail($id);
        return view('empleados.edit', compact('empleado'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'NomEmp' => 'required|string|max:50',
            'ApellidoEmp' => 'required|string|max:50',
            'Area' => 'nullable|string|max:100',
            'Tarea' => 'nullable|string|max:100', // <--- ¡Agregado!
            'FechaIngreso' => 'nullable|date',
            'Duracion' => 'nullable|string|max:10',
            'FondoPensiones' => 'nullable|in:ONP,AFP',
            'Telefono' => 'nullable|string|max:20',
            'Estado' => 'nullable|numeric', // Opcional, si lo manejas en formulario
        ]);
        $empleado = Empleado::findOrFail($id);
        $empleado->update($request->all());
        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado.');
    }

    public function destroy($id)
    {
        Empleado::destroy($id);
        return redirect()->route('empleados.index')->with('success', 'Empleado eliminado.');
    }

    public function exportPdf()
    {
        $empleados = Empleado::all();
        $pdf = Pdf::loadView('empleados.pdf', compact('empleados'));
        return $pdf->stream('empleados-lista.pdf');
    }
}
