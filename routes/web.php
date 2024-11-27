<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MessageController;

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

Route::get('/', [AuthController::class, 'index']);
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/{name}', [MessageController::class,'find']);
Route::post('/{name}/unlock',[MessageController::class,'unlock'])->name('message.unlock');
Route::get('/{name}/next',[MessageController::class,'next']);

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::middleware(['auth'])->prefix('auth')->group(function () {
    // 1 admin 0 user 2 guest
    Route::resource('/message', MessageController::class);
    Route::middleware(['role:1'])->prefix('admin')->group(function () {
        Route::get('/dashboard',[AdminController::class,'index'])->name('dashboard.admin');
    });
});
