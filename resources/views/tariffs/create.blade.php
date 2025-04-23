@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Nueva Partida Arancelaria</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('tariffs.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Código</label>
                <input type="text" name="code" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Descripción</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label>Arancel (%)</label>
                        <input type="number" name="tariff_rate" step="0.01" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label>Salvaguardia (%)</label>
                        <input type="number" name="safeguard_rate" step="0.01" class="form-control" required>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Guardar Partida</button>
        </form>
    </div>
</div>
@endsection
