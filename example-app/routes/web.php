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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/base', App\Http\Controllers\Base::class.'@index');

Route::get('/ajax/{id}', App\Http\Controllers\Ajax::class.'@index');

Route::post('/result', App\Http\Controllers\Base::class.'@store');

Route::get('/jquery', App\Http\Controllers\Base::class.'@jquery');
