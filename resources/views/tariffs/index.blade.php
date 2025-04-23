@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h3>Partidas Arancelarias</h3>
        <a href="{{ route('tariffs.create') }}" class="btn btn-primary">Nueva Partida</a>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Descripción</th>
                    <th>Arancel (%)</th>
                    <th>Salvaguardia (%)</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tariffs as $tariff)
                <tr>
                    <td>{{ $tariff->code }}</td>
                    <td>{{ $tariff->description }}</td>
                    <td>{{ $tariff->tariff_rate }}%</td>
                    <td>{{ $tariff->safeguard_rate }}%</td>
                    <td>
                        <a href="{{ route('tariffs.edit', $tariff) }}" class="btn btn-sm btn-warning">Editar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
