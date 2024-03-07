<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TodoController;

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

Route::controller(TodoController::class)->middleware(['auth'])->group(function () {
    Route::get('/', 'index')->name('dashboard');
    Route::get('archived', 'archive')->name('archive');

    Route::prefix('todos')->group(function () {
        Route::get('create', 'create')->name('todos.create');
        Route::post('store', 'store')->name('todos.store');
        Route::get('edit/{todo}', 'edit')->name('todos.edit');
        Route::post('edit/{todo}', 'update')->name('todos.update');
        Route::get('done/{todo}', 'done')->name('todos.done');
        Route::get('restore/{todo}', 'todoRestore')->withTrashed()->name('todos.restore');
        Route::get('delete/{todo}', 'todoDelete')->withTrashed()->name('todos.delete');
        Route::get('restoreAll', 'restoreAll')->name('todos.restoreAll');
        Route::get('deleteAll', 'deleteAll')->name('todos.deleteAll');
    });
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
