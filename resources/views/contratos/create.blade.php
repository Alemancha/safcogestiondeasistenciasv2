@extends('layouts.app')

@section('panel')
<div class="container py-4">
    <div class="d-flex align-items-center mb-4">
        <h3 class="fw-bold" style="color: #27ae60;">
            <i class="bi bi-plus-circle"></i> {{ isset($contrato) ? 'Editar Contrato' : 'Nuevo Contrato' }}
        </h3>
    </div>
    <div class="card shadow rounded-4 mx-auto" style="max-width: 1100px; background: #fff; border: none;">
        <div class="card-body py-4">
            <form method="POST" action="{{ isset($contrato) ? route('contratos.update', $contrato->IdContrato) : route('contratos.store') }}">
                @csrf
                @if(isset($contrato)) @method('PUT') @endif
                <div class="row g-4">
                    <!-- Horario -->
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Horario</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-clock"></i></span>
                            <input type="text" name="Horario" class="form-control"
                                   value="{{ old('Horario', $contrato->Horario ?? '') }}"
                                   placeholder="Ej: 08:00 - 17:00" required>
                        </div>
                    </div>
                    <!-- Turno -->
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Turno</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-arrow-repeat"></i></span>
                            <select name="Turno" class="form-select" required>
                                <option value="" disabled selected>Selecciona turno</option>
                                <option value="Mañana" {{ old('Turno', $contrato->Turno ?? '') == 'Mañana' ? 'selected' : '' }}>Mañana</option>
                                <option value="Tarde"  {{ old('Turno', $contrato->Turno ?? '') == 'Tarde'  ? 'selected' : '' }}>Tarde</option>
                                <option value="Noche"  {{ old('Turno', $contrato->Turno ?? '') == 'Noche'  ? 'selected' : '' }}>Noche</option>
                            </select>
                        </div>
                    </div>
                    <!-- Periodo Contrato -->
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Periodo Contrato</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-calendar3"></i></span>
                            <input type="text" name="PeriodoContr" class="form-control"
                                   value="{{ old('PeriodoContr', $contrato->PeriodoContr ?? '') }}"
                                   placeholder="Ej: 6 meses, 1 año, indefinido">
                        </div>
                    </div>
                </div>
                <div class="row g-4 mt-2">
                    <!-- Fecha Inicio -->
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Fecha Inicio</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-calendar-check"></i></span>
                            <input type="date" name="Fecha_inicioContr" class="form-control"
                                   value="{{ old('Fecha_inicioContr', $contrato->Fecha_inicioContr ?? '') }}">
                        </div>
                    </div>
                    <!-- Fecha Fin -->
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Fecha Fin</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-calendar-x"></i></span>
                            <input type="date" name="Fecha_FinContr" class="form-control"
                                   value="{{ old('Fecha_FinContr', $contrato->Fecha_FinContr ?? '') }}">
                        </div>
                    </div>
                    <!-- Fecha Firma -->
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Fecha Firma</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-calendar-event"></i></span>
                            <input type="date" name="Fecha_Firma" class="form-control"
                                   value="{{ old('Fecha_Firma', $contrato->Fecha_Firma ?? '') }}">
                        </div>
                    </div>
                </div>
                <div class="row g-4 mt-2">
                    <!-- Sueldo -->
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Sueldo</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-currency-dollar"></i></span>
                            <input type="number" step="0.01" name="SueldoContr" class="form-control"
                                   value="{{ old('SueldoContr', $contrato->SueldoContr ?? '') }}"
                                   placeholder="Ej: 1500.00">
                        </div>
                    </div>
                    <!-- Moneda -->
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Moneda</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-cash"></i></span>
                            <input type="text" name="Moneda" maxlength="3" class="form-control"
                                   value="{{ old('Moneda', $contrato->Moneda ?? '') }}"
                                   placeholder="Ej: PEN, USD">
                        </div>
                    </div>
                    <!-- Tipo Contrato -->
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Tipo Contrato</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-file-earmark-text"></i></span>
                            <input type="text" name="TipoContrato" class="form-control"
                                   value="{{ old('TipoContrato', $contrato->TipoContrato ?? '') }}"
                                   placeholder="Ej: Indeterminado, Plazo fijo">
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-success px-4 me-2 rounded-pill fw-semibold">
                            <i class="bi bi-save me-1"></i> Guardar
                        </button>
                        <a href="{{ route('contratos.index') }}" class="btn btn-outline-secondary px-4 rounded-pill">
                            <i class="bi bi-arrow-left"></i> Cancelar
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
