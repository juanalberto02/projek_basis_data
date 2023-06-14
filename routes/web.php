<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CPMKController;
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
    return view('example');
});

Route::get('/editcpmk', [CPMKController::class, 'index'])->name('import.form');
Route::post('/import-excel', [CPMKController::class, 'import'])->name('import.excel');
Route::put('/editcpmk/{data}', [CPMKController::class, 'update']);

