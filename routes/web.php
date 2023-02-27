<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\homeController;
use App\Http\Controllers\todoController;

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

Route::get('/', [homeController::class, 'show'])->name('home');
Route::delete('/todo/{id}', [todoController::class, 'delete'])->name('todo.delete');
Route::post('/update', [todoController::class, 'update'])->name('update');
Route::get('/createform', [todoController::class, 'createform'])->name('todo.createform');
Route::post('/create', [todoController::class, 'create'])->name('todo.create');
