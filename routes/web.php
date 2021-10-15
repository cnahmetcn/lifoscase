<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExpenseController;

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


Route::get('/', [ExpenseController::class, 'index'])->name('list');
Route::get('/yeni-gider-ekle', [ExpenseController::class, 'create'])->name('addex');
Route::post('/save-expense', [ExpenseController::class, 'store'])->name('storex');
Route::get('/gider-duzenle/{id}', [ExpenseController::class, 'edit'])->name('editex');
Route::get('/gider-goruntule/{id}', [ExpenseController::class, 'show'])->name('showex');
Route::put('/update-expense/{id}', [ExpenseController::class, 'update'])->name('updatex');
Route::delete('/deleteexpense/{id}', [ExpenseController::class, 'destroy'])->name('destroyex');

Route::get('/haritada-goster', [ExpenseController::class, 'maps'])->name('map');


Route::get('/kategorisel-rapor', [CategoryController::class, 'index'])->name('report');
