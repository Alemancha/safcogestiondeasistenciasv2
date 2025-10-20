@extends('layouts.app')

@section('title', 'Nuevo Empleado | SAFCO')

@section('panel')
<style>
    .crm-green {
        color: #27ae60 !important; /* Verde corporativo */
    }
    .btn-crm-green {
        background: #27ae60 !important;
        color: #fff !important;
        border: none;
        font-weight: 600;
    }
    .btn-crm-green:hover, .btn-crm-green:focus {
        background: #219150 !important;
        color: #fff !important;
    }
</style>
<div class="container-fluid px-2 py-4">
    <div class="card mx-auto shadow-lg border-0" style="max-width: 1100px; border-radius:2rem;">
        <div class="card-header bg-white border-0 rounded-top-4">
            <h3 class="fw-bold mb-0 crm-green">
                <i class="bi bi-person-plus"></i> Nuevo Empleado
            </h3>
        </div>
        <div class="card-body bg-light rounded-bottom-4">
            <form action="{{ route('empleados.store') }}" method="POST" autocomplete="off">
                @csrf
                <div class="row g-4">
                    <!-- Nombres -->
                    <div class="col-md-6">
                        <label for="NomEmp" class="form-label fw-semibold">Nombres</label>
                        <div class="input-group">
                            <span class="input-group-text bg-success bg-opacity-10"><i class="bi bi-person"></i></span>
                            <input type="text" class="form-control rounded-end" id="NomEmp" name="NomEmp" value="{{ old('NomEmp') }}" required>
                        </div>
                    </div>
                    <!-- Apellidos -->
                    <div class="col-md-6">
                        <label for="ApellidoEmp" class="form-label fw-semibold">Apellidos</label>
                        <div class="input-group">
                            <span class="input-group-text bg-success bg-opacity-10"><i class="bi bi-person-vcard"></i></span>
                            <input type="text" class="form-control rounded-end" id="ApellidoEmp" name="ApellidoEmp" value="{{ old('ApellidoEmp') }}" required>
                        </div>
                    </div>
                    <!-- DNI -->
                    <div class="col-md-6">
                        <label for="DNI" class="form-label fw-semibold">DNI</label>
                        <div class="input-group">
                            <span class="input-group-text bg-success bg-opacity-10"><i class="bi bi-credit-card-2-front"></i></span>
                            <input type="text" class="form-control rounded-end" id="DNI" name="DNI" maxlength="12" value="{{ old('DNI', $empleado->DNI ?? '') }}" required>
                        </div>
                    </div>
                    <!-- Código QR -->
                    <div class="col-md-6">
                        <label for="Qr_code" class="form-label fw-semibold">Código QR</label>
                        <div class="input-group">
                            <span class="input-group-text bg-success bg-opacity-10"><i class="bi bi-qr-code"></i></span>
                            <input type="text" class="form-control rounded-end" id="Qr_code" name="Qr_code" value="{{ old('Qr_code', $empleado->Qr_code ?? '') }}">
                        </div>
                    </div>
                    <!-- Área -->
                    <div class="col-md-6">
                        <label for="Area" class="form-label fw-semibold">Área</label>
                        <div class="input-group">
                            <span class="input-group-text bg-success bg-opacity-10"><i class="bi bi-diagram-3"></i></span>
                            <input type="text" class="form-control rounded-end" id="Area" name="Area" value="{{ old('Area') }}">
                        </div>
                    </div>
                    <!-- Tarea -->
<div class="col-md-6">
    <label for="Tarea" class="form-label fw-semibold">Tarea</label>
    <div class="input-group">
        <span class="input-group-text bg-success bg-opacity-10"><i class="bi bi-list-task"></i></span>
        <input type="text" class="form-control rounded-end" id="Tarea" name="Tarea" value="{{ old('Tarea') }}" placeholder="Ej: Reportar ventas">
    </div>
</div>

                    <!-- Fecha de Ingreso -->
                    <div class="col-md-6">
                        <label for="FechaIngreso" class="form-label fw-semibold">Fecha de Ingreso</label>
                        <div class="input-group">
                            <span class="input-group-text bg-success bg-opacity-10"><i class="bi bi-calendar-event"></i></span>
                            <input type="date" class="form-control rounded-end" id="FechaIngreso" name="FechaIngreso" value="{{ old('FechaIngreso') }}">
                        </div>
                    </div>
                    <!-- Teléfono -->
                    <div class="col-md-6">
                        <label for="Telefono" class="form-label fw-semibold">Teléfono</label>
                        <div class="input-group">
                            <span class="input-group-text bg-success bg-opacity-10"><i class="bi bi-telephone"></i></span>
                            <input type="text" class="form-control rounded-end" id="Telefono" name="Telefono" value="{{ old('Telefono') }}">
                        </div>
                    </div>
                    <!-- Fondo de Pensiones -->
                    <div class="col-md-6">
                        <label for="FondoPensiones" class="form-label fw-semibold">Fondo de Pensiones</label>
                        <div class="input-group">
                            <span class="input-group-text bg-success bg-opacity-10"><i class="bi bi-piggy-bank"></i></span>
                            <select class="form-select rounded-end" id="FondoPensiones" name="FondoPensiones">
                                <option value="">Seleccionar</option>
                                <option value="AFP" {{ old('FondoPensiones') == 'AFP' ? 'selected' : '' }}>AFP</option>
                                <option value="ONP" {{ old('FondoPensiones') == 'ONP' ? 'selected' : '' }}>ONP</option>
                            </select>
                        </div>
                    </div>
                    <!-- Estado -->
                    <div class="col-md-6">
                        <label for="Estado" class="form-label fw-semibold">Estado</label>
                        <div class="input-group">
                            <span class="input-group-text bg-success bg-opacity-10"><i class="bi bi-check-circle"></i></span>
                            <select class="form-select rounded-end" id="Estado" name="Estado" required>
                                <option value="1" {{ old('Estado', '1') == '1' ? 'selected' : '' }}>Activo</option>
                                <option value="0" {{ old('Estado') == '0' ? 'selected' : '' }}>Inactivo</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end gap-2 mt-4">
                    <button type="submit" class="btn btn-crm-green px-4 rounded-pill fw-bold shadow-sm">
                        <i class="bi bi-check-circle"></i> Guardar
                    </button>
                    <a href="{{ route('empleados.index') }}" class="btn btn-outline-secondary px-4 rounded-pill">
                        <i class="bi bi-arrow-left"></i> Regresar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
