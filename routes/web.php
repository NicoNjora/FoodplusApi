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

Route::get('/', function () {
    return view('login');
});


Route::get('/welcome', function () {
    return view('welcome');
});


Route::get('/branch/new','BranchController@new');
Route::get('/product/new','ProductController@new');
Route::get('/messenger/new','MessengerController@new');

Route::post('/branch/add','BranchController@add');
Route::post('/messenger/add','MessengerController@add');
Route::post('/login','MessengerController@start');

Route::post('/product/add','ProductController@add');

