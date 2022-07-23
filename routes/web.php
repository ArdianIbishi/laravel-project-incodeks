<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

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

// admin
Route::get('dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');

// store
Route::get('store/{id}/delete',[StoreController::class,'destroy']);

Route::resource('store',StoreController::class);

// employee

Route::get('employee/{id}/delete',[EmployeController::class,'destroy']);

Route::resource('employee',EmployeController::class);
