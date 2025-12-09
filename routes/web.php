<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;

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
    Route::get('/dashboard/settings/{groupId}', [SettingsController::class, 'show'])
    ->name('dashboard.settings');

    Route::get('/dashboard/formations/{groupId}', [FormationController::class, 'index'])
    ->name('dashboard.formations.index');
    Route::post('/dashboard/{groupId}/formations', [FormationController::class, 'store'])->name('formations.store');
    Route::get('/dashboard/formations/{formation}/edit', [FormationController::class, 'edit'])
    ->name('formations.edit');
    Route::put('dashboard/formations/{formation}', [FormationController::class, 'update'])
     ->name('formations.update');
    Route::delete('dashboard/formations/{formation}', [FormationController::class, 'destroy'])
     ->name('formations.destroy');

    Route::get('/profile/{profile}', [ProfileController::class, 'show'])
    ->name('profile.show');
    Route::patch('/profile/{profile}', [ProfileController::class, 'update'])
    ->name('profile.update');

    Route::get('dashboard/{groupId}/events', [EventController::class, 'index'])->name('events.index');
    Route::get('dashboard/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('dashboard/events', [EventController::class, 'store'])->name('events.store');
    Route::get('dashboard/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('dashboard/events/{event}', [EventController::class, 'update'])->name('events.update');
    Route::delete('dashboard/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');

});

require __DIR__.'/auth.php';
