@extends('layouts.app')
@section('panel')
<div class="container">
    <h3><i class="bi bi-pencil"></i> Editar Área</h3>
    <form action="{{ route('areas.update', $area->Idarea) }}" method="POST" class="row g-3">
        @csrf
        @method('PUT')
        <div class="col-md-6">
            <label class="form-label">Nombre Área</label>
            <input type="text" class="form-control" name="NombreArea" value="{{ $area->NombreArea }}" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Código Área</label>
            <input type="text" class="form-control" name="CodigoArea" value="{{ $area->CodigoArea }}">
        </div>
        <div class="col-12">
            <label class="form-label">Descripción</label>
            <textarea class="form-control" name="Descripcion">{{ $area->Descripcion }}</textarea>
        </div>
        <div class="col-md-4">
            <label class="form-label">Estado</label>
            <select class="form-select" name="Estado">
                <option value="1" {{ $area->Estado ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ !$area->Estado ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>
        <div class="col-12 mt-3">
            <button class="btn btn-primary"><i class="bi bi-arrow-repeat"></i> Actualizar</button>
            <a href="{{ route('areas.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
    