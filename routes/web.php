<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EspecieController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\CuidadorController;
use App\Http\Controllers\HabitatController;
use App\Http\Controllers\AsignacionCuidadorController;
use App\Http\Controllers\HistorialMedicoController;
use App\Models\Especie;

Route::get('/', function () {
    return view('crud.index');
})->name('crud.index');

Route::get('/especies', [EspecieController::class, 'index'])
    ->name('especies.index');

Route::get('/animales', [AnimalController::class, 'index'])
    ->name('animales.index');

Route::get('/cuidadores', [CuidadorController::class, 'index'])
    ->name('cuidadores.index');

Route::get('/habitats', [HabitatController::class, 'index'])
    ->name('habitats.index');

Route::get('/asignacion', [AsignacionCuidadorController::class, 'index'])
    ->name('asignacion.index');

Route::get('/historial', [HistorialMedicoController::class, 'index'])
    ->name('historial.index');

/**Crear */
Route::get('/createspecies',[EspecieController::class, "create"])->name("especies.create");
Route::get('/createhabitats',[HabitatController::class,"create"])->name("habitats.create");
Route::get('/createcuidadores',[CuidadorController::class,"create"])->name("cuidadores.create");
Route::get('/crateanimales',[AnimalController::class,"create"])->name("animales.create");
Route::get('/createasignacion',[AsignacionCuidadorController::class,"create"])->name("asignacion.create");
Route::get('/createhistoriales',[HistorialMedicoController::class, "create"])->name("historial.create");

/**Mostrar */
Route::get('/showanimal/{id}',[AnimalController::class,"edit"])->name("animales.show");

/**CRUD Animales */
Route::get('/editanimal/{id}',[AnimalController::class,"edit"])->name("animales.edit");
Route::put('/updateanimal/{id}',[AnimalController::class,"update"])->name("animales.update");
Route::get('/showanimal/{id}',[AnimalController::class,"show"])->name("animales.show");
Route::delete('/destrotanimal/{id}',[AnimalController::class,"destroy"])->name("animales.destroy");