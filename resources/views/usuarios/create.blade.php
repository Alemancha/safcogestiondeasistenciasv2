@extends('layouts.app')
@section('panel')
<div class="card shadow-sm mx-auto" style="max-width: 600px;">
    <div class="card-body">
        <h4 class="mb-4"><i class="bi bi-person-plus"></i> Nuevo Usuario</h4>
        <form action="{{ route('usuarios.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-2">
                <label>Nombre</label>
                <input type="text" name="NombreUser" class="form-control" required>
            </div>
            <div class="mb-2">
                <label>Apellido</label>
                <input type="text" name="Apellido" class="form-control" required>
            </div>
            <div class="mb-2">
                <label>Email</label>
                <input type="email" name="Email" class="form-control" required>
            </div>
            <div class="mb-2">
                <label>Contraseña</label>
                <input type="password" name="Password" class="form-control" required>
            </div>
            <div class="mb-2">
                <label>Foto (opcional)</label>
                <input type="file" name="Imagen" class="form-control">
            </div>
            <div class="mb-2">
                <label>Estado</label>
                <select name="Estado" class="form-control">
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>
            </div>
            <button class="btn btn-success"><i class="bi bi-check-circle"></i> Guardar</button>
            <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection



