<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', [TodoController::class, 'index'])->name('home');
Route::post('/create', [TodoController::class, 'store'])->name('create');
Route::post('/delete/{id}', [TodoController::class, 'destroy'])->name('delete');
Route::post('/toggle-status/{id}', [TodoController::class, 'toggleStatus'])->name('toggle');
