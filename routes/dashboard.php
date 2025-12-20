<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\Dashboard\DashboardController;
Route::group([
'prefix' => 'dashboard',
 'middleware' => ['auth', 'verified']],
 function () {
//     Route::get('categories', [CategoriesController::class, 'index'])->name('categories.index');
//     Route::get('/categories/create', [CategoriesController::class, 'create'])->name('categories.create');
//     Route::post('/categories/store', [CategoriesController::class, 'store'])->name('categories.store');
//     Route::get('/categories/{id}/edit', [CategoriesController::class, 'edit'])->name('categories.edit');
//     Route::put('/categories/{id}/update', [CategoriesController::class, 'update'])->name('categories.update');
//     Route::delete('/categories/{id}', [CategoriesController::class, 'destroy'])->name('categories.destroy');
Route::resource('categories', CategoriesController::class);
Route::resource('roles', \App\Http\Controllers\Dashboard\RolleController::class);
Route::get('', [DashboardController::class, 'index'])->name('categories.index');
});
?>