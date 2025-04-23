@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h3>Detalle de {{ $import->name }}</h3>
        <a href="{{ route('imports.create') }}" class="btn btn-secondary">Volver</a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <p><strong>Moneda:</strong> {{ $import->currency }}</p>
                <p><strong>Total CIF:</strong> {{ number_format($import->total_cif, 2) }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Total Impuestos:</strong> {{ number_format($import->total_taxes, 2) }}</p>
                <p><strong>Creado:</strong> {{ $import->created_at->format('d/m/Y') }}</p>
            </div>
        </div>

        <h4 class="mt-4">Productos</h4>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Partida</th>
                    <th>Descripción</th>
                    <th>Peso Unitario</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($import->products as $product)
                <tr>
                    <td>{{ $product->partida_code }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->unit_weight }} kg</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ number_format($product->unit_price, 2) }}</td>
                    <td>{{ number_format($product->total_cost, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
