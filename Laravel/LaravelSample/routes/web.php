<?php

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

Route::get('clear_cart','ShopController@clear_cart');
Route::post('kazu_change','ShopController@kazu_change');
Route::post('member_login_check','ShopController@member_login_check');
Route::get('member_login/','ShopController@member_login');
Route::get('member_logout','ShopController@member_logout');
Route::get('shop_cartin','ShopController@shop_cartin');
Route::get('shop_cartlook','ShopController@shop_cartlook');
Route::post('shop_form_check','ShopController@shop_form_check');
Route::post('shop_form_done','ShopController@shop_form_done');
Route::get('shop_form','ShopController@shop_form');
Route::get('shop_kantan_check','ShopController@shop_kantan_check');
Route::post('shop_kantan_done','ShopController@shop_kantan_done');
Route::get('shop_list','ShopController@shop_list');
Route::get('shop_product','ShopController@shop_product');