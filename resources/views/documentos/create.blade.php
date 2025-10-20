@extends('layouts.app')
@section('panel')
<div class="container py-4">
    <div class="d-flex align-items-center mb-4">
        <h3 class="fw-bold mb-0" style="color:#2962ff;">
            <i class="bi bi-file-earmark-plus me-2"></i> Nuevo Documento
        </h3>
        <a href="{{ route('documentos.index') }}" class="btn btn-link ms-3" style="color:#2962ff; font-weight:500;">Volver</a>
    </div>
    <div class="card shadow-lg border-0 mx-auto" style="max-width:1200px; border-radius:2rem;">
        <div class="card-body px-5 py-4">
            <form method="POST" action="{{ route('documentos.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row align-items-end g-4">
                    <div class="col-md-5">
                        <label class="form-label fw-semibold">Nombre</label>
                        <div class="input-group shadow-sm">
                            <span class="input-group-text bg-light border-0 rounded-start">
                                <i class="bi bi-type-bold" style="color:#2962ff;"></i>
                            </span>
                            <input type="text" class="form-control border-0 rounded-end" name="nombre" required placeholder="Ej. Contrato Laboral">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label class="form-label fw-semibold">Archivo (PDF, DOC, etc)</label>
                        <div class="input-group shadow-sm">
                            <span class="input-group-text bg-light border-0 rounded-start">
                                <i class="bi bi-paperclip" style="color:#2962ff;"></i>
                            </span>
                            <input type="file" class="form-control border-0 rounded-end" name="archivo" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.txt">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label fw-semibold">Estado</label>
                        <div class="input-group shadow-sm">
                            <span class="input-group-text bg-light border-0 rounded-start">
                                <i class="bi bi-toggle-on" style="color:#2962ff;"></i>
                            </span>
                            <select name="estado" class="form-select border-0 rounded-end">
                                <option value="1" selected>Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label class="form-label fw-semibold">Imagen (opcional)</label>
                        <div class="input-group shadow-sm">
                            <span class="input-group-text bg-light border-0 rounded-start">
                                <i class="bi bi-image" style="color:#2962ff;"></i>
                            </span>
                            <input type="file" class="form-control border-0 rounded-end" name="imagen" accept="image/*">
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end pt-2">
                        <button class="btn btn-primary rounded-pill px-5 py-2" style="background:#2962ff; border:none; font-weight:500;">
                            <i class="bi bi-check-circle me-1"></i> Guardar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
.input-group:focus-within { box-shadow: 0 0 0 2px #2962ff22; }
.form-control:focus, .form-select:focus { border-color:#2962ff; box-shadow:0 0 0 0.1rem #2962ff33;}
</style>
@endsection
