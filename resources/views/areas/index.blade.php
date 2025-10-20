@extends('layouts.app')
@section('panel')
<style>
    /* Hover animación fila */
    .table-hover tbody tr:hover {
        background-color: #f1f7fa !important;
        transition: background 0.2s;
    }
    /* Hover animación botón */
    .btn-action:hover {
        transform: scale(1.08);
        box-shadow: 0 3px 14px -5px #13b16d55;
        transition: all .18s;
    }
    .btn-action:active { transform: scale(1.01);}
</style>
<div class="container py-5" style="background:#f7f8fa; min-height: 100vh;">
    <div class="mx-auto" style="max-width:1100px;">
        <div class="card border-0 shadow-lg rounded-4" style="overflow:hidden;">
            <div class="card-body px-5 py-4">
                <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-buildings" style="font-size:2rem;color:#13b16d;"></i>
                        <span class="fs-2 fw-bold" style="color:#13b16d;">Áreas</span>
                    </div>
                    <a href="{{ route('areas.create') }}" class="btn btn-success rounded-pill px-4 shadow-sm" style="font-size:1.1rem;font-weight:600;">
                        <i class="bi bi-plus-circle"></i> Registrar Área
                    </a>
                </div>
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show mb-4" role="alert" style="font-size:1.05rem;">
                        <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0" style="background:#fff;">
                        <thead>
                            <tr style="background:#f8fafc;">
                                <th class="text-center" style="width:65px;">ID</th>
                                <th class="text-center">Código</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center" style="width:120px;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($areas as $area)
                            <tr>
                                <td class="text-center fw-semibold text-secondary">{{ $area->Idarea }}</td>
                                <td class="text-center">
                                    <span class="badge bg-light text-primary border px-3" style="font-size:1rem;">{{ $area->CodigoArea }}</span>
                                </td>
                                <td class="fw-semibold" style="color:#222;">{{ $area->NombreArea }}</td>
                                <td style="color:#333;">{{ $area->Descripcion }}</td>
                                <td class="text-center">
                                    @if($area->Estado)
                                        <span class="badge rounded-pill d-inline-flex align-items-center gap-1" style="background:#d1fae5; color:#13b16d; font-size:1rem; font-weight:500;">
                                            <i class="bi bi-check-circle-fill" style="font-size:1.2rem;"></i> Activo
                                        </span>
                                    @else
                                        <span class="badge rounded-pill d-inline-flex align-items-center gap-1" style="background:#fee2e2; color:#e11d48; font-size:1rem; font-weight:500;">
                                            <i class="bi bi-x-circle-fill" style="font-size:1.2rem;"></i> Inactivo
                                        </span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('areas.edit', $area->Idarea) }}" 
                                        class="btn btn-sm btn-outline-primary rounded-circle me-2 btn-action" 
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
                                        <i class="bi bi-pencil" style="font-size:1.2rem;"></i>
                                    </a>
                                    <form action="{{ route('areas.destroy', $area->Idarea) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Eliminar esta área?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger rounded-circle btn-action" 
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar">
                                            <i class="bi bi-trash" style="font-size:1.2rem;"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">No hay áreas registradas.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if(method_exists($areas, 'links'))
                <div class="d-flex justify-content-end mt-4">
                    {{ $areas->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

{{-- Activa tooltips de Bootstrap --}}
@push('scripts')
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
@endpush

@endsection
