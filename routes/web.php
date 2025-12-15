<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function (): View {
    return view('html-form');
});

Route::get('/view2', function (): View {
    return view('myview2');
});

Route::get('/mycontroller', [App\Http\Controllers\MyController::class, 'index']);
Route::post('/mycontroller', [App\Http\Controllers\MyController::class, 'process']);

