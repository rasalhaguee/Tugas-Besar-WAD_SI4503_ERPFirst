<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CostumerController;
use App\Http\Controllers\GudangController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PdfgenerateController;
use App\Http\Controllers\TransactionController;
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

Route::get('/', function () {
    return view('home');
});


Route::group(['prefix' => 'costumer'], function (){
    Route::get('/', [CostumerController::class, 'index'])->name('costumer.index');
    Route::get('/add', [CostumerController::class, 'create'])->name('costumer.create');
    Route::post('/', [CostumerController::class, 'store'])->name('costumer.store');
    Route::get('/{id}', [CostumerController::class, 'show'])->name('costumer.show');
    Route::get('/{id}/edit', [CostumerController::class, 'edit'])->name('costumer.edit');
    Route::put('/{id}', [CostumerController::class, 'update'])->name('costumer.update');
    Route::delete('/{id}', [CostumerController::class, 'destroy'])->name('costumer.destroy');
});

Route::group(['prefix' => 'category'], function (){
    Route::get('/', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/add', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/{id}', [CategoryController::class, 'show'])->name('category.show');
    Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
});

// guudang
Route::group(['prefix' => 'warehouse'], function (){
    Route::get('/', [GudangController::class, 'index'])->name('gudang.index');
    Route::get('/add', [GudangController::class, 'create'])->name('gudang.create');
    Route::post('/', [GudangController::class, 'store'])->name('gudang.store');
    Route::get('/{id}', [GudangController::class, 'show'])->name('gudang.show');
    Route::get('/{id}/edit', [GudangController::class, 'edit'])->name('gudang.edit');
    Route::put('/{id}', [GudangController::class, 'update'])->name('gudang.update');
    Route::delete('/{id}', [GudangController::class, 'destroy'])->name('gudang.destroy');
});

// item
Route::group(['prefix' => 'item'], function (){
    Route::get('/', [ItemController::class, 'index'])->name('item.index');
    Route::get('/add', [ItemController::class, 'create'])->name('item.create');
    Route::post('/', [ItemController::class, 'store'])->name('item.store');
    Route::get('/{id}', [ItemController::class, 'show'])->name('item.show');
    Route::get('/{id}/edit', [ItemController::class, 'edit'])->name('item.edit');
    Route::put('/{id}', [ItemController::class, 'update'])->name('item.update');
    Route::delete('/{id}', [ItemController::class, 'destroy'])->name('item.destroy');
});

// transaction
Route::group(['prefix' => 'transaction'], function (){
    Route::get('/', [TransactionController::class, 'index'])->name('transaction.index');
    Route::get('/add', [TransactionController::class, 'create'])->name('transaction.create');
    Route::post('/', [TransactionController::class, 'store'])->name('transaction.store');
    Route::get('/{id}', [TransactionController::class, 'show'])->name('transaction.show');
    Route::get('/{id}/edit', [TransactionController::class, 'edit'])->name('transaction.edit');
    Route::put('/{id}', [TransactionController::class, 'update'])->name('transaction.update');
    Route::delete('/{id}', [TransactionController::class, 'destroy'])->name('transaction.destroy');
});

Route::get('/invoice/{id}', [InvoiceController::class, 'genreateInvoice'])->name('invoice.generate');

Route::get('generate-pdf','PdfgenrateController@generatePDF');



Route::get('/faq', function (){
    return view('faq');
});
