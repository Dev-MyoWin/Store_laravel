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
    return view('home');
});

Route::group(['middleware' => ['auth']], function () {
<<<<<<< HEAD
     //        
    
   });
Route::resource('products','ProductController');
Route::resource('categories','CategoryController');
=======
    Route::resource('products','ProductController');
    Route::resource('categories','CategoryController')->only(['index','create','store','edit','update']);
   });

Auth::routes();
>>>>>>> 2d7cd62f8635932e3689f9995f627fdc3282c5c5

Route::get('/home', 'HomeController@index')->name('home');
