<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Empleados</title>
    <style>
        body {
            font-family: DejaVu Sans, Arial, Helvetica, sans-serif;
            margin: 0 30px;
            color: #232323;
            font-size: 13px;
        }
        .header {
            border-bottom: 2px solid #19bb86;
            padding-bottom: 6px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }
        .logo {
            width: 60px;
            margin-right: 20px;
        }
        .company-info {
            font-size: 18px;
            font-weight: bold;
            color: #19bb86;
        }
        .subtitle {
            color: #888;
            font-size: 13px;
            font-weight: normal;
        }
        .title {
            margin: 22px 0 12px 0;
            font-size: 20px;
            color: #222;
            font-weight: 800;
            letter-spacing: 1px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 18px;
        }
        th, td {
            border: 1px solid #e5e9f2;
            padding: 7px 8px;
            text-align: center;
        }
        th {
            background: #19bb86;
            color: #fff;
            font-size: 14px;
        }
        tr:nth-child(even) td {
            background: #f8fdfa;
        }
        .estado-badge {
            border-radius: 5px;
            padding: 2px 10px;
            font-weight: bold;
            font-size: 12px;
            display: inline-block;
        }
        .activo { background: #d7f8ec; color: #15a65c; border: 1px solid #19bb86; }
        .inactivo { background: #fee4e1; color: #e74a3b; border: 1px solid #e74a3b; }
        .footer {
            border-top: 1px solid #eee;
            color: #aaa;
            font-size: 11px;
            text-align: right;
            padding-top: 10px;
            margin-top: 22px;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ public_path('assets/img/logo.png') }}" class="logo" alt="Logo">
        <div>
            <div class="company-info">SAFCO - Gestión de Empleados</div>
            <div class="subtitle">Reporte global de empleados registrados</div>
        </div>
    </div>

    <div class="title">Listado de Empleados</div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Área</th>
                <th>Fecha Ingreso</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @forelse($empleados as $empleado)
                <tr>
                    <td>{{ $empleado->IdEmpleado }}</td>
                    <td>{{ $empleado->NomEmp }}</td>
                    <td>{{ $empleado->ApellidoEmp }}</td>
                    <td>{{ $empleado->Area ?? '---' }}</td>
                    <td>
                        {{ $empleado->FechaIngreso ? \Carbon\Carbon::parse($empleado->FechaIngreso)->format('d/m/Y') : '---' }}
                    </td>
                    <td>
                        @if($empleado->Estado)
                            <span class="estado-badge activo">Activo</span>
                        @else
                            <span class="estado-badge inactivo">Inactivo</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="color: #aaa;">No hay empleados registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        Generado: {{ \Carbon\Carbon::now()->format('d/m/Y H:i:s') }} &nbsp; | &nbsp; SAFCO &copy; {{ date('Y') }}
    </div>
</body>
</html>
