<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrdenController;

// Ruta principal
Route::get('/', function () {
    return view('index');
})->name('home');

// Rutas de autenticación
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Ruta para admin con middleware de autenticación
Route::get('/admin', function () {
    return view('admin');
})->name('admin')->middleware('auth');

Route::post('/admin/ordenes/{id}/estado', [OrdenController::class, 'cambiarEstado'])->name('ordenes.cambiarEstado');
Route::get('/admin/ordenes', [OrdenController::class, 'listarOrdenes'])->name('ordenes.listar');
Route::delete('/admin/ordenes/{id}', [OrdenController::class, 'eliminarOrden']);

Route::post('/guardar-orden', [OrdenController::class, 'guardarOrden'])->name('guardar_orden');
Route::get('/admin', [OrdenController::class, 'admin'])->name('admin')->middleware('auth');

// Ruta para mostrar la carta usando el controlador
Route::get('/carta', [ProductController::class, 'showCarta'])->name('carta');

// Otras vistas
Route::get('/carrito', function () {
    return view('Carrito');
})->name('carrito');

Route::get('/confirmacion', function () {
    return view('Confirmacion');
})->name('confirmacion');

Route::get('/conocenos', function () {
    return view('Conocenos2');
})->name('conocenos');

Route::get('/desplegable', function () {
    return view('Desplegable');
})->name('desplegable');

Route::get('/pago', function () {
    return view('Pago');
})->name('pago');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

// Rutas para archivos JS
Route::get('/js/{filename}', function ($filename) {
    return response()->file(public_path("menu_restaurante/js/{$filename}"));
})->where('filename', '.*\.js$');

// Rutas para archivos CSS
Route::get('/css/{filename}', function ($filename) {
    return response()->file(public_path("menu_restaurante/CSS/{$filename}"));
})->where('filename', '.*\.css$');

// Ruta para el archivo principal de estilos
Route::get('/styles', function () {
    return response()->file(public_path("menu_restaurante/styles.css"));
})->name('styles');
