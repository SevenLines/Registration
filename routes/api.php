<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/query', "QueryController@addQuery")->name("addquery");

Route::resource('queries', 'QueriesController', ['only' =>
    ['index', 'store', 'update', 'destroy']
]);

Route::get("clients/{id}/queries", "ClientController@queries");
Route::post("clients/{id}/queries", "ClientController@query_add");
Route::put("clients/{id}/queries", "ClientController@query_update");
Route::resource('clients', 'ClientController', ['only' =>
    ['index', 'store', 'update', 'destroy']
]);