@extends('layouts.app')
@section('title', 'Detalle Usuario | SAFCO')
@section('panel')
<div class="container" style="max-width:500px;">
    <div class="card shadow-sm rounded-4">
        <div class="card-body text-center">
            @if($usuario->Imagen)
                <img src="data:image/jpeg;base64,{{ base64_encode($usuario->Imagen) }}" width="110" height="110" class="rounded-circle mb-3 shadow-sm" alt="Foto Usuario">
            @else
                <div class="avatar-sm bg-secondary bg-opacity-25 rounded-circle mb-3 d-inline-flex align-items-center justify-content-center" style="width:110px; height:110px;">
                    <i class="bi bi-person fs-1 text-secondary"></i>
                </div>
            @endif
            <h4 class="fw-bold">{{ $usuario->NombreUser }} {{ $usuario->Apellido }}</h4>
            <div class="text-muted mb-2"><i class="bi bi-envelope"></i> {{ $usuario->Email }}</div>
            <div class="mb-3">
                @if($usuario->Estado)
                    <span class="badge bg-success-subtle text-success rounded-pill px-3">Activo</span>
                @else
                    <span class="badge bg-danger-subtle text-danger rounded-pill px-3">Inactivo</span>
                @endif
            </div>
            <a href="{{ route('usuarios.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Volver</a>
        </div>
    </div>
</div>
@endsection
