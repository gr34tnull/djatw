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
    return view('start');
});

Route::resources([
    'users' => 'App\Http\Controllers\FBController',
]);

Route::get('/redirect', 'App\Http\Controllers\FBController@redirected')->name('users.redirect');
Route::get('/callback', 'App\Http\Controllers\FBController@callback')->name('users.callback');
Route::get('/disconnect', 'App\Http\Controllers\FBController@disconnect')->name('users.disconnect');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
