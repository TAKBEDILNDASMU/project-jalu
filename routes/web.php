<?php

use App\Http\Controllers\BerkasController;
use App\Http\Controllers\UserController;
use App\Models\Berkas;
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

Route::get('/', [BerkasController::class,'index'])->name('index');

Route::prefix('/berkas')->controller(BerkasController::class)->middleware('admin')->group(function () {
    Route::get('/', 'create')->name('berkas.create');
    Route::post('/', 'store');
    Route::put('/{berkas}', 'update');
    Route::delete('/{berkas}', 'destroy');
});

Route::prefix('/')->controller(UserController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::post('/logout', 'logout')->name('logout');
});