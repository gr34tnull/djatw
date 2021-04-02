<?php

use Illuminate\Support\Facades\Route;
use PragmaRX\Countries\Package\Countries;

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
    'users' => 'App\Http\Controllers\UserController',
]);

Route::prefix('search')->group(function () {
    Route::post('users', 'App\Http\Controllers\UserController@search')->name('users.search');
});

Route::get('auth/facebook', 'App\Http\Controllers\FBController@facebookRedirect')->name('login.facebook');

Route::get('auth/facebook/callback', 'App\Http\Controllers\FBController@loginWithFacebook');

Route::get('auth/disconnect', 'App\Http\Controllers\FBController@disconnect');

Route::get('cdjvpayment/{id}', 'App\Http\Controllers\UserController@payment');
Route::get('payment', 'App\Http\Controllers\UserController@publicPayment');
Route::get('success', 'App\Http\Controllers\UserController@success');

Route::get('/test', function () {
    return view('users.payment');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
