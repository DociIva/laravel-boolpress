<?php

use Illuminate\Support\Facades\Auth;
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

// ROTTE PER AUTENTICAZIONE
Auth::routes();

//ROAT PER ADMIN
//Route::get('/admin', 'HomeController@index')->name('home');

// per concatennare può stare in una linea il tutto + ->name('admin.) parte iniziale di rotta
Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->name('admin.')
    ->group(function () {
        //Rotta home admin
        Route::get('/', 'HomeController@index')->name('home');

        //Rotte resource posts
        Route::resource('/posts', 'PostController');

});

/**
 * Questo era prima
 * Route::get('/', function () {
 *  return view('guest.home');
 *});
 */
//Front office

// Deve essere scritto tutto attaccato ".*"
Route::get('{any?}', function() {
    return view('guest.home');
})->where('any', ".*");

