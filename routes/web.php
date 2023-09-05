<?php

use App\Http\Controllers\BerkasController;
use App\Http\Controllers\IndexController;
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

Route::get('/', function (Berkas $berkas) {
    return response()->view('index', [
        'berkas' => $berkas::latest()->get(),
    ]);
});

Route::prefix('/berkas')->controller(BerkasController::class)->group(function () {
    Route::get('/', 'index')->name('berkas.index');
    Route::post('/', 'store');
    Route::put('/{berkas}', 'update');
    Route::delete('/{berkas}', 'destroy');
});