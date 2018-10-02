<?php

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

Route::get('/dashboard/user/create', function () {
    return view('dashboard.user.add');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('validate', 'MemberController@validateCredentials');
Route::get('validate', function()
{
    return View::make('members/login');
});

