<?php

use App\Http\Controllers\SistemaController;
use Illuminate\Support\Facades\Route;


Route::get('/',[SistemaController::class,'create']);
Route::get('/lista',[SistemaController::class,'index']);
Route::get('/listar/{id}',[SistemaController::class,'show']);
Route::get('/editar',[SistemaController::class, 'edit']);

