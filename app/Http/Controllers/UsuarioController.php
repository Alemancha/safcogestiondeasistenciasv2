<?php

// app/Http/Controllers/UsuarioController.php
// app/Http/Controllers/UsuarioController.php
// app/Http/Controllers/UsuarioController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index() {
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create() {
        return view('usuarios.create');
    }

    public function store(Request $request) {
        $request->validate([
            'NombreUser' => 'required|max:40',
            'Apellido' => 'required|max:45',
            'Email' => 'required|email|unique:tb_usuario,Email',
            'Password' => 'required|min:6',
            'Imagen' => 'nullable|image|max:2048',
            'Estado' => 'required'
        ]);

        $imagenPath = null;
        if ($request->hasFile('Imagen')) {
            $imagenPath = $request->file('Imagen')->store('usuarios', 'public');
        }

        Usuario::create([
            'NombreUser' => $request->NombreUser,
            'Apellido' => $request->Apellido,
            'Email' => $request->Email,
            'Password' => Hash::make($request->Password),
            'Imagen' => $imagenPath,
            'Estado' => $request->Estado
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario registrado correctamente');
    }

    public function edit($id) {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, $id) {
        $usuario = Usuario::findOrFail($id);

        $request->validate([
            'NombreUser' => 'required|max:40',
            'Apellido' => 'required|max:45',
            'Email' => 'required|email|unique:tb_usuario,Email,' . $id . ',IdUser',
            'Imagen' => 'nullable|image|max:2048',
            'Estado' => 'required'
        ]);

        if ($request->hasFile('Imagen')) {
            $imagenPath = $request->file('Imagen')->store('usuarios', 'public');
            $usuario->Imagen = $imagenPath;
        }

        $usuario->NombreUser = $request->NombreUser;
        $usuario->Apellido = $request->Apellido;
        $usuario->Email = $request->Email;
        if ($request->filled('Password')) {
            $usuario->Password = Hash::make($request->Password);
        }
        $usuario->Estado = $request->Estado;
        $usuario->save();

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado');
    }

    public function destroy($id) {
        Usuario::destroy($id);
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado');
    }
}
