<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StatsController;

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


Route::get('/', [UserController::class, 'landing'])->name('landing');

/* Auth routes */
Route::post('/login', [UserController::class, 'login'])->name('user.login');
Route::get('/cerrar', [UserController::class, 'cerrarSesion'])->name('user.logout');
Route::get('/perfil/{usuario?}', [UserController::class, 'verPerfil'])->name('user.perfil');

/* Canjeos y puntos */
Route::get('/puntos', [UserController::class, 'canjearPuntos'])->name('puntos.canjear');
Route::get('/reclamar/{id?}', [UserController::class, 'accionCanjear'])->name('puntos.accionCanjear');
Route::get('/premios', [UserController::class, 'verPremios'])->name('puntos.premios');
Route::get('/premio/{id?}', [UserController::class, 'reclamarPremio'])->name('puntos.reclamarPremio');
Route::get('/gestion', [UserController::class, 'gestionarPremios'])->name('puntos.gestionarPremios');
Route::post('/gestion/crear', [UserController::class, 'crearPremio'])->name('puntos.crearPremio');
Route::post('/gestion/borrar', [UserController::class, 'borrarPremio'])->name('puntos.borrarPremio');

/* Blog posts routes */
Route::get('/blog/lista', [UserController::class, 'blogPosts'])->name('user.blogPosts');
Route::post('/blog/crear', [UserController::class, 'blogCrear'])->name('user.blogCrear');
Route::get('/articulo/{id?}', [UserController::class, 'leerPost'])->name('user.leerPost');
Route::post('/blog/borrar/{id?}', [UserController::class, 'blogBorrar'])->name('user.blogBorrar');

/* Testing routes */
Route::get('/testing-stats', [StatsController::class, 'allStats'])->name('testingstats');