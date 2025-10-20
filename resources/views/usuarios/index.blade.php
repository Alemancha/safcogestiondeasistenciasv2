@extends('layouts.app')
@section('panel')

<style>
    .table-hover tbody tr:hover {
        background-color: #f6fafd !important;
        transition: background 0.2s;
    }
    .btn-action:hover {
        transform: scale(1.08);
        box-shadow: 0 3px 14px -5px #17c39744;
        transition: all .18s;
    }
    .btn-action:active { transform: scale(1.01);}
    .avatar-user {
        width:38px; height:38px;
        object-fit:cover; object-position:center;
        border-radius: 50%;
        box-shadow: 0 2px 8px -6px #17c39744;
    }
    .th-id i         { color: #7b8fa1; }
    .th-foto i       { color: #00bfff; }
    .th-nombre i     { color: #2563eb; }
    .th-email i      { color: #fdba08; }
    .th-estado i     { color: #13b16d; }
    .th-acciones i   { color: #e11d48; }
</style>

<div class="container py-5" style="background:#f7f8fa; min-height:100vh;">
    <div class="mx-auto" style="max-width:1200px;">
        <div class="mb-4">
            <div class="d-flex align-items-center gap-2 mb-3">
                <i class="bi bi-people" style="font-size:2rem; color:#17c397;"></i>
                <span class="fs-2 fw-bold" style="color:#17c397;">Usuarios</span>
            </div>
            <a href="{{ route('usuarios.create') }}" class="btn rounded-pill px-4 py-2 fw-semibold"
                style="background:#17c397; color:#fff; font-size:1.1rem; box-shadow:0 2px 10px -6px #17c39744;">
                <i class="bi bi-person-plus"></i> Nuevo Usuario
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert" style="font-size:1.05rem;">
                <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card border-0 shadow-lg rounded-4">
            <div class="card-body px-0 py-0">
                <div class="table-responsive">
                    <table class="table align-middle table-hover table-borderless mb-0" style="background:#fff; border-radius:1rem;">
                        <thead>
                            <tr>
                                <th class="text-center th-id">#</th>
                                <th class="text-center th-foto"><i class="bi bi-person-circle"></i> <span class="fw-bold ms-1">Foto</span></th>
                                <th class="text-center th-nombre"><i class="bi bi-person"></i> <span class="fw-bold ms-1">Nombre</span></th>
                                <th class="text-center th-email"><i class="bi bi-envelope"></i> <span class="fw-bold ms-1">Email</span></th>
                                <th class="text-center th-estado"><i class="bi bi-shield-check"></i> <span class="fw-bold ms-1">Estado</span></th>
                                <th class="text-center th-acciones"><i class="bi bi-gear"></i> <span class="fw-bold ms-1">Acciones</span></th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($usuarios as $u)
                            <tr>
                                <td class="text-center fw-semibold text-secondary">{{ $loop->iteration }}</td>
                                <td class="text-center">
                                    @if($u->Imagen)
                                        <img src="{{ asset('storage/' . $u->Imagen) }}" class="avatar-user" alt="avatar">
                                    @else
                                        <i class="bi bi-person-circle fs-3 text-secondary"></i>
                                    @endif
                                </td>
                                <td class="text-center">{{ $u->NombreUser }} {{ $u->Apellido }}</td>
                                <td class="text-center">{{ $u->Email }}</td>
                                <td class="text-center">
                                    @if($u->Estado)
                                        <span class="badge" style="background:#e0f8ea; color:#13b16d; font-weight:600;">Activo</span>
                                    @else
                                        <span class="badge" style="background:#fee2e2; color:#e11d48; font-weight:600;">Inactivo</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="d-flex gap-1 justify-content-center">
                                        <a href="{{ route('usuarios.edit', $u->IdUser) }}" class="btn btn-sm btn-outline-primary rounded-circle btn-action" title="Editar">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('usuarios.destroy', $u->IdUser) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Eliminar usuario?');">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger rounded-circle btn-action" title="Eliminar">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">Sin usuarios registrados</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

