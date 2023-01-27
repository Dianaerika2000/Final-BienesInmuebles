<?php

use Illuminate\Support\Facades\Route;
//agregamos los siguientes controladores
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ResponsableController;
use App\Http\Controllers\DireccionController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\FotografiaController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\InformeController;
use App\Http\Controllers\InmuebleController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\RevaluoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => ['auth']], function() {
    Route::post('fondo', [App\Http\Controllers\UsuarioController::class, 'updateFondo'])->name('fondo');
    Route::post('letra', [App\Http\Controllers\UsuarioController::class, 'updateLetra'])->name('letra');
    Route::get('reporteInmueblesView', [ReporteController::class, 'reporteInmueblesView'])->name('reporteV');
    Route::post('reporteInmueblesDoc', [ReporteController::class, 'reporteInmueblesDoc'])->name('reporteD');
    Route::post('reporteInmueblesDocGrup', [ReporteController::class, 'reporteInmueblesDocGrupo'])->name('reporteDG');
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('responsables', ResponsableController::class);
    Route::resource('direcciones', DireccionController::class);
    Route::resource('estados', EstadoController::class);

    Route::resource('fotografias', FotografiaController::class);
    Route::resource('grupos', GrupoController::class);
    Route::resource('informes', InformeController::class);
    Route::resource('inmuebles', InmuebleController::class);
    Route::resource('reportes', ReporteController::class);
    Route::resource('revaluos', RevaluoController::class);

    Route::get('inmuebles/{id}/imagenes', [ImageController::class, 'index'])->name('imagenes.index');
    Route::post('inmuebles/{id}/imagenes', [ImageController::class, 'store'])->name('imagenes.store');
    Route::delete('inmuebles/{id}/imagenes', [ImageController::class, 'destroy'])->name('imagenes.destroy');

    Route::get('inmuebles/{id}/revaluos/index', [RevaluoController::class, 'index'])->name('revaluos.index');
    Route::get('inmuebles/{id}/revaluos/create', [RevaluoController::class, 'create'])->name('revaluos.create');
    Route::post('inmuebles/{id}/revaluos/create', [RevaluoController::class, 'store'])->name('revaluos.store');
    Route::any('inmuebles/revaluos/edit/{id}', [RevaluoController::class, 'edit'])->name('revaluos.edit');
    Route::any('inmuebles/revaluos/edit/{id}', [RevaluoController::class, 'update'])->name('revaluos.update');

    Route::get('inmuebles/revaluos/informes/{id}', [InformeController::class, 'index'])->name('informes.index');
    Route::get('inmuebles/revaluos/informes/create/{id}', [InformeController::class, 'create'])->name('informes.create');
    Route::post('inmuebles/revaluos/informes/create/{id}', [InformeController::class, 'store'])->name('informes.store');
    Route::any('inmuebles/revaluos/informes/edit/{id}', [InformeController::class, 'edit'])->name('informess.edit');
    Route::any('inmuebles/revaluos/informes/edit/{id}', [InformeController::class, 'update'])->name('informes.update');
});
