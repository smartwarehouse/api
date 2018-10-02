<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::group(['middleware' => ['api']], function (){
    Route::post('/auth/signup','ApiAuthController@signup');
//});


/* * * * * * * * * * * * * * * * * * * * * *
 * Group Router Untuk Apis
 * Semua di autentikasi dengan Middleware
 * * * * * * * * * * * * * * * * * * * * * */
Route::group(['prefix' => '', 'middleware' => 'auth'], function() {

        // Khusus Untuk Prefix User
        Route::group(['prefix' => '/users'],function (){

            Route::get('/','ApiUsers@index');

            Route::get('/{id}','ApiUsers@show');

            Route::post('/add','ApiUsers@store');

            Route::put('/{id}','ApiUsers@edit');

            Route::delete('/{id}','ApiUsers@destroy');
        });

});