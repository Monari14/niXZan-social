<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', function () {
    session()->flush();
    return redirect()->route('login');
});

Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
