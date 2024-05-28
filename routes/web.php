<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    CastController,
    RegisterController,
};

Route::get('/', function () {
    return view('welcome');
});

Route::controller(RegisterController::class)->group(function(){
    Route::get('/register', 'create')->name('register.create');
    Route::post('/register', 'store')->name('register.store');
});

// Define routes for CastController manually or use Route::resource but not both.
Route::controller(CastController::class)->group(function () {
    Route::get('/cast', 'index')->name('cast.index');
    Route::get('/cast/create', 'create')->name('cast.create');
    Route::post('/cast', 'store')->name('cast.store');
    Route::get('/cast/{cast}/edit', 'edit')->name('cast.edit');
    Route::get('/cast/{cast}', 'show')->name('cast.show');
    Route::put('/cast/{cast}', 'update')->name('cast.update');
    Route::delete('/cast/{cast}', 'delete')->name('cast.delete');
});

// Alternatively, use Route::resource for a full set of RESTful routes.
Route::resource('cast', CastController::class);