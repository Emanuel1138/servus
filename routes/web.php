<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\FormationController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware('auth')->group(function () {

    Route::get('/groups', [GroupController::class, 'index'])->name('groups.index');
    Route::get('/groups/create', [GroupController::class, 'create'])->name('groups.create');
    Route::post('/groups', [GroupController::class, 'store'])->name('groups.store');
    Route::put('/groups/{group}', [GroupController::class, 'update'])->name('groups.update');
    Route::delete('/groups/{group}', [GroupController::class, 'destroy'])->name('groups.destroy');

    Route::get('/dashboard/{groupId}', [DashboardController::class, 'show'])->name('dashboard');
    Route::get('/dashboard/formations/{groupId}', [FormationController::class, 'index'])
    ->name('dashboard.formations.index');
    Route::get('/dashboard/settings/{groupId}', [SettingsController::class, 'show'])->name('dashboard.settings');

});

require __DIR__.'/auth.php';
