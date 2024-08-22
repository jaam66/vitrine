<?php

use App\Http\Controllers\Admin\{EquipmentController};
use App\Http\Controllers\Admin\{SupportController};
use App\Http\Controllers\Admin\{UserController};
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// ORIGINAL
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/dashboard', function () {
    return view('auth/login');
});
Route::get('/', function () {
    return view('auth/login');
});
// -----------------------------------------------------------------------------------------
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// -----------------------------------------------------------------------------------------


// -----------------------------------------------------------------------------------------
    Route::get('/index', function () {
        return view('index');
    })->name('index');
// -----------------------------------------------------------------------------------------
// -----------------------------------------------------------------------------------------
 // SUPORTE (OS)
// -----------------------------------------------------------------------------------------
    Route::get('/suporte', [SupportController::class, 'index'])->name('suporte.index');

    Route::get('/suporte/create', [SupportController::class, 'create'])->name('suporte.create');

    Route::post('/suporte', [SupportController::class, 'store'])->name('suporte.store');

    Route::get('/suporte/{id}', [SupportController::class, 'show'])->name('suporte.show');

    Route::get('/suporte/{id}/edit', [SupportController::class, 'edit'])->name('suporte.edit');

    Route::put('/suporte/{id}', [SupportController::class, 'update'])->name('suporte.update');

    Route::delete('/suporte/{id}', [SupportController::class, 'destroy'])->name('suporte.destroy');

// -----------------------------------------------------------------------------------------
 // EQUIPAMENTO
// -----------------------------------------------------------------------------------------
    Route::get('/equipamento', [EquipmentController::class, 'index'])->name('equipamento.index');

    Route::get('/equipamento/create', [EquipmentController::class, 'create'])->name('equipamento.create');

// -----------------------------------------------------------------------------------------
 // USUARIO
// -----------------------------------------------------------------------------------------
    Route::get('/usuario', [UserController::class, 'index'])->name('usuario.index');

    Route::get('/usuario/create', [UserController::class, 'create'])->name('usuario.create');

    Route::post('/usuario', [UserController::class, 'store'])->name('usuario.store');

    Route::get('/usuario/{id}', [UserController::class, 'show'])->name('usuario.show');

    Route::get('/usuario/{id}/edit', [UserController::class, 'edit'])->name('usuario.edit');

    Route::put('/usuario/{id}', [UserController::class, 'update'])->name('usuario.update');

    Route::delete('/usuario/{id}', [UserController::class, 'destroy'])->name('usuario.destroy');
});

require __DIR__.'/auth.php';
