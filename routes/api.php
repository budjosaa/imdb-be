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

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', 'Auth\AuthController@login');
    Route::post('logout', 'Auth\AuthController@logout');
    Route::post('refresh', 'Auth\AuthController@refresh');
    Route::post('me', 'Auth\AuthController@me');
    Route::post('register', 'Auth\RegisterController@create');
});

Route::group([
    'middleware' => 'jwt.auth'
],
    function($router) {
    Route::apiResource('movies', 'Api\MovieController');
    Route::post('movies/{movieId}/like', 'Api\MovieController@like');   
    Route::get('genres', 'Api\GenresController@index');
    Route::get('movies/{movie}/comments', 'Api\CommentsController@index');
    Route::post('movies/{id}/comments/create', 'Api\CommentsController@store');
    Route::delete('movies/comments/{comment}/delete', 'Api\CommentsController@destroy');
});
