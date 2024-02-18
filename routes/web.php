<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BbsController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [BbsController::class, 'index'])->name('index');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home/create', [HomeController::class, 'create'])->name('bb.create');
Route::post('/home', [HomeController::class, 'store'])->name('bb.store');
Route::get('/home/{bb}/edit', [HomeController::class, 'edit'])->name('bb.edit');
Route::patch('/home/{bb}', [HomeController::class, 'update'])->name('bb.update');
Route::get('/home/{bb}/delete', [HomeController::class, 'delete'])->name('bb.delete');
Route::delete('home/{bb}', [HomeController::class, 'destroy'])->name('bb.destroy');

Route::get('/{bb}', [BbsController::class, 'detail'])->name('detail');
