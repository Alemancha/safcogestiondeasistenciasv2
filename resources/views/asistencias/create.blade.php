@extends('layouts.app')
@section('panel')
<div class="container py-4" style="max-width:400px;">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body py-4 px-4">
            <h4 class="fw-bold mb-3" style="color:#19bb86;">
                <i class="bi bi-qr-code-scan"></i> Registrar Asistencia
            </h4>
            <form id="asistencia-form" method="POST" action="{{ route('asistencias.store') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Tipo de Marcación</label>
                    <select name="tipo_marcacion" class="form-select" required>
                        <option value="Entrada">Entrada</option>
                        <option value="Salida">Salida</option>
                        <option value="Descanso">Descanso</option>
                    </select>
                </div>
                <div id="qr-reader" style="width:100%;"></div>
                <input type="hidden" name="codigo_qr" id="codigo_qr">
                <div id="mensaje-exito" style="display:none;" class="alert alert-success mt-3"></div>
                <button type="submit" id="btn-enviar" class="btn btn-success w-100 mt-4" disabled>
                    <i class="bi bi-check-circle"></i> Confirmar Asistencia
                </button>
            </form>
            <div class="mt-4">
                <a href="{{ route('asistencias.index') }}" class="text-decoration-none">← Volver</a>
            </div>
            @if(session('success')) <div class="alert alert-success mt-3">{{ session('success') }}</div> @endif
            @if(session('error')) <div class="alert alert-danger mt-3">{{ session('error') }}</div> @endif
        </div>
    </div>
</div>
{{-- Carga la librería QR --}}
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script>
let scanner;
function onScanSuccess(decodedText, decodedResult) {
    document.getElementById('codigo_qr').value = decodedText;
    document.getElementById('btn-enviar').disabled = false;
    document.getElementById('mensaje-exito').innerHTML = '<b>QR detectado:</b> ' + decodedText;
    document.getElementById('mensaje-exito').style.display = "block";

    // Detener el escaneo para evitar múltiples envíos
    if(scanner) scanner.clear();

    // --- SI QUIERES QUE SE ENVÍE AUTOMÁTICAMENTE, DESCOMENTA LA SIGUIENTE LÍNEA ---
    // document.getElementById('asistencia-form').submit();
}

// Inicializar el scanner solo después de que cargue todo el DOM
window.addEventListener('DOMContentLoaded', () => {
    scanner = new Html5QrcodeScanner(
        "qr-reader", 
        { fps: 10, qrbox: 180, rememberLastUsedCamera: true },
        /* verbose= */ false
    );
    scanner.render(onScanSuccess);
});
</script>
@endsection
