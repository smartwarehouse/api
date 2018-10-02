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


Route::group(['prefix' => '/users'],function (){

    Route::get('/',function (){
        echo "daftar semua user";
    });

    Route::get('/{id}',function (){
        echo "daftar user tertentu";
    });

    Route::post('/',function (){
        echo "daftar semua user";
    });

    Route::put('/{id}',function (){
        echo "daftar semua user";
    });

    Route::delete('/{id}',function (){
        echo "daftar semua user";
    });
});