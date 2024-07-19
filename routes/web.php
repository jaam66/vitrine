<?php

use App\Enums\SupportStatus;
use App\Http\Controllers\Admin\{SupportController};
use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Route;

// SUPORTE
// -----------------------------------------------------------------------------------------
Route::get('/test', function () {
    // dd(SupportStatus::cases());
    dd(array_column(SupportStatus::cases(), 'name'));
});
// -----------------------------------------------------------------------------------------
Route::get('/suporte/create', [SupportController::class, 'create'])->name('suporte.create');

Route::get('/suporte/{id}/edit', [SupportController::class, 'edit'])->name('suporte.edit');

Route::put('/suporte/{id}', [SupportController::class, 'update'])->name('suporte.update');

Route::get('/suporte/{id}/delete', [SupportController::class, 'destroy'])->name('suporte.delete');

Route::delete('/suporte/{id}', [SupportController::class, 'destroy'])->name('suporte.destroy');

Route::get('/suporte/{id}', [SupportController::class, 'show'])->name('suporte.show');

Route::post('/suporte', [SupportController::class, 'store'])->name('suporte.store');

Route::get('/suporte', [SupportController::class, 'index'])->name('suporte.index');
// -----------------------------------------------------------------------------------------
Route::get('/contato', [SiteController::class, 'contact']);

Route::get('/', function () {
    return view('welcome');
});
// -----------------------------------------------------------------------------------------

