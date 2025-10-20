<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    public function index()
    {
        $cargos = Cargo::all();
        return view('cargos.index', compact('cargos'));
    }

    public function create()
    {
        return view('cargos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'NombreCargo' => 'required|max:50',
            'DescripcionCargo' => 'nullable|max:255',
            'Estado' => 'required|in:0,1',
        ]);
        Cargo::create($request->all());
        return redirect()->route('cargos.index')->with('success', 'Cargo creado correctamente.');
    }

    public function edit($id)
    {
        $cargo = Cargo::findOrFail($id);
        return view('cargos.edit', compact('cargo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'NombreCargo' => 'required|max:50',
            'DescripcionCargo' => 'nullable|max:255',
            'Estado' => 'required|in:0,1',
        ]);
        $cargo = Cargo::findOrFail($id);
        $cargo->update($request->all());
        return redirect()->route('cargos.index')->with('success', 'Cargo actualizado correctamente.');
    }

    public function destroy($id)
    {
        Cargo::destroy($id);
        return redirect()->route('cargos.index')->with('success', 'Cargo eliminado correctamente.');
    }
}
