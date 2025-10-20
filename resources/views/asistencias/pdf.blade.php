<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Asistencia</title>
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
        .tipo-badge {
            border-radius: 5px;
            padding: 2px 10px;
            font-weight: bold;
            font-size: 12px;
            display: inline-block;
        }
        .temprano { background: #d7f8ec; color: #15a65c; border: 1px solid #19bb86; }
        .tarde    { background: #fee4e1; color: #e74a3b; border: 1px solid #e74a3b; }
        .normal   { background: #e4e7ef; color: #666; border: 1px solid #aab2bd; }
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
            <div class="company-info">SAFCO - Sistema de Asistencias</div>
            <div class="subtitle">Reporte global de asistencias de empleados</div>
        </div>
    </div>

    <div class="title">Listado de Asistencias</div>

    <table>
        <thead>
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
                            <span class="tipo-badge temprano">Temprano</span>
                        @elseif($a->tipo_marcacion == 'Tarde')
                            <span class="tipo-badge tarde">Tarde</span>
                        @else
                            <span class="tipo-badge normal">Normal</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="color: #aaa;">No hay asistencias registradas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        Generado: {{ \Carbon\Carbon::now()->format('d/m/Y H:i:s') }} &nbsp; | &nbsp; SAFCO &copy; {{ date('Y') }}
    </div>
</body>
</html>
