@extends('layouts.app')

@section('panel')
<div class="container mt-4">
    <div class="card border-0 shadow-lg rounded-4" style="max-width:1200px; margin:auto;">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="fw-bold mb-0" style="color: #ea4335;">
                    <i class="bi bi-briefcase-fill me-2"></i> Cargos
                </h2>
                <a href="{{ route('cargos.create') }}" class="btn btn-danger rounded-pill px-4 shadow-sm">
                    <i class="bi bi-plus-circle"></i> Nuevo Cargo
                </a>
            </div>
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table align-middle table-hover mb-0" style="background: #f9fafb; border-radius:1rem; overflow:hidden;">
                    <thead class="table-light">
                        <tr>
                            <th style="width:50px;">#</th>
                            <th><i class="bi bi-briefcase"></i> Nombre Cargo</th>
                            <th><i class="bi bi-card-text"></i> Descripción</th>
                            <th><i class="bi bi-circle-half"></i> Estado</th>
                            <th class="text-center" style="width:120px;"><i class="bi bi-gear"></i> Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($cargos as $cargo)
                        <tr>
                            <td class="fw-bold text-secondary">{{ $cargo->IdCargo }}</td>
                            <td>{{ $cargo->NombreCargo }}</td>
                            <td>{{ $cargo->DescripcionCargo }}</td>
                            <td>
                                @if($cargo->Estado)
                                    <span class="badge bg-success bg-opacity-10 text-success border px-3">Activo</span>
                                @else
                                    <span class="badge bg-danger bg-opacity-10 text-danger border px-3">Inactivo</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('cargos.edit', $cargo->IdCargo) }}" class="btn btn-sm btn-outline-primary rounded-pill me-1" title="Editar">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('cargos.destroy', $cargo->IdCargo) }}" method="POST" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger rounded-pill" onclick="return confirm('¿Eliminar este cargo?')" title="Eliminar">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">No hay cargos registrados.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
