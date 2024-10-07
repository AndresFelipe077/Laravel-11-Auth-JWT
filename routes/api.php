<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PersonaController;
use App\Http\Middleware\JwtMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PartidoController;
use App\Http\Controllers\EscenarioController;
use App\Http\Controllers\SedeController;
use App\Http\Controllers\EstadisticaPartidoController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\EquipoGrupoController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\IntegranteEquipoController;
use App\Http\Controllers\TorneoController;
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::middleware([JwtMiddleware::class])->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);


    Route::apiResource('personas', PersonaController::class);
    // Rutas para el CRUD de Partidos
    Route::resource('partidos', PartidoController::class);

    // Rutas para el CRUD de Escenarios
    Route::resource('escenarios', EscenarioController::class);

    // Rutas para el CRUD de Sedes
    Route::resource('sedes', SedeController::class);
    
    Route::get('estadisticas', [EstadisticaPartidoController::class, 'index']);
    Route::get('estadisticas/{id}', [EstadisticaPartidoController::class, 'show']);
    Route::post('estadisticas', [EstadisticaPartidoController::class, 'store']);
    Route::put('estadisticas/{id}', [EstadisticaPartidoController::class, 'update']);
    Route::delete('estadisticas/{id}', [EstadisticaPartidoController::class, 'destroy']);
// Rutas APIS para disciplinas    
    Route::get('/disciplinas', [DisciplinaController::class, 'index']);
    Route::post('/disciplinas', [DisciplinaController::class, 'store']);
    Route::get('/disciplinas/{id}', [DisciplinaController::class, 'show']);
    Route::put('/disciplinas/{id}', [DisciplinaController::class, 'update']);
    Route::delete('/disciplinas/{id}', [DisciplinaController::class, 'destroy']);
//Rutas APIS para equipos
    Route::get('equipos', [EquipoController::class, 'index']);
    Route::post('equipos', [EquipoController::class, 'store']);
    Route::get('equipos/{id}', [EquipoController::class, 'show']);
    Route::put('equipos/{id}', [EquipoController::class, 'update']);
    Route::delete('equipos/{id}', [EquipoController::class, 'destroy']);
//Rutas apis para equipos grupo
    Route::get('equipoGrupos', [EquipoGrupoController::class, 'index']);
    Route::post('equipoGrupos', [EquipoGrupoController::class, 'store']);
    Route::get('equipoGrupos/{id}', [EquipoGrupoController::class, 'show']);
    Route::put('equipoGrupos/{id}', [EquipoGrupoController::class, 'update']);
    Route::delete('equipoGrupos/{id}', [EquipoGrupoController::class, 'destroy']);
//Rutas APIS para Grupo
    Route::get('grupos', [GrupoController::class, 'index']);
    Route::post('grupos', [GrupoController::class, 'store']);
    Route::get('grupos/{id}', [GrupoController::class, 'show']);
    Route::put('grupos/{id}', [GrupoController::class, 'update']);
    Route::delete('grupos/{id}', [GrupoController::class, 'destroy']);
//Rutas APIS para integrantes de Equipos
    Route::get('integrantes-equipo', [IntegranteEquipoController::class, 'index']);
    Route::post('integrantes-equipo', [IntegranteEquipoController::class, 'store']);
    Route::get('integrantes-equipo/{id}', [IntegranteEquipoController::class, 'show']);
    Route::put('integrantes-equipo/{id}', [IntegranteEquipoController::class, 'update']);
    Route::delete('integrantes-equipo/{id}', [IntegranteEquipoController::class, 'destroy']);
//Rutas APIS para partidos
    Route::get('partidos', [PartidoController::class, 'index']);
    Route::post('partidos', [PartidoController::class, 'store']);
    Route::get('partidos/{id}', [PartidoController::class, 'show']);
    Route::put('partidos/{id}', [PartidoController::class, 'update']);
    Route::delete('partidos/{id}', [PartidoController::class, 'destroy']);
//Rutas APIS para sedes
    Route::get('sedes', [SedeController::class, 'index']); 
    Route::get('sedes/{id}', [SedeController::class, 'show']); 
    Route::post('sedes', [SedeController::class, 'store']); 
    Route::put('sedes/{id}', [SedeController::class, 'update']); 
    Route::delete('sedes/{id}', [SedeController::class, 'destroy']); 
//Rutas APIS para equipos
    Route::get('equipos', [TorneoController::class, 'index']); // Obtener todos los torneos
    Route::get('equipos/{id}', [TorneoController::class, 'show']); // Obtener un torneo específico
    Route::post('equipos', [TorneoController::class, 'store']); // Crear un nuevo torneo
    Route::put('equipos/{id}', [TorneoController::class, 'update']); // Actualizar un torneo existente
    Route::delete('equipos/{id}', [TorneoController::class, 'destroy']); // Eliminar un torneo

});
