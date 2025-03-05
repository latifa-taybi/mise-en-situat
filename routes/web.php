<?php

use App\Http\Controllers\AuthController;
use App\Http\Middleware\RoleMiddlware;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function(){
    return view('dashboard');
})->middleware(RoleMiddlware::class);

Route::get('/', [AuthController::class, 'index']);
Route::post('/registre', [AuthController::class, 'registre'])->name('registre');
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'connecter'])->name('login');
