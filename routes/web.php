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
Route::get('/profile', function () {
    return view('profile');
});

Route::group(['namespace' => 'App\Http\Controllers\Auth'], function () {
    Route::get('/auth/line', 'LoginController@redirectToLine');
    Route::get('/auth/line/callback', 'LoginController@handleLineCallback');
});
