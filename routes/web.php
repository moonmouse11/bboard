<?php

declare(strict_types=1);

use App\Http\Controllers\App\BbsController;
use App\Http\Controllers\App\HomeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', static function () {
    redirect('home');
});

Auth::routes();

Route::prefix('home')->group(static function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::post('/', [HomeController::class, 'store'])->name('bb.store');
    Route::get('create', [HomeController::class, 'create'])->name('bb.create');
    Route::get('/{bb}/edit', [HomeController::class, 'edit'])->name('bb.edit')->middleware('can:update.bb');
    Route::patch('{bb}', [HomeController::class, 'update'])->name('bb.update')->middleware('can:update.bb');
    Route::get('{bb}/delete', [HomeController::class, 'delete'])->name('bb.delete')->middleware('can:destroy.bb');
    Route::delete('/{bb}', [HomeController::class, 'destroy'])->name('bb.destroy')->middleware('can:destroy.bb');
});

Route::get('/{bb}', [BbsController::class, 'showDetail'])->name('detail');
