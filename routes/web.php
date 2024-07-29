<?php

use App\Enums\SupportStatus;
use App\Http\Controllers\Admin\{SupportController};
use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Route;

// -----------------------------------------------------------------------------------------
Route::get('/index', function () {
    return view('index');
})->name('index');
// SUPORTE
// -----------------------------------------------------------------------------------------

Route::get('/suporte', [SupportController::class, 'index'])->name('suporte.index');

Route::get('/suporte/create', [SupportController::class, 'create'])->name('suporte.create');

Route::post('/suporte', [SupportController::class, 'store'])->name('suporte.store');

Route::get('/suporte/{id}', [SupportController::class, 'show'])->name('suporte.show');

Route::get('/suporte/{id}/edit', [SupportController::class, 'edit'])->name('suporte.edit');

Route::put('/suporte/{id}', [SupportController::class, 'update'])->name('suporte.update');

Route::delete('/suporte/{id}', [SupportController::class, 'destroy'])->name('suporte.destroy');

// -----------------------------------------------------------------------------------------
Route::get('/', function () {
    return view('welcome');
});
// -----------------------------------------------------------------------------------------

