<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicamentosController;
use App\Http\Controllers\RecetasController;

Route::get('/', function(){return view("index");})->name("farma");

Route::get('/medicamentos', [MedicamentosController::class, 'index']) -> name("medicamentos");
Route::get('/add-medicamentos', function(){return view('medicamentos.add');}) -> name("medicamentos-add");
Route::post('/add-medicamentos', [MedicamentosController::class, 'store']) -> name("medicamentos-add");
Route::delete('/medicamentos/{id}', [MedicamentosController::class, 'destroy']) -> name('medicamentos-delete');
Route::get('/edit-medicamentos/{id}', [MedicamentosController::class, 'show']) -> name('medicamentos-edit');
Route::post('/edit-medicamentos/{id}', [MedicamentosController::class, 'update']) -> name('medicamentos-edit');

Route::get('/recetas', [RecetasController::class, 'index']) -> name("recetas");
Route::get('/add-recetas', [RecetasController::class, 'add']) -> name("recetas-add");
Route::post('/add-recetas', [RecetasController::class, 'store']) -> name("recetas-add");
Route::delete('/recetas/{id}', [RecetasController::class, 'destroy']) -> name('recetas-delete');
Route::get('/edit-recetas/{id}', [RecetasController::class, 'show']) -> name('recetas-edit');
Route::post('/edit-recetas/{id}', [RecetasController::class, 'update']) -> name('recetas-edit');
