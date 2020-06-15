<?php

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

Route::get('/', 'GuardianController@login');

Route::prefix('administrador')->group( function() {

    Route::get('/', 'AdministradorController@loginForm');

    Route::get('/logout', 'AdministradorController@logout');

    // Ruta del formulario a donde irá iniciar sesión el administrador
    Route::post('/login', 'AdministradorController@login');

    Route::get('/dashboard', 'AdministradorController@index')->middleware('adminAuth');

    Route::get('/perfil', 'AdministradorController@edit')->middleware('adminAuth');

    Route::post('/actualizar/{user}', 'AdministradorController@update')->middleware('adminAuth');

    Route::prefix('guardias')->group( function() {

        Route::get('/', 'AdminGuardController@index')->middleware('adminAuth');

        Route::post('/registrar', 'AdminGuardController@store')->middleware('adminAuth');

        Route::get('/eliminar/{user}', 'AdminGuardController@destroy')->middleware('adminAuth');

        Route::get('/desasignar/{user}', 'AdminGuardController@desasignarPuerta')->middleware('adminAuth');

        Route::get('/mostrar/{user}', 'AdminGuardController@show')->middleware('adminAuth');

        Route::post('/actualizar/{user}', 'AdminGuardController@update')->middleware('adminAuth');
    });

    Route::prefix('puertas')->group( function() {

        Route::get('/', 'AdminPuertaController@index')->middleware('adminAuth');

        Route::post('/registrar', 'AdminPuertaController@store')->middleware('adminAuth');

        Route::get('/editar/{puerta}', 'AdminPuertaController@show')->middleware('adminAuth');

        Route::post('/update/{puerta}', 'AdminPuertaController@update')->middleware('adminAuth');

        Route::get('/eliminar/{puerta}', 'AdminPuertaController@destroy')->middleware('adminAuth');

        Route::get('/asignar/{puerta}', 'PuertasGuardiasController@show')->middleware('adminAuth');

        Route::post('/actualizar/{puerta}', 'PuertasGuardiasController@update')->middleware('adminAuth');
    });

    Route::prefix('configuraciones')->group( function() {

        Route::get('/', 'AdminConfiguracionController@index')->middleware('adminAuth');

        Route::post('/actualizar', 'AdminConfiguracionController@update')->middleware('adminAuth');
        
    });

    Route::prefix('visitantes')->group( function() {

        Route::get('/', 'AdminVisitantesController@index')->middleware('adminAuth');

    });

    Route::prefix('empleados')->group( function() {

        Route::get('/', 'AdminEmpleadosController@index')->middleware('adminAuth');

        Route::post('/registrar', 'AdminEmpleadosController@store')->middleware('adminAuth');

        Route::get('/eliminar/{user}', 'AdminEmpleadosController@destroy')->middleware('adminAuth');

        Route::get('/mostrar/{user}', 'AdminEmpleadosController@show')->middleware('adminAuth');

        Route::post('/actualizar/{user}', 'AdminEmpleadosController@update')->middleware('adminAuth');
    });

    Route::prefix('DB')->group( function() {
        Route::get('/', 'AdminDBController@index')->middleware('adminAuth');

        Route::get('/eliminar/{user}', 'AdminDBController@destroy')->middleware('adminAuth');
    });
});

Route::prefix('guardia')->group( function() {

    Route::post('/login', 'GuardianController@auth');

    Route::get('/dashboard', 'GuardianController@index')->middleware('guardianAuth');

    Route::get('/logout', 'GuardianController@logout');

    Route::get('/perfil', 'GuardianController@perfil')->middleware('guardianAuth');

    Route::post('/actualizar', 'GuardianController@actualizar')->middleware('guardianAuth');

    Route::prefix('visitantes')->group( function() {

        Route::get('/', 'GuardiaVisitanteController@index')->middleware('guardianAuth');

        Route::post('/registrar', 'GuardiaVisitanteController@store')->middleware('guardianAuth');

        Route::post('/ingresar', 'GuardiaVisitanteController@ingreso')->middleware('guardianAuth');

        Route::get('/salir/{user}', 'GuardiaVisitanteController@salida')->middleware('guardianAuth');
    });
});
