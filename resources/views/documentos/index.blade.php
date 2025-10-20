@extends('layouts.app')

@section('panel')
<div class="container py-4">
    <div class="card border-0 shadow-lg rounded-4" style="max-width:1100px; margin:auto;">
        <div class="card-body px-4 py-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="fw-bold mb-0" style="color:#20b57b;">
                    <i class="bi bi-file-earmark-text"></i> Documentos
                </h2>
                <a href="{{ route('documentos.create') }}" class="btn btn-success rounded-pill px-4 shadow-sm">
                    <i class="bi bi-plus-circle"></i> Nuevo
                </a>
            </div>
            <div class="mb-3 d-flex gap-2">
                <button class="btn btn-light border shadow-sm px-3" disabled><i class="bi bi-file-earmark-excel"></i> Excel</button>
                <button class="btn btn-light border shadow-sm px-3" disabled><i class="bi bi-filetype-csv"></i> CSV</button>
                <button class="btn btn-light border shadow-sm px-3" disabled><i class="bi bi-file-earmark-pdf"></i> PDF</button>
            </div>
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-2 mb-4" role="alert">
                <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif
            <div class="table-responsive">
                <table class="table align-middle table-hover mb-0" style="background:#f9fafb; border-radius:1rem; overflow:hidden;">
                    <thead class="table-light">
                        <tr>
                            <th class="fw-semibold" style="font-size:1.08rem;">
                                <i class="bi bi-hash text-secondary me-1"></i> 
                            </th>
                            <th class="fw-semibold" style="font-size:1.08rem;">
                                <i class="bi bi-file-earmark-text text-info me-1"></i> Nombre
                            </th>
                            <th class="fw-semibold" style="font-size:1.08rem;">
                                <i class="bi bi-paperclip text-warning me-1"></i> Archivo
                            </th>
                            <th class="fw-semibold" style="font-size:1.08rem;">
                                <i class="bi bi-image text-success me-1"></i> Imagen
                            </th>
                            <th class="fw-semibold" style="font-size:1.08rem;">
                                <i class="bi bi-shield-check text-success me-1"></i> Estado
                            </th>
                            <th class="fw-semibold" style="font-size:1.08rem;">
                                <i class="bi bi-gear text-danger me-1"></i> Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($documentos as $doc)
                        <tr>
                            <td>{{ $doc->id }}</td>
                            <td>{{ $doc->nombre }}</td>
                            <td>
                                @if($doc->archivo)
                                    <a href="{{ asset('storage/'.$doc->archivo) }}" target="_blank" class="btn btn-outline-info btn-sm rounded-pill">
                                        <i class="bi bi-download"></i> Descargar
                                    </a>
                                @else
                                    <span class="text-muted">Sin archivo</span>
                                @endif
                            </td>
                            <td>
                                @if($doc->imagen)
                                    <img src="{{ asset('storage/'.$doc->imagen) }}" alt="imagen" style="width:48px; border-radius:8px;">
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge {{ $doc->estado ? 'bg-success bg-opacity-10 text-success border px-3' : 'bg-danger bg-opacity-10 text-danger border px-3' }}">
                                    {{ $doc->estado ? 'Activo' : 'Inactivo' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('documentos.edit', $doc) }}" class="btn btn-sm btn-outline-primary rounded-pill me-1" title="Editar">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('documentos.destroy', $doc) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger rounded-pill" title="Eliminar">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @if($documentos->count() == 0)
                        <tr>
                            <td colspan="6" class="text-center text-muted">Sin documentos.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="mt-2" style="font-size:.96rem;color:#888;">
                Mostrando {{ $documentos->count() }} documentos
            </div>
        </div>
    </div>
</div>
@endsection
