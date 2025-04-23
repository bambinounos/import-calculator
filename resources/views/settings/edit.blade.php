@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Configuración Global</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('settings.update') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>IVA (%)</label>
                <input type="number" name="vat_rate" step="0.01" 
                       value="{{ old('vat_rate', \App\Models\Setting::get('vat_rate', 12)) }}" 
                       class="form-control">
            </div>
            <div class="mb-3">
                <label>Tasa de Cambio USD</label>
                <input type="number" name="exchange_rate" step="0.0001"
                       value="{{ old('exchange_rate', \App\Models\Setting::get('exchange_rate', 1.11)) }}"
                       class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Guardar Configuración</button>
        </form>
    </div>
</div>
@endsection
