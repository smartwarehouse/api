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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
//
////Route::group(['middleware' => ['api']], function (){
//    Route::post('/auth/signup','ApiAuthController@signup');
////});


/* * * * * * * * * * * * * * * * * * * * * *
 * Group Router Untuk Apis
 * Semua di autentikasi dengan Middleware
 * * * * * * * * * * * * * * * * * * * * * */
//Route::group(['prefix' => '', 'middleware' => 'auth'], function() {
//Route::group(['middleware' => 'apisecurity'], function() {
Route::group(['prefix' => ''], function() {

        // Khusus Untuk Prefix User
        Route::group(['prefix' => '/users'],function (){

            Route::get('','ApiUsers@index');

            Route::get('/{id}','ApiUsers@show');

            Route::post('/store','ApiUsers@store');

            Route::post('/tes','ApiUsers@tesPost');

            Route::post('/{id}','ApiUsers@update');

            Route::delete('/{id}','ApiUsers@destroy');
        });

});