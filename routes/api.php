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

Route::namespace('Api')->group(function () {
  Route::get('/users','UsersController@index');
  Route::post('/users/me','UsersController@me');
  Route::resource('/admins','AdminsController');
  Route::post('/admins/auth','AdminsController@auth');
  Route::resource('/contents','ContentsController');
  Route::resource('/categories','CategoriesController');
  Route::resource('/files','FilesController');
});
