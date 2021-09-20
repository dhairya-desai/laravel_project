<?php

use Illuminate\Support\Facades\Route;

Route::get('/permissions',[App\Http\Controllers\PermissionController::class,'index'])->name('permissions.index');


Route::post('/permissions',[App\Http\Controllers\PermissionController::class,'store'])->name('permissions.store');

Route::delete('/permissions/{permission}/destroy',[App\Http\Controllers\PermissionController::class,'destroy'])->name('permissions.destroy');

Route::get('/Permissions/{permission}/edit',[App\Http\Controllers\PermissionController::class,'edit'])->name('permissions.edit');

Route::post('/permissions/{permission}/update',[App\Http\Controllers\PermissionController::class,'update'])->name('permissions.update');