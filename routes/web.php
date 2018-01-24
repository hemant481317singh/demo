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

Route::get('/' , ['as' => 'login' , 'uses' => 'Auth\AuthController@getLogin']);
Route::get('/test' , ['as' => 'test' , 'uses' => 'ProductsController@test']);

Route::post('/postlogin' , ['as' => 'postlogin' , 'uses' => 'Auth\AuthController@postLogin']);

Route::group(['middleware' => 'auth'], function(){

    //Dashboard
    Route::get('home', ['as' => 'home' , 'uses' => 'Auth\AuthController@getDashboard']);
    //Route::get('home', function () {return view('index')->with('menu','home');});

    //Resources
    Route::resource('slider','SlidersController');
    Route::resource('categories','CategoriesController');
    Route::resource('producttype','ProducttypeController');
    Route::resource('products','ProductsController');
    Route::resource('mailbox','MailboxController');

    //ajax call to get all product type
    Route::get('products/products/create/{id}','ProducttypeController@getProducttype');

    //LOGOUT
    Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@logout']);
    Route::get('products.index', ['as' => 'products.index', 'uses' => 'ProductsController@index']);
 /*   Route::get('/getdetails', [
        'uses' => 'EmployeeController@detailsdisplay',
        'as'   => 'getdetails'

    ]);*/
});
