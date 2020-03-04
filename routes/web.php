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


Route::resource('products','ProductController');

Route::resource('categories','CategoryController');

Route::resource('editors','EditorController');

Route::resource('products','ProductController');

Route::resource('categories','CategoryController');

Route::resource('editors','EditorController');
Auth::routes();

Route::post('lock','ProductController@lock')->name('lock');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('plus-amount','ProductController@plusAmount')->name('plus-amount');

Route::get('minus-amount','ProductController@minusAmount')->name('minus-amount');

Route::resource('editors','EditorController');

Route::get('editors/delete/{id}', 'EditorController@destroy')->name('editors.destroy');

Route::get('products/delete/{id}', 'ProductController@delete')->name('product-delete');
Route::get('editors-trash','EditorController@trash')->name('trash');

Route::resource('histories','HistoryController');

Route::get('delete-all','HistoryController@deleteAll')->name('delete-all');

Route::get('delete-all-data','ProductController@deleteAllData')->name('delete-all-data');

Route::get('soft-delete','EditorController@softDelete')->name('soft-delete');