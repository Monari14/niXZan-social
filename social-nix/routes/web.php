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
    return redirect()->route('dashboard');
});

Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');



Route::get('/cadastro', [AuthController::class, 'cadastro'])->name('cadastro');
Route::post('/cadastro', [AuthController::class, 'cadastro']);
