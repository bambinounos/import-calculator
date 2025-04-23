@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Nueva Importación</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('imports.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label>Nombre de la importación</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label>Moneda</label>
                        <select name="currency" class="form-control" required>
                            <option value="USD">Dólares</option>
                            <option value="EUR">Euros</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label>Tasa de cambio (si aplica)</label>
                <input type="number" name="exchange_rate" step="0.0001" class="form-control">
            </div>

            <div class="mb-3">
                <label>Archivo CSV</label>
                <input type="file" name="csv_file" accept=".csv" class="form-control" required>
                <small class="text-muted">
                    Formato: partida_code,description,unit_weight,quantity,unit_price
                </small>
            </div>

            <div class="mb-3">
                <label>Método de distribución</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="distribution_method" value="weight" checked>
                    <label class="form-check-label">Por peso</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="distribution_method" value="value">
                    <label class="form-check-label">Por valor</label>
                </div>
            </div>

            <button type="submit" class="btn btn-success">Procesar Importación</button>
        </form>
    </div>
</div>
@endsection
