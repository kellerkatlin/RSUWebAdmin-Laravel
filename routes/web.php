<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoluntariosController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\ProyectosController;


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

Route::get('/', function () {
    return view('pagina.index'); 
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Auth::routes();


Route::get('admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.home');

Route::post('obtenerprovincias', [VoluntariosController::class, 'obtenerProvincias'])->name('obtenerprovincias');
Route::post('obtenerdistritos', [VoluntariosController::class, 'obtenerDistritos'])->name('obtenerDistritos');
/*
Route::get('voluntariado', [VoluntariosController::class, 'voluntario'])->name('crearvoluntario');

Route::post('guardarvoluntario', [VoluntariosController::class, 'guardarvoluntario'])->name('guardarvoluntario');
Route::get('reportevoluntario', [VoluntariosController::class, 'reporteVoluntario'])->name('reportevoluntario')->middleware('can:reportevoluntario');
*/
Route::resource('users', UserController::class)->only(['index', 'edit','update'])->names('admin.users')->middleware('can:admin.users.index');

Route::resource('roles', RoleController::class)->names('admin.roles');

Route::resource('proyectos', ProyectosController::class)->names('admin.proyectos');

Route::resource('voluntarios', VoluntariosController::class)->names('admin.voluntarios');
/*
Route::get('modificavoluntario{idvoluntario}', [VoluntariosController::class, 'modificaVoluntario'])->name('modificavoluntario')->middleware('can:modificavoluntario');
Route::put('actualizavoluntario{idvoluntario}', [VoluntariosController::class, 'actualizaVoluntario'])->name('actualizavoluntario')->middleware('can:modificavoluntario');
Route::get('activavoluntario/{idvoluntario}', [VoluntariosController::class, 'activaVoluntario'])->name('activavoluntario')->middleware('can:activavoluntario');
Route::get('desactivavoluntario/{idvoluntario}', [VoluntariosController::class, 'desactivaVoluntario'])->name('desactivavoluntario')->middleware('can:desactivavoluntario');
Route::get('borravoluntario/{idvoluntario}', [VoluntariosController::class, 'borraVoluntario'])->name('borravoluntario')->middleware('can:borravoluntario');
*/