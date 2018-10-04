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
//Route::group(['prefix' => ''], function() {


Route::group(['middleware' => 'apisecurity'], function() {
    // api Location
    Route::group(['prefix' => '/locations'],function (){
        Route::get('','ApiLocation@index');
        Route::get('/{id}','ApiLocation@show');
        Route::post('/','ApiLocation@store');
        Route::put('/{id}','ApiLocation@update');
        Route::delete('/{id}','ApiLocation@destroy');
    });

    // api Material
    Route::group(['prefix' => '/materials'],function (){
        Route::get('','ApiMaterial@index');
        Route::get('/{id}','ApiMaterial@show');
        Route::post('/','ApiMaterial@store');
        Route::put('/{id}','ApiMaterial@update');
        Route::delete('/{id}','ApiMaterial@destroy');
    });

    // api Material Category
    Route::group(['prefix' => '/materialcategories'],function (){
        Route::get('','ApiMaterialCategory@index');
        Route::get('/{id}','ApiMaterialCategory@show');
        Route::post('/','ApiMaterialCategory@store');
        Route::put('/{id}','ApiMaterialCategory@update');
        Route::delete('/{id}','ApiMaterialCategory@destroy');
    });

    // api Material Statistic
    Route::group(['prefix' => '/materialstatistics'],function (){
        Route::get('','ApiMaterialStatistic@index');
        Route::get('/{id}','ApiMaterialStatistic@show');
        Route::post('/','ApiMaterialStatistic@store');
        Route::put('/{id}','ApiMaterialStatistic@update');
        Route::delete('/{id}','ApiMaterialStatistic@destroy');
    });

    // api rfid
    Route::group(['prefix' => '/rfids'],function (){
        Route::get('','ApiRfid@index');
        Route::get('/{id}','ApiRfid@show');
        Route::post('/','ApiRfid@store');
        Route::put('/{id}','ApiRfid@update');
        Route::delete('/{id}','ApiRfid@destroy');
    });

    // api Role
    Route::group(['prefix' => '/roles'],function (){
        Route::get('','ApiRoles@index');
        Route::get('/{id}','ApiRoles@show');
        Route::post('/','ApiRoles@store');
        Route::put('/{id}','ApiRoles@update');
        Route::delete('/{id}','ApiRoles@destroy');
    });

    // api Type
    Route::group(['prefix' => '/types'],function (){
        Route::get('','ApiType@index');
        Route::get('/{id}','ApiType@show');
        Route::post('/','ApiType@store');
        Route::put('/{id}','ApiType@update');
        Route::delete('/{id}','ApiType@destroy');
    });

    // api user
    Route::group(['prefix' => '/users'],function (){
        Route::get('','ApiUsers@index');
        Route::get('/{id}','ApiUsers@show');
        Route::post('/','ApiUsers@store');
        Route::put('/{id}','ApiUsers@update');
        Route::delete('/{id}','ApiUsers@destroy');
    });



});