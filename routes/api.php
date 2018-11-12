<?php

use Illuminate\Http\Request;

use Carbon\Carbon;

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

// routing api home
Route::get('',function (){
    return response()->json([
        'status'    => true,
        'message' => 'Halo selamat datang di End Point api dari '.getenv('APP_NAME'),
        'documentation' => 'maaf belum bisa kami publish hanya untuk kepentingan team.',
        'pages' => [
            'login'     => [
                'endpoint'  => getenv('APP_URL').'api/login',
                'method'    => 'POST',
                'parameter' => 'email & password',
                'status'    => 'open',
            ],
            'register'      => [
                'endpoint'  => getenv('APP_URL').'api/register',
                'method'    => 'POST',
                'parameter' => '-',
                'status'    => 'close',
            ],
            'details'       => [
                'endpoint'  => getenv('APP_URL').'api/detail',
                'method'    => 'POST',
                'parameter' => 'token',
                'status'    => 'close',
            ],
        ],
        'copyright'     => '&copy; '.date('Y').' '.getenv('APP_NAME'),
    ],200);
});

Route::get('/date',function (){
//    return Carbon::today();
    return;
});

// Untuk Login Api agar dapat token
Route::post('login', 'ApiAuthController@login');

// Untuk Daftar User Baru
Route::post('register', 'ApiAuthController@register');

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

/* * * * * * * * * * * * * * * * * * * * * *
 * Group Router Untuk Apis
 * Semua di autentikasi dengan Middleware
 * * * * * * * * * * * * * * * * * * * * * */
Route::group(['middleware' => 'auth:api','apisecurity'], function() {

    Route::post('details', 'ApiAuthController@details');

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

    // api Chart
    Route::group(['prefix' => '/charts'],function (){
        Route::get('','ApiChart@index');

        //grup barang return
        Route::group(['prefix' => 'return'],function(){
            Route::get('','ApiChart@return');
            Route::get('/limit/{limit}','ApiChart@returnLimit');
            Route::get('/month','ApiChart@returnMonth');
            Route::get('/year','ApiChart@returnYear');
            Route::get('/month/{limit}','ApiChart@returnMonthLimit');
            Route::get('/year/{limit}','ApiChart@returnYearLimit');
            Route::get('/date/{date}','ApiChart@returnDate');
            Route::get('/range/{one}/{two}','ApiChart@returnRange');
        });

        //grup barang terlaris
        Route::group(['prefix' => 'most-wanted'],function(){
            Route::get('','ApiChart@mostWanted');
            Route::get('/limit/{limit}','ApiChart@mostWantedLimit');
            Route::get('/month','ApiChart@mostWantedMonth');
            Route::get('/year','ApiChart@mostWantedYear');
            Route::get('/month/{limit}','ApiChart@mostWantedMonthLimit');
            Route::get('/year/{limit}','ApiChart@mostWantedYearLimit');
            Route::get('/date/{date}','ApiChart@mostWantedDate');
            Route::get('/range/{one}/{two}','ApiChart@mostWantedMonthRange');
        });

        //grup barang berdasarkan tanggal tertentu
        Route::group(['prefix' => 'by-date'],function(){
            Route::get('','ApiChart@byDate');
            Route::get('/type/{id}','ApiChart@byDateType');
            Route::get('/material/{id}','ApiChart@byDateMaterial');
        });

        //grup barang tertentu
        Route::group(['prefix' => 'material'],function(){
            Route::get('/{id}','ApiChart@material');
            Route::get('/{id}/{limit}','ApiChart@materialLimit');
            Route::get('/{id}/type/{type}','ApiChart@materialType');
            Route::get('/{id}/date/{date}','ApiChart@materialRange');
            Route::get('/{id}/range/{one}/{two}','ApiChart@return');
        });


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