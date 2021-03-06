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


Route::get('/categories','CategoryApiController@list');
//Application API
Route::get('applications/{id}', 'Api\ApplicationApiController@index');

Route::get('application/download/{id}', 'Api\ApplicationApiController@downloadFile');