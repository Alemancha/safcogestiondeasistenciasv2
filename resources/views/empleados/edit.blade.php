@extends('layouts.app')

@section('panel')
<div class="container">
    <h2 class="mb-4"><i class="bi bi-pencil"></i> Editar Empleado</h2>
    <form action="{{ route('empleados.update', $empleado) }}" method="POST" class="row g-3">
        @csrf
        @method('PUT')

        <div class="col-md-6">
            <label class="form-label">Nombres</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-person"></i></span>
                <input type="text" name="NomEmp" class="form-control" value="{{ $empleado->NomEmp }}" required>
            </div>
        </div>
        <div class="col-md-6">
            <label class="form-label">Apellidos</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-person-vcard"></i></span>
                <input type="text" name="ApellidoEmp" class="form-control" value="{{ $empleado->ApellidoEmp }}" required>
            </div>
        </div>
        <!-- AVATAR - Selector visual -->
        <div class="col-md-6">
            <label class="form-label">Avatar</label>
            <div class="d-flex gap-3 flex-wrap">
                <label class="text-center">
                    <input type="radio" name="avatar_url" value="https://randomuser.me/api/portraits/men/32.jpg"
                        {{ old('avatar_url', $empleado->avatar_url ?? '') == 'https://randomuser.me/api/portraits/men/32.jpg' ? 'checked' : '' }}>
                    <img src="https://randomuser.me/api/portraits/men/32.jpg" class="rounded-circle border border-2" width="48" height="48">
                    <div style="font-size:0.85rem;">Hombre 1</div>
                </label>
                <label class="text-center">
                    <input type="radio" name="avatar_url" value="https://randomuser.me/api/portraits/women/32.jpg"
                        {{ old('avatar_url', $empleado->avatar_url ?? '') == 'https://randomuser.me/api/portraits/women/32.jpg' ? 'checked' : '' }}>
                    <img src="https://randomuser.me/api/portraits/women/32.jpg" class="rounded-circle border border-2" width="48" height="48">
                    <div style="font-size:0.85rem;">Mujer 1</div>
                </label>
                <label class="text-center">
                    <input type="radio" name="avatar_url" value="https://randomuser.me/api/portraits/men/52.jpg"
                        {{ old('avatar_url', $empleado->avatar_url ?? '') == 'https://randomuser.me/api/portraits/men/52.jpg' ? 'checked' : '' }}>
                    <img src="https://randomuser.me/api/portraits/men/52.jpg" class="rounded-circle border border-2" width="48" height="48">
                    <div style="font-size:0.85rem;">Hombre 2</div>
                </label>
                <label class="text-center">
                    <input type="radio" name="avatar_url" value="https://randomuser.me/api/portraits/women/52.jpg"
                        {{ old('avatar_url', $empleado->avatar_url ?? '') == 'https://randomuser.me/api/portraits/women/52.jpg' ? 'checked' : '' }}>
                    <img src="https://randomuser.me/api/portraits/women/52.jpg" class="rounded-circle border border-2" width="48" height="48">
                    <div style="font-size:0.85rem;">Mujer 2</div>
                </label>
            </div>
        </div>
        <div class="col-md-6">
            <label class="form-label">Área</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-building"></i></span>
                <input type="text" name="Area" class="form-control" value="{{ $empleado->Area }}">
            </div>
        </div>
        <div class="col-md-6">
            <label class="form-label">Fecha de Ingreso</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-calendar-date"></i></span>
                <input type="date" name="FechaIngreso" class="form-control" value="{{ $empleado->FechaIngreso }}">
            </div>
        </div>
        <div class="col-md-6">
            <label class="form-label">Duración</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-clock"></i></span>
                <input type="text" name="Duracion" class="form-control" value="{{ $empleado->Duracion }}">
            </div>
        </div>
        <div class="col-md-6">
            <label class="form-label">Fondo de Pensiones</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-cash-stack"></i></span>
                <select name="FondoPensiones" class="form-select">
                    <option value="">-- Selecciona --</option>
                    <option value="ONP" {{ $empleado->FondoPensiones == 'ONP' ? 'selected' : '' }}>ONP</option>
                    <option value="AFP" {{ $empleado->FondoPensiones == 'AFP' ? 'selected' : '' }}>AFP</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <label class="form-label">Teléfono</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                <input type="text" name="Telefono" class="form-control" value="{{ $empleado->Telefono }}">
            </div>
        </div>
        <div class="col-12 mt-3">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-arrow-repeat"></i> Actualizar
            </button>
            <a href="{{ route('empleados.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Cancelar
            </a>
        </div>
    </form>
</div>
@endsection
