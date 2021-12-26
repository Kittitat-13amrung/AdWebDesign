<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\CarController as UserCarController;
use App\Http\Controllers\Admin\CarController as AdminCarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');
Route::get('/user/home', [App\Http\Controllers\User\HomeController::class, 'index'])->name('user.home');

Route::get('/user/cars/', [UserCarController::class, 'index'])->name('user.cars.index');
Route::get('/user/cars/{id}', [UserCarController::class, 'show'])->name('user.cars.show');

Route::get('/admin/cars/', [AdminCarController::class, 'index'])->name('admin.cars.index');
Route::get('/admin/cars/create', [AdminCarController::class, 'create'])->name('admin.cars.create');
Route::get('/admin/cars/{id}', [AdminCarController::class, 'show'])->name('admin.cars.show');
Route::post('/admin/cars/store', [AdminCarController::class, 'store'])->name('admin.cars.store');
Route::get('/admin/cars/{id}/edit', [AdminCarController::class, 'edit'])->name('admin.cars.edit');
Route::put('/admin/cars/{id}', [AdminCarController::class, 'update'])->name('admin.cars.update');
Route::delete('/admin/cars/{id}', [AdminCarController::class, 'destroy'])->name('admin.cars.destroy');