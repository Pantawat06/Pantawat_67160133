<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\PokedexController;
Route::get('/', [MyController::class, 'index'])->name('workshop.index');
Route::post('/submit', [MyController::class, 'store'])->name('workshop.store');

Route::namespace('App\Http\Controllers')->group(function(){
    Route::get('/flights', 'FlightController@index');
});
Route::resource('pokedex', PokedexController::class);