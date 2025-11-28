<?php

use App\Http\Controllers\BrandController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/settings.php';

Route::get('hola-mundo', function () {
    return 'Hola mundo';
});

//Rutas para el modelo Brand
/*
Route::get('brands', [App\Http\Controllers\BrandController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('brands.index');

Route::get('brands/create', [App\Http\Controllers\BrandController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('brands.create');

Route::post('brands', [App\Http\Controllers\BrandController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('brands.store');

Route::get('brands/{brand}', [App\Http\Controllers\BrandController::class, 'show'])
    ->middleware(['auth', 'verified'])
    ->name('brands.show');

Route::get('brands/{brand}/edit', [App\Http\Controllers\BrandController::class, 'edit'])
    ->middleware(['auth', 'verified'])
    ->name('brands.edit');

Route::put('brands/{brand}', [App\Http\Controllers\BrandController::class, 'update'])
    ->middleware(['auth', 'verified'])
    ->name('brands.update');

Route::delete('brands/{brand}', [App\Http\Controllers\BrandController::class, 'destroy'])
    ->middleware(['auth', 'verified'])
    ->name('brands.destroy');
*/

Route::resource('brands', BrandController::class)
    ->middleware(['auth', 'verified']);
