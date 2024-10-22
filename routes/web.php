<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Manager\ManagerController as ManagerController;
use App\Http\Controllers\Admin\AdminController as AdminController;
use GuzzleHttp\Middleware;
use Illuminate\Routing\Controllers\Middleware as ControllersMiddleware;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/schools', [ManagerController::class, 'indexSchool'])->name('manager.index');
    Route::post('/schools', [ManagerController::class, 'storeSchool'])->name('manager.store');
    Route::get('/schools/trashed', [ManagerController::class, 'trashedSchools'])->name('manager.trashed');
    Route::delete('/schools/{school}/forcedelete', [ManagerController::class, 'forceDeleteSchool'])->name('manager.forceDelete');
    Route::delete('/schools/{school}', [ManagerController::class, 'deleteSchool'])->name('manager.delete');

    Route::get('/show/item/{id}', [AdminController::class, 'showItem'])->name('admin.show.item');
    Route::get('/create/item', [AdminController::class, 'createItem'])->name('admin.create.item');
    Route::post('/create/item', [AdminController::class, 'storeItem'])->name('admin.store.item');
    Route::get('/edit/item/{id}', [AdminController::class, 'editItem'])->name('admin.edit.item');
    Route::put('/update/item/{id}', [AdminController::class, 'updateItem'])->name('admin.update.item');
    Route::delete('/delete/item/{id}', [AdminController::class, 'deleteItem'])->name('admin.delete.item');

    Route::get('/create/category', [AdminController::class, 'createCategory'])->name('admin.create.category');
    Route::post('/create/category', [AdminController::class, 'storeCategory'])->name('admin.store.category');
    // Route::resource('provaroute', ManagerController::class)
});
