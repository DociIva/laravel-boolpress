<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
// TEST API ENDPOINT
Route::get('/test', function() {
    return response()->json([
        'name' =>['Paolo', 'Luca', 'Pippo', 'Pluto'],
        'lorem' => 'a'
    ]);
});
/**
 * GET BLOG POSTS
 */
//tutte le rotte del namespace del'Api
Route::namespace('Api')->group(function() {
    //GET POSTS
    Route::get('posts', 'PostController@index');

    Route::get('posts/{slug}', 'PostController@show');
});