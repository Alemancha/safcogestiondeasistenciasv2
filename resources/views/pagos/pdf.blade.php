<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Pagos</title>
    <style>
        body {
            font-family: DejaVu Sans, Arial, Helvetica, sans-serif;
            margin: 0 32px;
            color: #222;
            font-size: 13px;
        }
        .header {
            display: flex;
            align-items: center;
            border-bottom: 2px solid #17c397;
            padding-bottom: 7px;
            margin-bottom: 22px;
        }
        .logo {
            width: 64px;
            margin-right: 22px;
        }
        .company {
            font-size: 20px;
            font-weight: bold;
            color: #17c397;
        }
        .subtitle {
            color: #888;
            font-size: 13px;
            margin-top: 1px;
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
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #e5e9f2;
            padding: 7px 8px;
            text-align: center;
        }
        th {
            background: #17c397;
            color: #fff;
            font-size: 14px;
        }
        tr:nth-child(even) td {
            background: #f8fdfa;
        }
        .badge {
            border-radius: 5px;
            padding: 2px 12px;
            font-size: 12px;
            font-weight: 600;
            display: inline-block;
        }
        .bg-green { background: #e0f8ea; color: #17c397; border: 1px solid #17c397; }
        .bg-blue  { background: #e6faff; color: #00bfff; border: 1px solid #00bfff; }
        .bg-gray  { background: #f2f2f2; color: #222; border: 1px solid #bbb; }
        .bg-yellow { background: #fff7e6; color: #fdba08; border: 1px solid #fdba08;}
        .bg-comp { background: #d7f8ec; color: #15a65c; border: 1px solid #19bb86; }
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
        <img src="{{ $empresa['logo'] }}" class="logo" alt="Logo">
        <div>
            <div class="company">{{ $empresa['nombre'] }} <span style="font-size:13px;font-weight:normal;color:#444;">| RUC {{ $empresa['ruc'] }}</span></div>
            <div class="subtitle">{{ $empresa['direccion'] }}</div>
        </div>
    </div>

    <div class="title">Reporte General de Pagos</div>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Empleado</th>
                <th>Tipo Pago</th>
                <th>Monto</th>
                <th>Moneda</th>
                <th>Fecha</th>
                <th>Compensación</th>
            </tr>
        </thead>
        <tbody>
        @forelse($pagos as $pago)
            <tr>
                <td>{{ $pago->IdPago }}</td>
                <td>{{ $pago->IdEmpleado }}</td>
                <td>
                    <span class="badge bg-blue">{{ $pago->IdTipoPago ?? '-' }}</span>
                </td>
                <td>
                    <span class="badge bg-green">${{ number_format($pago->Monto, 2) }}</span>
                </td>
                <td>
                    <span class="badge bg-yellow">{{ $pago->Moneda }}</span>
                </td>
                <td>
                    <span class="badge bg-gray">{{ \Carbon\Carbon::parse($pago->Fecha_pago)->format('d/m/Y') }}</span>
                </td>
                <td>
                    @if($pago->TipoCompensacion)
                        <span class="badge bg-comp">{{ $pago->TipoCompensacion }}</span>
                    @else
                        <span class="badge bg-gray">-</span>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" style="color: #aaa;">No hay pagos registrados.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <div class="footer">
        Generado: {{ \Carbon\Carbon::now()->format('d/m/Y H:i:s') }} &nbsp; | &nbsp; SAFCO &copy; {{ date('Y') }}
    </div>
</body>
</html>
