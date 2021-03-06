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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/', 'LoginController@index');
Route::middleware('auth:api')->group(function () {
    Route::get('articles', 'ArticleController@index');
    Route::get('articles/{id}', 'ArticleController@show');
    Route::post('articles', 'ArticleController@store');
    Route::put('articles/{id}', 'ArticleController@store');
    Route::delete('articles/{id}', 'ArticleController@destroy');

    Route::prefix('/user')->group(function () {
        Route::get('/', 'UserController@index');
        Route::post('/login', 'LoginController@login');

    });
});

