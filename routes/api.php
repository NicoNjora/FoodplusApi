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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


    Route::post('/login', 'UserController@login');
    Route::post('/register', 'UserController@register');


    Route::group(['prefix' => 'messenger'], function (){

        Route::post('/login', 'MessengerController@login');
        Route::post('/add', 'MessengerController@add');
    });

    Route::group(['prefix' => 'branch'], function (){

    	Route::get('/', 'BranchController@index');
		Route::post('/add', 'BranchController@add');

	});

	Route::group(['prefix' => 'product'], function (){

    	Route::get('/', 'ProductController@index');
    	Route::get('/show', 'ProductController@show');
		Route::post('/add', 'ProductController@add');

	});

	Route::group(['prefix' => 'order'], function (){

    	Route::get('/', 'OrderController@index');
		Route::post('/add', 'OrderProductController@add');

	});

