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

Route::group(['namespace' => 'Api', 'prefix' => '/v2/doc1'], function()
{
   Route::get('/', ['as' => 'category', 'uses' =>'CategoriessController@index']);
   Route::put('/', ['as' => 'category.store', 'uses' =>'CategoriessController@store']);
   Route::get('/{id}', ['as' => 'category.show', 'uses' =>'CategoriessController@show']);
   Route::post('/{id}', ['as' => 'category.update', 'uses' =>'CategoriessController@update']);
   Route::delete('/{id}', ['as' => 'category.destroy', 'uses' =>'CategoriessController@destroy']);
});

Route::group(['namespace' => 'Api', 'prefix' => '/v2/doc2'], function()
{
    Route::get('/', ['as' => 'products', 'uses' =>'ProductssController@index']);
    Route::put('/', ['as' => 'products.store', 'uses' =>'ProductssController@store']);
    Route::get('/{id}', ['as' => 'products.show', 'uses' =>'ProductssController@show']);
    Route::post('/{id}', ['as' => 'products.update', 'uses' =>'ProductssController@update']);
    Route::delete('/{id}', ['as' => 'products.destroy', 'uses' =>'ProductssController@destroy']);

});
Route::group(['namespace' => 'Api', 'prefix' => '/v2/doc3'], function()
{
    Route::get('/', ['as' => 'producttypes', 'uses' =>'ProducttypessController@index']);
    Route::put('/', ['as' => 'producttypes.store', 'uses' =>'ProducttypessController@store']);
    Route::get('/{id}', ['as' => 'producttypes.show', 'uses' =>'ProducttypessController@show']);
    Route::post('/{id}', ['as' => 'producttypes.update', 'uses' =>'ProducttypessController@update']);
    Route::delete('/{id}', ['as' => 'producttypes.destroy', 'uses' =>'ProducttypessController@destroy']);

});
Route::group(['namespace' => 'Api', 'prefix' => '/v2/doc4'], function()
{
    Route::get('/', ['as' => 'slider', 'uses' =>'SliderssController@index']);
    Route::put('/', ['as' => 'slider.store', 'uses' =>'SliderssController@store']);
    Route::get('/{id}', ['as' => 'slider.show', 'uses' =>'SliderssController@show']);
    Route::post('/{id}', ['as' => 'slider.update', 'uses' =>'SliderssController@update']);
    Route::delete('/{id}', ['as' => 'slider.destroy', 'uses' =>'SliderssController@destroy']);

});
Route::group(['namespace' => 'Api', 'prefix' => '/v2/doc5'], function()
{
    Route::get('/', ['as' => 'users', 'uses' =>'UserssController@index']);
    Route::put('/', ['as' => 'users.store', 'uses' =>'UserssController@index']);
    Route::get('/{/v2/doc4}', ['as' => 'users.show', 'uses' =>'UserssController@index']);

});



