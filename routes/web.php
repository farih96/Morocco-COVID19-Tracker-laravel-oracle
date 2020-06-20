<?php

use App\User;
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

Route::get('/', 'DataController@index');
Route::get('/data/{region_id}', 'DataController@regiondetails');

Route::get('/admin', 'AdminController@home');
Route::get('/addRecord', 'AdminController@addRecord');
Route::post('/addRecord', 'AdminController@store');
Route::get('/updateRecord', 'AdminController@list');
Route::post('update', 'AdminController@update');



Route::group(['prefix' => 'admin'], function () {

    Auth::routes();

});

