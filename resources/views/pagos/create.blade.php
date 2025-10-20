@extends('layouts.app')

@section('panel')
<style>
    .form-card-sneat {
        background: #fff;
        border-radius: 2rem;
        max-width: 950px;
        margin: 2rem auto;
        padding: 2.5rem 2.5rem 1.5rem 2.5rem;
        box-shadow: 0 6px 24px rgba(80,114,205,0.07);
    }
    .form-sneat-title {
        color: #1976D2;
        font-weight: 700;
        font-size: 2rem;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .form-sneat-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.2rem 2rem;
    }
    .input-group-text {
        background: #f6f7fa;
        border: none;
    }
    .form-label { font-weight: 500; }
    .d-flex.gap-2 { gap: 1rem; }
    @media (max-width: 900px) {
        .form-sneat-grid { grid-template-columns: 1fr; }
    }
</style>

<div class="form-card-sneat">
    <form action="{{ route('pagos.store') }}" method="POST">
        @csrf
        <div class="form-sneat-title mb-4">
            <i class="bi bi-cash-coin"></i> Nuevo Pago
        </div>
        <div class="form-sneat-grid">
            <!-- Columna 1 -->
            <div>
                <label class="form-label">Id Empleado</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
                    <input type="number" name="IdEmpleado" class="form-control" required>
                </div>
                <label class="form-label">Tipo de Pago</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="bi bi-coin"></i></span>
                    <input type="number" name="IdTipoPago" class="form-control" required>
                </div>
                <label class="form-label">Monto</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="bi bi-currency-dollar"></i></span>
                    <input type="number" step="0.01" name="Monto" class="form-control" required>
                </div>
                <label class="form-label">Moneda</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="bi bi-credit-card"></i></span>
                    <input type="text" name="Moneda" class="form-control" maxlength="3" required>
                </div>
            </div>
            <!-- Columna 2 -->
            <div>
                <label class="form-label">Fecha de Pago</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="bi bi-calendar-event"></i></span>
                    <input type="date" name="Fecha_pago" class="form-control" required>
                </div>
                <label class="form-label">Tipo Compensación</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="bi bi-gem"></i></span>
                    <input type="text" name="TipoCompensacion" class="form-control">
                </div>
                <label class="form-label">Observación</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="bi bi-chat-left-text"></i></span>
                    <input type="text" name="Observacion" class="form-control">
                </div>
            </div>
        </div>
        <div class="d-flex gap-2 mt-2 justify-content-start">
            <button type="submit" class="btn btn-primary rounded-pill px-4">
                <i class="bi bi-check-circle"></i> Guardar
            </button>
            <a href="{{ route('pagos.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
                <i class="bi bi-arrow-left"></i> Cancelar
            </a>
        </div>
    </form>
</div>
@endsection
