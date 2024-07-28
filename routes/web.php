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
Route::get('/suporte/create', [SupportController::class, 'create'])->name('suporte.create');

Route::get('/suporte/list', [SupportController::class, 'list'])->name('suporte.list');

Route::get('/suporte/{id}/edit', [SupportController::class, 'edit'])->name('suporte.edit');

Route::put('/suporte/{id}', [SupportController::class, 'update'])->name('suporte.update');

Route::get('/suporte/{id}/delete', [SupportController::class, 'destroy'])->name('suporte.delete');

Route::delete('/suporte/{id}', [SupportController::class, 'destroy'])->name('suporte.destroy');

Route::get('/suporte/{id}', [SupportController::class, 'show'])->name('suporte.show');

Route::post('/suporte', [SupportController::class, 'store'])->name('suporte.store');

Route::get('/suporte', [SupportController::class, 'show'])->name('suporte.show');
// -----------------------------------------------------------------------------------------
// Route::get('/suporte', function () {
//     return view('index');
// })->name('index');
// -----------------------------------------------------------------------------------------
Route::get('/', function () {
    return view('welcome');
});
// -----------------------------------------------------------------------------------------

