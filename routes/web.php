<?php

use App\Http\Controllers\LocalController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MensagemBoasVindasController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MensagemBoasVindasController::class, 'index'])->name('boas-vindas');
Route::get('/login', [LoginController::class, 'login']);

Route::get('/cadastro_usuario', [UsuarioController::class, 'cadastro_usuario']);
Route::get('/cadastro_local', [LocalController::class, 'cadastro_local']);
Route::get('/local', [LocalController::class, 'cadastro_local']);
