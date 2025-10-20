<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Boleta de Pago</title>
    <style>
        body { font-family: DejaVu Sans, Arial, Helvetica, sans-serif; font-size: 13px; margin: 0 24px; color: #232323; }
        .header { display: flex; align-items: center; border-bottom: 2px solid #17c397; padding-bottom: 8px; margin-bottom: 18px; }
        .logo   { width: 48px; margin-right: 20px; }
        .company-info { font-weight: bold; color: #17c397; font-size: 17px; }
        .subtitle { color: #888; font-size: 13px; font-weight: normal; }
        .boleta-title { font-size: 18px; font-weight: 700; margin-bottom: 10px; color: #212529; }
        .table-data { width: 100%; border-collapse: collapse; margin-bottom: 18px;}
        .table-data th, .table-data td { border: 1px solid #e5e9f2; padding: 7px 10px; text-align: left; }
        .table-data th { background: #17c397; color: #fff; }
        .row { display: flex; justify-content: space-between; margin-bottom: 6px; }
        .label { font-weight: 600; color: #444;}
        .amount { color: #1abc9c; font-weight: bold;}
        .footer { border-top: 1px solid #eee; color: #aaa; font-size: 11px; text-align: right; padding-top: 8px; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ $empresa['logo'] }}" class="logo" alt="Logo">
        <div>
            <div class="company-info">{{ $empresa['nombre'] }}</div>
            <div class="subtitle">Boleta de pago de empleado</div>
        </div>
    </div>

    <div class="boleta-title">Boleta de Pago #{{ $pago->IdPago }}</div>

    <div class="row">
        <div><span class="label">Empleado ID:</span> {{ $pago->IdEmpleado }}</div>
        <div><span class="label">Fecha:</span> {{ \Carbon\Carbon::parse($pago->Fecha_pago)->format('d/m/Y') }}</div>
    </div>
    <div class="row">
        <div><span class="label">Tipo de Pago:</span> {{ $pago->IdTipoPago }}</div>
        <div><span class="label">Moneda:</span> {{ $pago->Moneda }}</div>
    </div>

    <table class="table-data">
        <tr>
            <th>Compensación</th>
            <th>Monto</th>
            <th>Observación</th>
        </tr>
        <tr>
            <td>
                {{ $pago->TipoCompensacion ? $pago->TipoCompensacion : '---' }}
            </td>
            <td class="amount">
                ${{ number_format($pago->Monto, 2) }}
            </td>
            <td>
                {{ $pago->Observacion ?? '-' }}
            </td>
        </tr>
    </table>

    <div class="footer">
        Generado: {{ \Carbon\Carbon::now()->format('d/m/Y H:i:s') }} &nbsp; | &nbsp; SAFCO &copy; {{ date('Y') }}
    </div>
</body>
</html>
