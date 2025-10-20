@extends('layouts.app')
@section('panel')
<div class="container py-3">
    <div class="card border-0 shadow-lg rounded-4" style="max-width:1100px; margin:auto;">
        <div class="card-body px-4 py-4">
            {{-- Botones de acción arriba --}}
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h3 class="fw-bold mb-0" style="color:#19bb86;">
                    <i class="bi bi-clipboard-check"></i> Listado de Asistencia
                </h3>
                <div class="d-flex gap-2">
                    <a href="{{ route('asistencias.export.pdf') }}" target="_blank" class="btn btn-outline-secondary rounded-3 px-4">
                        <i class="bi bi-file-earmark-pdf"></i> PDF
                    </a>
                    <a href="{{ route('asistencias.create') }}"
                       class="btn rounded-pill px-4 shadow-sm"
                       style="background:#19bb86; color:#fff; font-weight:600;">
                        <i class="bi bi-plus-circle"></i> Registrar Asistencia
                    </a>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mt-2 mb-4" role="alert">
                    <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- Filtros superiores (aquí puedes habilitarlos cuando quieras) --}}
            <div class="row g-2 align-items-end mb-3">
                <div class="col-auto">
                    <label class="mb-1">Fecha - Hora inicio</label>
                    <input type="date" class="form-control" disabled>
                </div>
                <div class="col-auto">
                    <label class="mb-1">Fecha - Hora fin</label>
                    <input type="date" class="form-control" disabled>
                </div>
                <div class="col-auto">
                    <button class="btn btn-dark" style="background:#6842fa;" disabled>Mostrar</button>
                </div>
                <div class="col ms-auto">
                    <label class="mb-1">Buscar Empleado</label>
                    <div class="input-group">
                        <form method="GET" action="{{ route('asistencias.index') }}" class="input-group">
    <input type="text" class="form-control" name="q" value="{{ request('q') }}" placeholder="Empleado...">
    <button class="btn btn-outline-secondary" type="submit">
        <i class="bi bi-search"></i>
    </button>
</form>
                    </div>
                </div>
            </div>

            {{-- TABLA --}}
            <div class="table-responsive">
                <table class="table align-middle table-hover mb-0" style="background: #f9fafb; border-radius:1rem; overflow:hidden;">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Código</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Tipo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($asistencias as $a)
                        <tr>
                            <td>{{ $a->id }}</td>
                            <td>{{ $a->codigo_qr }}</td>
                            <td>{{ $a->fecha }}</td>
                            <td>{{ $a->hora }}</td>
                            <td>
                                @if($a->tipo_marcacion == 'Temprano')
                                    <span class="badge bg-success bg-opacity-10 text-success border px-3">Temprano</span>
                                @elseif($a->tipo_marcacion == 'Tarde')
                                    <span class="badge bg-danger bg-opacity-10 text-danger border px-3">Tarde</span>
                                @else
                                    <span class="badge bg-secondary bg-opacity-10 text-secondary border px-3">Normal</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">No hay asistencias registradas.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-2" style="font-size:.95rem;color:#888;">
                Mostrando {{ $asistencias->count() }} registros
            </div>
        </div>
    </div>
</div>
@endsection
