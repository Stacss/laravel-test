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

//brands

Route::get('/', 'MainController@home');

Route::get('/brands/{id}', 'MainController@form_update_brand')->name('form_update_brand');

Route::get('/count_goods/{id}', 'MainController@count_goods')->name('count_goods');

Route::get('/brands/{id}/remove', 'MainController@remove_brand')->name('remove_brand');

Route::post('/brands/{id}', 'MainController@update_brand')->name('update_brand');

Route::get('/brands', 'MainController@brands')->name('brands');

Route::get('/form_add_brand', 'MainController@form_add_brand')->name('form_add_brand');

Route::post('/add_brand', 'MainController@add_brand');

//goods

Route::get('/goods/{id}', 'MainController@form_update_goods')->name('form_update_goods');

Route::get('/goods/{id}/remove', 'MainController@remove_goods')->name('remove_goods');

Route::post('/goods/{id}', 'MainController@update_goods')->name('update_goods');

Route::get('/goods', 'MainController@goods')->name('goods');

Route::get('/form_add_goods', 'MainController@form_add_goods')->name('form_add_goods');

Route::post('/add_goods', 'MainController@add_goods')->name('add_goods');






Route::get('/all_tables', 'MainController@all_tables');




