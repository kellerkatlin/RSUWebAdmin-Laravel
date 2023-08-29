<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProyectosController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\VoluntariosController;
use App\Http\Controllers\Proyectos\ProyectoController;
use App\Http\Controllers\Proyectos\ResponsableController;


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
/*Keller prueba*/
Route::get('/', function () {
    return view('pagina.index'); 
});

Route::get('/about', function () {
    return view('pagina.about'); 
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

Route::resource('proyectos', ProyectoController::class)->names('admin.proyectos');

Route::resource('voluntarios', VoluntariosController::class)->names('admin.voluntarios');

Route::resource('responsables', ResponsableController::class)->names('admin.responsables');

Route::post('proyectos/{proyecto}/responsables', [ProyectoController::class, 'asignarResponsable'])->name('admin.proyectos.responsables.store');


Route::get('/gantt', function () {
    return view('admin.proyectos.charts.gantt');
});


/*
Route::get('modificavoluntario{idvoluntario}', [VoluntariosController::class, 'modificaVoluntario'])->name('modificavoluntario')->middleware('can:modificavoluntario');
Route::put('actualizavoluntario{idvoluntario}', [VoluntariosController::class, 'actualizaVoluntario'])->name('actualizavoluntario')->middleware('can:modificavoluntario');

Route::get('desactivavoluntario/{idvoluntario}', [VoluntariosController::class, 'desactivaVoluntario'])->name('desactivavoluntario')->middleware('can:desactivavoluntario');
Route::get('borravoluntario/{idvoluntario}', [VoluntariosController::class, 'borraVoluntario'])->name('borravoluntario')->middleware('can:borravoluntario');
*/
