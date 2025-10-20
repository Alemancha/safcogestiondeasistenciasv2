@extends('layouts.app')



@section('panel')

<div class="container py-3">
    <div class="card shadow-sm border-0 mx-auto" style="border-radius: 2rem; max-width: 550px;">
        <div class="card-body">
            <h3 class="fw-bold mb-3" style="color: #ea4335;">
                <i class="bi bi-pencil-square me-2"></i>Editar Cargo
            </h3>
            <form action="{{ route('cargos.update', $cargo) }}" method="POST" class="row g-3">
                @csrf
                @method('PUT')

                <div class="col-12">
                    <label class="form-label">Nombre Cargo</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-briefcase"></i></span>
                        <input type="text" name="NombreCargo" class="form-control" value="{{ old('NombreCargo', $cargo->NombreCargo) }}" required>
                    </div>
                </div>

                <div class="col-12">
                    <label class="form-label">Descripción</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-card-text"></i></span>
                        <input type="text" name="DescripcionCargo" class="form-control" value="{{ old('DescripcionCargo', $cargo->DescripcionCargo) }}">
                    </div>
                </div>

                <div class="col-12">
                    <label class="form-label">Estado</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-circle-half"></i></span>
                        <select name="Estado" class="form-select" required>
                            <option value="1" {{ old('Estado', $cargo->Estado) == '1' ? 'selected' : '' }}>Activo</option>
                            <option value="0" {{ old('Estado', $cargo->Estado) == '0' ? 'selected' : '' }}>Inactivo</option>
                        </select>
                    </div>
                </div>

                <div class="col-12 mt-2">
                    <button type="submit" class="btn btn-danger rounded-pill px-4">
                        <i class="bi bi-arrow-repeat"></i> Actualizar
                    </button>
                    <a href="{{ route('cargos.index') }}" class="btn btn-outline-secondary rounded-pill ms-2">
                        <i class="bi bi-arrow-left"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
