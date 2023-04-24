<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('form',[FormController::class,'index'])->name('form');
Route::post('form.store',[FormController::class,'store'])->name('form.store');
Route::get('form.table',[FormController::class,'table'])->name('form.table');
Route::get('form.edit/{id}',[FormController::class,'edit'])->name('form.edit');
Route::post('form.update/{id}',[FormController::class,'update'])->name('form.update');
Route::get('form.delete/{id}',[FormController::class,'delete'])->name('form.delete');

// country//

// Route::get('dropdown', [FormController::class, 'index']);
Route::post('api/fetch-states', [FormController::class, 'fetchState']);
Route::post('api/fetch-cities', [FormController::class, 'fetchCity']);



// category//
Route::get('create',[CategoryController::class,'create'])->name('create');
Route::post('store',[CategoryController::class,'store'])->name('store');
Route::get('table',[CategoryController::class,'table'])->name('table');

Route::get('edit/{id}',[CategoryController::class,'edit'])->name('edit');
Route::post('update/{id}',[CategoryController::class,'update'])->name('update');
Route::get('delete/{id}',[CategoryController::class,'delete'])->name('delete');


// post

Route::get('user',[PostController::class,'user'])->name('user');
// subcategory
Route::get('fetch/subcategory', [PostController::class, 'subcategory']);
Route::post('store',[PostController::class,'store'])->name('store');
