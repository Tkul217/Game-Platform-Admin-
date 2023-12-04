<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GameController;

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

               Route::get('{user:username}', [UserController::class, 'show'])->name('show');

               Route::put('{user:username}/block', [UserController::class, 'block'])->name('block');

               Route::put('{user:username}/unblock', [UserController::class, 'unblock'])->name('unblock');
           });

        Route::prefix('game')->name('game.')
            ->group(function () {
               Route::get('/', [GameController::class, 'index'])->name('index');

               Route::get('{game:slug}', [GameController::class, 'show'])->name('show');

               Route::get('{game:slug}/{gameVersion:id}', [GameController::class, 'showByVersions'])->name('show-by-versions');

               Route::delete('{game:slug}/deleteScores', [GameController::class, 'deleteScores'])->name('delete-scores');

               Route::delete('{game:slug}/deleteScoresByUser', [GameController::class, 'deleteScoresByUser'])->name('delete-scores-by-user');

               Route::delete('{game:slug}/{gameVersion:id}/deleteScoresByUserAndGame', [GameController::class, 'deleteScoresByUserAndGame'])->name('delete-scores-by-user-and-game');
            });

    });

require __DIR__ . '/auth.php';
