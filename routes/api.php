<?php

use App\Http\Controllers\LocalController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MensagemBoasVindasController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/cadastrar_usuario', [UsuarioController::class, 'cadastrar_usuario']);

Route::post('/cadastrar_local', [LocalController::class, 'cadastrar_local']);

Route::post('/mensagens-boas-vindas', [MensagemBoasVindasController::class, 'store']);

Route::post('/login', [LoginController::class, 'login_api']);
