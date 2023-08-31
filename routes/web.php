<?php

use App\Http\Controllers\DentistaController;
use App\Http\Controllers\SistemaController;
use App\Models\Dentista;
use Illuminate\Support\Facades\Route;

Route::get('/', [SistemaController::class,'index'])->name('index');

Route::post('/dentistas/search', [DentistaController::class, 'search'])->name('dentistas.search');
Route::resource('dentistas',DentistaController::class);

