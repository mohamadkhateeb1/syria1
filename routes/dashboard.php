<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\CategoriesController;



Route::group(
  [
    'prefix' => '/dashboard',
    // 'as' => 'dashboard.',   
  ],
  function () {
    // Route::get('/index',[CategoriesController::class,'index'])->name('dashboard.index');
    // Route::get('categories', [App\Http\Controllers\Dashboard\CategoriesController::class, 'index'])->name('categories.index');
    // Route::get('/categories/create', [App\Http\Controllers\Dashboard\CategoriesController::class, 'create'])->name('categories.create');
    // Route::post('/categories/store', [App\Http\Controllers\Dashboard\CategoriesController::class, 'store'])->name('categories.store');
    // Route::get('/categories/{id}/edit', [App\Http\Controllers\Dashboard\CategoriesController::class, 'edit'])->name('categories.edit');
    // Route::put('/categories/{id}/update', [App\Http\Controllers\Dashboard\CategoriesController::class, 'update'])->name('categories.update');
    // Route::delete('/categories/{id}', [App\Http\Controllers\Dashboard\CategoriesController::class, 'destroy'])->name('categories.destroy');
    //  Route::resource('categories', App\Http\Controllers\Dashboard\CategoriesController::class);
    Route::resource('categories', App\Http\Controllers\Dashboard\CategoriesController::class);
  }
);
