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

Route::group(['prefix' => 'v1'], function () {
    Route::resource('lessons', 'Api\LessonsController', ['only'=>['index', 'show', 'store']]);
    Route::get('lessons/{lesson}/tags', 'Api\TagsController@index');
    Route::resource('tags', 'Api\TagsController',['only'=>['index','show']]);
    
});
