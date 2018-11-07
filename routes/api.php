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

Route::group(['as' => 'auth.', 'middleware' => 'api'], function () {
    Route::post('login', 'Api\Authenticatecontroller@login')->name('login');
});

Route::group(['as' => 'api.', 'middleware' => 'auth:api'], function () {
    Route::resource('tarefas', 'Api\TarefasController');
    Route::resource('categorias', 'Api\CategoriasController');
});

