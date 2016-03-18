<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('layouts.layout');
});

//Auth ROUTES
Route::controllers([
    'auth' => 'Auth\AuthController',
]);

//Users ROUTES
Route::resource('users', 'Users\IndexController', [
    'where' => 'url', '[0-9A-Za-z\-]+',
]);


//Shop ROUTES
Route::resource('shops', 'Shop\IndexController', [
    'where' => 'url', '[0-9A-Za-z\-]+',
]);
Route::group(['prefix' => 'shops'], function() {
    Route::get('catalog/{id}', 'Shop\IndexController@catalog')->where('id', '[0-9]+');
});

//Categories ROUTES
Route::resource('categories', 'Products\CategoriesController', [
    'where' => 'url', '[0-9A-Za-z\-]+',
]);

//Departments ROUTES
Route::resource('departments', 'Products\DepartmentsController', [
    'where' => 'url', '[0-9A-Za-z\-]+',
]);

//Price Groups ROUTES
Route::resource('groups', 'Products\GroupsController', [
    'where' => 'url', '[0-9A-Za-z\-]+',
]);
Route::post('groups/ajaxDelete', 'Products\GroupsController@ajaxDelete');

//Products ROUTES
Route::resource('products','Products\ProductsController', [
    'where' => 'url', '[0-9A-Za-z\-]+',
]);
Route::post('ajaxProductOrderListChange', 'Products\ProductsController@ajaxProductOrderListChange');
Route::post('ajaxContentSet', 'Products\ProductsController@ajaxContentSet');
Route::post('ajaxContentSetProductEdit', 'Products\ProductsController@ajaxContentSetProductEdit');

//Content Sets ROUTE
Route::group(['prefix' => 'contents'], function(){
    Route::post('/', 'Products\ProductsController@storeContentSet');
    Route::get('{contents}/edit', 'Products\ProductsController@editContentSet');
    Route::patch('{contents}', 'Products\ProductsController@updateContentSet');
    Route::delete('{contents}', 'Products\ProductsController@destroyContentSet');
});


//Products ROUTES
Route::resource('orders','Support\OrdersController', [
    'where' => 'url', '[0-9A-Za-z\-]+',
]);

Route::get('synchronizeShop', 'Shop\IndexController@synchronize');
