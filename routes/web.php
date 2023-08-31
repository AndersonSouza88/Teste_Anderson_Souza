<?php

use App\Http\Controllers\SistemaController;
use Illuminate\Support\Facades\Route;

Route::get('/',[SistemaController::class,'index']);
Route::get('/criar',[SistemaController::class,'create']);
Route::get('/listar/{id}',[SistemaController::class,'show']);
Route::get('/editar',[SistemaController::class, 'edit']);

