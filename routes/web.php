<?php

use App\Http\Controllers\RecipesController;
use App\Http\Controllers\UsersController;
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
require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/users',[UsersController::class,'index'])->name('users.index');
    Route::get('/user/{id}',[UsersController::class,'edit'])->name('users.edit');
    Route::put('/user/{id}',[UsersController::class,'update'])->name('users.update');
    Route::delete('/user/{id}',[UsersController::class,'destroy'])->name('users.destroy');
    Route::post('/users',[UsersController::class,'store'])->name('users.store');

    Route::get('/recipes',[RecipesController::class,'index'])->name('recipes.index');
    Route::get('/recipe/{id}',[RecipesController::class,'edit'])->name('recipes.edit');
    Route::put('/recipe/{id}',[RecipesController::class,'update'])->name('recipes.update');
    Route::delete('/recipe/{id}',[RecipesController::class,'destroy'])->name('recipes.destroy');
    Route::post('/recipes',[RecipesController::class,'store'])->name('recipes.store');

});


