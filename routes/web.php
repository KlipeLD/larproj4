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
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/*Route::get('/user', function () {
    return view('user');
});*/
Route::get('/user', 'App\Http\Controllers\UserController@show');
Route::get('/inf', 'App\Http\Controllers\UserController@showInf')->name('inf');
Route::get('/inf/{id}', 'App\Http\Controllers\UserController@showInf')->name('showInf');
Route::post('/inf', 'App\Http\Controllers\UserController@store');

