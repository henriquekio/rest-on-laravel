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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['as' => 'auth.'], function () {
    Route::post('login', 'Api\AuthenticateController@login')->name('login');
    Route::post('refresh', 'Api\AuthenticateController@refresh')->name('refresh');
    Route::post('cadastrar-usuario', 'Api\UsuarioController@create');
    Route::put('alterar-usuario/{id}', 'Api\UsuarioController@update');
});

Route::group(['as' => 'api.', 'middleware' => 'auth:api'], function () {
    Route::post('logout', 'Api\AuthenticateController@logout')->name('logout');
    Route::get('user-data', 'Api\UsuarioController@show')->name('logout');
    Route::resource('tarefas', 'Api\TarefasController');
    Route::resource('categorias', 'Api\CategoriasController')->except(['destroy', 'edit']);
});

