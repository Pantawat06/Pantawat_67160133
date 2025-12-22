<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;

Route::get('/', [MyController::class, 'index'])->name('workshop.index');
Route::post('/submit', [MyController::class, 'store'])->name('workshop.store');
