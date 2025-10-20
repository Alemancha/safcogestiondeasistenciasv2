@extends('layouts.app')
@section('panel')
<div class="container">
    <h3><i class="bi bi-eye"></i> Detalle Área</h3>
    <div class="mb-2"><strong>Nombre:</strong> {{ $area->NombreArea }}</div>
    <div class="mb-2"><strong>Código:</strong> {{ $area->CodigoArea }}</div>
    <div class="mb-2"><strong>Descripción:</strong> {{ $area->Descripcion }}</div>
    <div class="mb-2"><strong>Estado:</strong>
        @if($area->Estado) <span class="badge bg-success">Activo</span>
        @else <span class="badge bg-danger">Inactivo</span> @endif
    </div>
    <a href="{{ route('areas.index') }}" class="btn btn-secondary">Regresar</a>
</div>
@endsection
