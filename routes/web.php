<?php

use App\Http\Controllers\TasksController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|dashboard.
*/


Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

Route::resource('/tasks', TasksController::class);
Route::resource('/departments', DepartmentsController::class);
Route::resource('/comments', CommentsController::class)->only(['store', 'destroy']);

Auth::routes();