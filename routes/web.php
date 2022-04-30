<?php

use App\Modules\CashMachine\Controllers\StoreController;
use App\Modules\Transaction\Transaction\Controllers\BankController;
use App\Modules\Transaction\Transaction\Controllers\CardController;
use App\Modules\Transaction\Transaction\Controllers\CashController;
use App\Modules\Transaction\Transaction\Controllers\InfoController;
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

Route::post('/transaction/store', [StoreController::class, 'store'])->name('transaction.store');
Route::get('/transaction/bank', [BankController::class, 'create'])->name('transaction.bank');
Route::get('/transaction/card', [CardController::class, 'create'])->name('transaction.card');
Route::get('/transaction/cash', [CashController::class, 'create'])->name('transaction.cash');
Route::get('/transaction/info/{id}', [InfoController::class, 'show'])->name('transaction.info');