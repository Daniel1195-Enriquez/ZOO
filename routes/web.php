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

/**Vistas principales */
Route::get('/especies', [EspecieController::class, 'index']) ->name('especies.index');
Route::get('/animales', [AnimalController::class, 'index']) ->name('animales.index');
Route::get('/cuidadores', [CuidadorController::class, 'index']) ->name('cuidadores.index');
Route::get('/habitats', [HabitatController::class, 'index']) ->name('habitats.index');
Route::get('/asignacion', [AsignacionCuidadorController::class, 'index']) ->name('asignacion.index');
Route::get('/historial', [HistorialMedicoController::class, 'index']) ->name('historial.index');

/**CRUD Especies */
Route::get('/createspecies',[EspecieController::class, "create"])->name("especies.create");//Vista para crear
Route::post('/store',[EspecieController::class, "store"])->name("especies.store");//Insertar
Route::get('/editespecie/{id}',[EspecieController::class, "edit"])->name("especies.edit");//Vista para form de editar
Route::put('/updateespecie/{id}',[EspecieController::class,"update"])->name("especies.update");//Vista para actualizar
Route::get('/showespecie/{id}',[EspecieController::class, "show"])->name("especies.show");//Vista para mostrar
Route::delete('/destroyespecie/{id}',[EspecieController::class, "destroy"])->name("especies.destroy");//Eliminar

/**CRUD Habitats */
Route::get('/createhabitats',[HabitatController::class, "create"])->name("habitats.create");
Route::post('/storehabitats',[HabitatController::class, "store"])->name("habitats.store");
Route::get('/edithabitat/{id}',[HabitatController::class,"edit"])->name("habitats.edit");
Route::put('/updatehabitat/{id}',[HabitatController::class,"update"])->name("habitats.update");
Route::get('/showhabitat/{id}',[HabitatController::class, "show"])->name("habitats.show");
Route::delete('/destroyhabitat/{id}',[HabitatController::class,"destroy"])->name("habitats.destroy");

/**CRUD cuidadores */
Route::get('/createcuidadores',[CuidadorController::class,"create"])->name("cuidadores.create");
Route::post('/storecuidadores',[CuidadorController::class,"store"])->name("cuidadores.store");
Route::get('/editcuidadores/{id}',[CuidadorController::class,"edit"])->name("cuidadores.edit");
Route::put('/updatecuidadores/{id}',[CuidadorController::class,"update"])->name("cuidadores.update");
Route::get('/showcuidadores/{id}',[CuidadorController::class,"show"])->name("cuidadores.show");
Route::delete('/destroycuidadores/{id}',[CuidadorController::class,"destroy"])->name("cuidadores.destroy");

/**CRUD Animales */
Route::get('/crateanimales',[AnimalController::class,"create"])->name("animales.create");
Route::post('/storeanimales',[AnimalController::class,"store"])->name("animales.store");
Route::get('/editanimal/{id}',[AnimalController::class,"edit"])->name("animales.edit");
Route::put('/updateanimal/{id}',[AnimalController::class,"update"])->name("animales.update");
Route::get('/showanimal/{id}',[AnimalController::class,"show"])->name("animales.show");
Route::delete('/destroyanimal/{id}',[AnimalController::class,"destroy"])->name("animales.destroy");

/**CRUD asignción  */
Route::get('/createasignacion',[AsignacionCuidadorController::class,"create"])->name("asignacion.create");
Route::post('/storeasignacion', [AsignacionCuidadorController::class,"store"])->name("asignacion.store");
Route::get('/editasignacion/{id_habitat}/{id_cuidador}',[AsignacionCuidadorController::class,"edit"])->name("asignacion.edit");
Route::put('/updateasignacion/{id_habitat}/{id_cuidador}',[AsignacionCuidadorController::class,"update"])->name("asignacion.update");
Route::get('/showasignacion/{id_habitat}/{id_cuidador}',[AsignacionCuidadorController::class,"show"])->name("asignacion.show");
Route::delete('/destroyanimal/{id_habitat}/{id_cuidador}',[AsignacionCuidadorController::class,"destroy"])->name("asignacion.destroy");

/**CRUD historial */
Route::get('/createhistoriales',[HistorialMedicoController::class, "create"])->name("historial.create");
Route::post('/storehistoriales',[HistorialMedicoController::class, "store"])->name("historial.store");
Route::get('/edithistoriales/{id}',[HistorialMedicoController::class,"edit"])->name("historial.edit");
Route::put('/updatehistoriales/{id}',[HistorialMedicoController::class,"update"])->name("historial.update");
Route::get('/showhistoriales/{id}',[HistorialMedicoController::class,"show"])->name("historial.show");
Route::delete('/destroyhistoriales/{id}',[HistorialMedicoController::class,"destroy"])->name("historial.destroy");