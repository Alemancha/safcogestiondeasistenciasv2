<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    public function index()
    {
        $documentos = Documento::all();
        return view('documentos.index', compact('documentos'));
    }

    public function create()
    {
        return view('documentos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'  => 'required|max:100',
            'archivo' => 'nullable|file|max:5120',
            'imagen'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'estado'  => 'required|boolean',
        ]);

        $data = $request->only(['nombre', 'estado']);

        if ($request->hasFile('archivo')) {
            $data['archivo'] = $request->file('archivo')->store('documentos', 'public');
        }
        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store('documentos/img', 'public');
        }

        Documento::create($data);

        return redirect()->route('documentos.index')->with('success', 'Documento creado correctamente.');
    }

    public function edit($id)
    {
        $documento = Documento::findOrFail($id);
        return view('documentos.edit', compact('documento'));
    }

    public function update(Request $request, $id)
    {
        $documento = Documento::findOrFail($id);

        $request->validate([
            'nombre'  => 'required|max:100',
            'archivo' => 'nullable|file|max:5120',
            'imagen'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'estado'  => 'required|boolean',
        ]);

        $data = $request->only(['nombre', 'estado']);

        if ($request->hasFile('archivo')) {
            $data['archivo'] = $request->file('archivo')->store('documentos', 'public');
        }
        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store('documentos/img', 'public');
        }

        $documento->update($data);

        return redirect()->route('documentos.index')->with('success', 'Documento actualizado.');
    }

    public function destroy($id)
    {
        Documento::destroy($id);
        return redirect()->route('documentos.index')->with('success', 'Documento eliminado.');
    }
}
