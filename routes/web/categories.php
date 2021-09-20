<?php


use Illuminate\Support\Facades\Route;

Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [App\Http\Controllers\CategoryController::class, 'store'])->name('categories.store');

Route::get('/categories/{category}/edit', [App\Http\Controllers\CategoryController::class, 'edit'])->name('categories.edit');
Route::delete('/categories/{category}/destroy', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('categories.delete');
Route::post('/categories/{category}/update', [App\Http\Controllers\CategoryController::class, 'update'])->name('categories.update');

