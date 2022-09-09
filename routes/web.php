<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', [\App\Http\Controllers\DesignPatterns\DesignPatterns::class, 'renderOutput']);
//Route::get('/', [\App\Http\Controllers\DesignPatterns\Delegation::class, 'renderOutput']);
Route::get('/', [\App\Http\Controllers\DesignPatterns\EventChannel::class, 'eventChannel']);
