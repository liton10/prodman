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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', ['as' => 'home', 'uses' => 'ProductController@index']);
Route::post('add', ['as' => 'add', 'uses' => 'ProductController@add']);
Route::get('add', ['as' => 'add', 'uses' => 'ProductController@add']);
Route::get('view/{id}', ['as' => 'view', 'uses' => 'ProductController@show'])->where('id', '[0-9]+');
Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'ProductController@edit'])->where('id', '[0-9]+');
Route::post('productEdit/{id}', ['as' => 'productEdit', 'uses' => 'ProductController@postEdit'])->where('id', '[0-9]+');
Route::get('delete/{id}', ['as' => 'delete', 'uses' => 'ProductController@delete'])->where('id', '[0-9]+');
