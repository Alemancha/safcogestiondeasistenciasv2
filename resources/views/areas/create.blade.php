@extends('layouts.app')
@section('panel')
<div class="container py-3">
    <div class="card shadow-lg border-0 mx-auto" style="max-width:700px; border-radius: 2rem; background:rgba(255,255,255,0.98)">
        <div class="card-body px-4 py-4">
            <div class="d-flex align-items-center mb-3">
                <div class="me-2" style="background:#eaf1fa; border-radius:50%; width:48px; height:48px; display:flex; align-items:center; justify-content:center;">
                    <i class="bi bi-plus-circle" style="font-size:2rem; color:#219653;"></i>
                </div>
                <h2 class="fw-bold mb-0" style="color:#219653;">Nueva Área</h2>
            </div>
            <hr class="mb-4 mt-2" style="opacity:.10;">
            <form action="{{ route('areas.store') }}" method="POST" class="row g-4">
                @csrf
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Nombre Área</label>
                    <div class="input-group shadow-sm">
                        <span class="input-group-text bg-light rounded-start" style="border-right:0;">
                            <i class="bi bi-building"></i>
                        </span>
                        <input type="text" class="form-control rounded-end" name="NombreArea" required style="border-left:0;" placeholder="Ej. Finanzas">
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Código Área</label>
                    <div class="input-group shadow-sm">
                        <span class="input-group-text bg-light rounded-start" style="border-right:0;">
                            <i class="bi bi-upc-scan"></i>
                        </span>
                        <input type="text" class="form-control rounded-end" name="CodigoArea" style="border-left:0;" placeholder="Ej. FZ001">
                    </div>
                </div>
                <div class="col-12">
                    <label class="form-label fw-semibold">Descripción</label>
                    <div class="input-group shadow-sm">
                        <span class="input-group-text bg-light rounded-start" style="border-right:0;">
                            <i class="bi bi-card-text"></i>
                        </span>
                        <textarea class="form-control rounded-end" name="Descripcion" rows="2" style="border-left:0;" placeholder="Opcional"></textarea>
                    </div>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Estado</label>
                    <div class="input-group shadow-sm">
                        <span class="input-group-text bg-light rounded-start" style="border-right:0;">
                            <i class="bi bi-toggle-on"></i>
                        </span>
                        <select class="form-select rounded-end" name="Estado" style="border-left:0;">
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 mt-3 d-flex justify-content-end gap-2">
                    <button class="btn rounded-pill px-4" style="background:#219653;border:none;font-weight:500;color:#fff;">
                        <i class="bi bi-check-circle me-1"></i> Guardar
                    </button>
                    <a href="{{ route('areas.index') }}" class="btn btn-outline-secondary rounded-pill px-4" style="font-weight:500;">
                        <i class="bi bi-arrow-left me-1"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
    .input-group:focus-within { box-shadow: 0 0 0 2px #21965333; }
    .form-control:focus, .form-select:focus { border-color:#219653; box-shadow:0 0 0 0.1rem #21965333;}
</style>
@endsection
