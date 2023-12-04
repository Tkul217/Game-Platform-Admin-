<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

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
    return view('welcome');
});

Route::middleware('auth:admin')
    ->group(function () {
       Route::get('admin', AdminController::class)->name('admin.index');

        Route::prefix('user')->name('user.')
           ->group(function () {
               Route::get('/', [UserController::class, 'index'])->name('index');

               Route::get('/{user:username}', [UserController::class, 'show'])->name('show');
           });

    });

require __DIR__ . '/auth.php';
