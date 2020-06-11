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


//for postman purposes only since there is no form in the front end.

Route::get('/users/{id}','UsersController@showOne');
Route::post('/users','UsersController@updateContent');
Route::post('/usersUsingJson','UsersController@updatecontentUsingJson');