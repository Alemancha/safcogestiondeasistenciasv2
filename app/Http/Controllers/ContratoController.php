<?php

// app/Http/Controllers/ContratoController.php
namespace App\Http\Controllers;

use App\Models\Contrato;
use Illuminate\Http\Request;

class ContratoController extends Controller
{
    public function index()
    {
        $contratos = Contrato::all();
        return view('contratos.index', compact('contratos'));
    }

    public function create()
    {
        return view('contratos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Horario' => 'required|string|max:50',
            'Turno' => 'required|string|max:20',
            'PeriodoContr' => 'nullable|string|max:50',
            'Fecha_inicioContr' => 'nullable|date',
            'Fecha_FinContr' => 'nullable|date',
            'Fecha_Firma' => 'nullable|date',
            'SueldoContr' => 'nullable|numeric',
            'Moneda' => 'nullable|string|max:3',
            'TipoContrato' => 'nullable|string|max:50',
        ]);
        Contrato::create($request->all());
        return redirect()->route('contratos.index')->with('success', 'Contrato creado correctamente.');
    }

    public function edit($id)
    {
        $contrato = Contrato::findOrFail($id);
        return view('contratos.edit', compact('contrato'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Horario' => 'required|string|max:50',
            'Turno' => 'required|string|max:20',
            'PeriodoContr' => 'nullable|string|max:50',
            'Fecha_inicioContr' => 'nullable|date',
            'Fecha_FinContr' => 'nullable|date',
            'Fecha_Firma' => 'nullable|date',
            'SueldoContr' => 'nullable|numeric',
            'Moneda' => 'nullable|string|max:3',
            'TipoContrato' => 'nullable|string|max:50',
        ]);

        $contrato = Contrato::findOrFail($id);
        $contrato->update($request->all());
        return redirect()->route('contratos.index')->with('success', 'Contrato actualizado correctamente.');
    }

    public function destroy($id)
    {
        Contrato::destroy($id);
        return redirect()->route('contratos.index')->with('success', 'Contrato eliminado correctamente.');
    }
}
