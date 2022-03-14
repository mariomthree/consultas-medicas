<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['register' => false]);
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware('auth', 'is_active')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');

    Route::resource('pacientes', PacienteController::class);
    Route::resource('medicos', MedicoController::class);
    Route::resource('consultas', ConsultaController::class);

    Route::resource('usuarios', UsuarioController::class);
    Route::get('/perfil', [UsuarioController::class, 'perfil'])->name('perfil');
    Route::patch('/perfil/update-information', [UsuarioController::class, 'updateInformation'])->name('perfil.update.information');
    Route::patch('/perfil/update-password', [UsuarioController::class, 'updatePassword'])->name('perfil.update.password');
});
