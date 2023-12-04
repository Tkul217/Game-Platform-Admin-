<?php
use App\Http\Controllers\Auth\LoginController;

Route::get('login', [LoginController::class, 'login'])->name('login');

Route::post('login', [LoginController::class, 'authenticate'])->name('authenticate');
