<!DOCTYPE html>
<html>
<head>
    <title>Calculadora de Importaciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">Importadora</a>
            <div class="d-flex">
                <a href="{{ route('imports.create') }}" class="btn btn-light me-2">Nueva Importación</a>
                <a href="{{ route('tariffs.index') }}" class="btn btn-light me-2">Partidas</a>
                <a href="{{ route('settings.edit') }}" class="btn btn-light">Configuración</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>
</body>
</html>
