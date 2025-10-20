<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; // <--- Importante

class PagoController extends Controller
{
    public function index()
    {
        $pagos = Pago::all();
        return view('pagos.index', compact('pagos'));
    }

    public function create()
    {
        return view('pagos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'IdEmpleado' => 'required|numeric',
            'IdTipoPago' => 'required|numeric',
            'Monto' => 'required|numeric',
            'Moneda' => 'required|max:3',
            'Fecha_pago' => 'required|date',
            'TipoCompensacion' => 'nullable|max:50',
            'Observacion' => 'nullable|max:200',
        ]);

        Pago::create($request->all());

        return redirect()->route('pagos.index')->with('success', 'Pago creado correctamente');
    }

    public function show(Pago $pago)
    {
        return view('pagos.show', compact('pago'));
    }

    public function edit(Pago $pago)
    {
        return view('pagos.edit', compact('pago'));
    }

    public function update(Request $request, Pago $pago)
    {
        $request->validate([
            'IdEmpleado' => 'required|numeric',
            'IdTipoPago' => 'required|numeric',
            'Monto' => 'required|numeric',
            'Moneda' => 'required|max:3',
            'Fecha_pago' => 'required|date',
            'TipoCompensacion' => 'nullable|max:50',
            'Observacion' => 'nullable|max:200',
        ]);

        $pago->update($request->all());

        return redirect()->route('pagos.index')->with('success', 'Pago actualizado correctamente');
    }

    public function destroy(Pago $pago)
    {
        $pago->delete();
        return redirect()->route('pagos.index')->with('success', 'Pago eliminado correctamente');
    }

    // ------ NUEVO: Generar Boleta PDF ------
    public function boleta(Pago $pago)
    {
        $empresa = [
            'nombre' => 'SAFCO',
            'ruc'    => '20699999999',
            'direccion' => 'Av. Principal 123, Lima, Perú',
            'logo'   => public_path('assets/img/logo.png'),
        ];

        return Pdf::loadView('pagos.boleta', compact('pago', 'empresa'))
            ->setPaper('A5')
            ->stream('boleta_pago_'.$pago->IdPago.'.pdf');
    }
    // Exportar PDF con todos los pagos
public function exportPdf()
{
    $pagos = Pago::all();
    $empresa = [
        'nombre' => 'SAFCO',
        'ruc'    => '20699999999',
        'direccion' => 'Av. Principal 123, Lima, Perú',
        'logo'   => public_path('assets/img/logo.png'),
    ];
    return \Barryvdh\DomPDF\Facade\Pdf::loadView('pagos.pdf', compact('pagos', 'empresa'))
        ->setPaper('A4', 'landscape')
        ->stream('reporte_pagos.pdf');
}

}
