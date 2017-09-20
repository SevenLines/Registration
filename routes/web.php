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

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('index');
});

Route::get('/admin', "AdminController@index")->name('admin');

$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');


Route::group(['middleware' => 'auth'], function() {
    Route::get("api/clients/{id}/queries", "ClientController@queries");
    Route::post("api/clients/{id}/queries", "ClientController@query_add");
    Route::put("api/clients/{id}/queries", "ClientController@query_update");
    Route::resource('api/clients', 'ClientController', ['only' =>
        ['index', 'store', 'update', 'destroy']
    ]);
    Route::resource('api/queries', 'QueriesController', ['only' =>
        ['destroy']
    ]);
});

Route::post('api/query', "QueryController@addQuery")->name("addquery");
