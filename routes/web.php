<?php

use Illuminate\Routing\Route as RoutingRoute;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin','namespace' => 'admin'], function () {
      Route::get('dashbored', 'PanelController@masterpanel')->name('dashbored');
      Route::get('users', 'PanelController@masterstarter')->name('starter');
      Route::resource('/articles' , 'ArticleController');
});
