<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\TariffController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\DashboardController;

// Rutas de autenticación (Login/Register)
Auth::routes();

// Rutas protegidas por autenticación
Route::middleware('auth')->group(function () {

    // Dashboard principal
    Route::get('/', [DashboardController::class, 'index'])->name('home');

    // Importaciones
    Route::resource('imports', ImportController::class)->except(['edit', 'update']);
    Route::get('/imports/{import}/process', [ImportController::class, 'process'])
        ->name('imports.process');

    // Partidas arancelarias
    Route::resource('tariffs', TariffController::class);

    // Configuración global
    Route::get('/settings', [SettingController::class, 'edit'])->name('settings.edit');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');

    // Reportes
    Route::get('/imports/{import}/report', [ImportController::class, 'generateReport'])
        ->name('imports.report');
});
